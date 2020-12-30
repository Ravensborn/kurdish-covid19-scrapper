<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;
use App\Models\CountryStatistic;

class HomeController extends Controller
{

    protected function scrapper(): array
    {

        $doc = HtmlDomParser::file_get_html("https://www.worldometers.info/coronavirus/");
        $html = $doc;

        $todayData = array();
        $yesterdayData = array();

        foreach ($html->find('.tab-pane') as $tabPane) {
            $id = $tabPane->attr['id'];
            if ($id == "nav-today") {
                foreach ($tabPane->find('.main_table_countries_div') as $mainTable) {
                    foreach ($mainTable->find('table') as $table) {
                        foreach ($table->find('tbody') as $tbody) {
                            foreach ($tbody->find('tr') as $tr) {
                                $i = 0;
                                $country = array();
                                foreach ($tr->find('td') as $td) {

                                    $data = strlen($td->plaintext) != 0 ? $td->plaintext : 0;
                                    $data = str_replace(',', '', $data);

                                    if ($i == 0) {
                                        $country['position'] = $data;
                                    } else if ($i == 1) {
                                        $country['country'] = $data;
                                    } else if ($i == 2) {
                                        $country['total_cases'] = $data;
                                    } else if ($i == 3) {
                                        $country['new_cases'] = $data;
                                    } else if ($i == 4) {
                                        $country['total_deaths'] = $data;
                                    } else if ($i == 5) {
                                        $country['new_deaths'] = $data;
                                    } else if ($i == 6) {
                                        $country['total_recovered'] = $data;
                                    } else if ($i == 7) {
                                        $country['new_recovered'] = $data;
                                    } else if ($i == 8) {
                                        $country['active_cases'] = $data;
                                    } else if ($i == 9) {
                                        $country['serious_cases'] = $data;
                                    } else if ($i == 10) {
                                        $country['cases_per_million'] = $data;
                                    } else if ($i == 11) {
                                        $country['deaths_per_million'] = $data;
                                    } else if ($i == 12) {
                                        $country['total_tests'] = $data;
                                    } else if ($i == 13) {
                                        $country['tests_per_million'] = $data;
                                    } else if ($i == 14) {
                                        $country['population'] = $data;
                                    }

                                    $i++;
                                }

                                if ($country['country'] != 'Total:') {
                                    $todayData[] = $country;
                                }
                            }
                        }
                    }
                }
            } else if ($id == "nav-yesterday") {
                foreach ($tabPane->find('.main_table_countries_div') as $mainTable) {
                    foreach ($mainTable->find('table') as $table) {
                        foreach ($table->find('tbody') as $tbody) {
                            foreach ($tbody->find('tr') as $tr) {
                                $i = 0;
                                $country = array();
                                foreach ($tr->find('td') as $td) {

                                    $data = strlen($td->plaintext) != 0 ? $td->plaintext : 0;
                                    $data = str_replace(',', '', $data);

                                    if ($i == 0) {
                                        $country['position'] = $data;
                                    } else if ($i == 1) {
                                        $country['country'] = $data;
                                    } else if ($i == 2) {
                                        $country['total_cases'] = $data;
                                    } else if ($i == 3) {
                                        $country['new_cases'] = $data;
                                    } else if ($i == 4) {
                                        $country['total_deaths'] = $data;
                                    } else if ($i == 5) {
                                        $country['new_deaths'] = $data;
                                    } else if ($i == 6) {
                                        $country['total_recovered'] = $data;
                                    } else if ($i == 7) {
                                        $country['total_recovered'] = $data;
                                    } else if ($i == 8) {
                                        $country['active_cases'] = $data;
                                    } else if ($i == 9) {
                                        $country['serious_cases'] = $data;
                                    } else if ($i == 10) {
                                        $country['cases_per_million'] = $data;
                                    } else if ($i == 11) {
                                        $country['deaths_per_million'] = $data;
                                    } else if ($i == 12) {
                                        $country['total_tests'] = $data;
                                    } else if ($i == 13) {
                                        $country['tests_per_million'] = $data;
                                    } else if ($i == 14) {
                                        $country['population'] = $data;
                                    }

                                    $i++;
                                }

                                if ($country['country'] != 'Total:') {
                                    $yesterdayData[] = $country;
                                }
                            }
                        }
                    }
                }
            }
        }

        $html->clear();
        unset($html);
        return [$todayData, $yesterdayData];
    }


    protected function updateWorldStatistics()
    {
        $data = $this->scrapper();
        $today = CountryStatistic::whereDate('created_at', '=', Carbon::today())->exists();
        if ($today) {
            CountryStatistic::whereDate('created_at', Carbon::today())->delete();
            foreach ($data[0] as $country) {

                $updateCountryStatistic = new CountryStatistic;
                $updateCountryStatistic->create($country);

            }
        } else {
            foreach ($data[0] as $country) {
                $updateCountryStatistic = new CountryStatistic;
                $updateCountryStatistic->create($country);
            }
        }

        $yesterday = CountryStatistic::whereDate('created_at', '=', Carbon::yesterday())->exists();
        if ($yesterday) {
            CountryStatistic::whereDate('created_at', Carbon::yesterday())->delete();
            foreach ($data[1] as $country) {

                $updateCountryStatistic = new CountryStatistic;
                $country['created_at'] = Carbon::yesterday();
                $country['updated_at'] = Carbon::yesterday();
                $updateCountryStatistic->create($country);

            }
        } else {
            foreach ($data[1] as $country) {
                $updateCountryStatistic = new CountryStatistic;
                $country['created_at'] = Carbon::yesterday();
                $country['updated_at'] = Carbon::yesterday();
                $updateCountryStatistic->create($country);
            }

        }

        CountryStatistic::where('country', " ")->delete();

        return true;

    }

    protected function kurdistanGov()
    {
        $doc = HtmlDomParser::file_get_html("https://gov.krd/coronavirus/dashboard");
        $html = $doc;

        return $html->find('.standard-components .container-fluid .row .wide-col div div')[0];
    }

    public function update()
    {
        $this->updateWorldStatistics();
        return redirect()->back();
    }

    public function worldStats()
    {
        if(!CountryStatistic::where('created_at', Carbon::today())->exists()) {
            $this->updateWorldStatistics();
        }

        $CountryStatistics = CountryStatistic::select('created_at', 'country', 'new_cases', 'new_deaths', 'new_recovered', 'total_cases', 'total_deaths', 'total_recovered', 'active_cases', 'serious_cases', 'total_tests', 'cases_per_million', 'deaths_per_million', 'tests_per_million', 'population')->get();

        return view('world', [
            'countryStatistics' => $CountryStatistics->toJson(),
        ]);

    }

    public function kurdistanStats() {
        return view('kurdistan', [
            'html' => $this->kurdistanGov(),
        ]);
    }

    public function about() {
        return view('about');
    }


    public function index()
    {
        return view('home');
    }
}
