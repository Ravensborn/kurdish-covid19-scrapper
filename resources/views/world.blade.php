@extends('layout')

@section('content')


    <script>
        let dataValues = {!! $countryStatistics !!};

        window.onload = function () {
            document.querySelector('zing-grid').data = dataValues;
        }
    </script>


    <a href="{{route('update')}}" class="btn btn-info text-white">نوێکردنەوە</a>
    <hr>


    <zing-grid caption="Covid 19 Dataset - داتاسێتی کۆڤید١٩" sort search pager page-size="100"
               page-size-options="50,100,1000,10000" layout="row" viewport-stop
               data="">
        <!--
        <zg-column index="country" header="وڵات"></zg-column>
        <zg-column index="new_cases" header="حاڵەتی نوێ"></zg-column>
        <zg-column index="new_deaths" header="مردووی نوێ"></zg-column>
        <zg-column index="new_recovered" header="چاكبووی نوێ"></zg-column>
        <zg-column index="total_cases" header="کۆی کەیسەکان"></zg-column>
        <zg-column index="total_deaths" header="کۆی مردوان"></zg-column>
        <zg-column index="total_recovered" header="کۆی چاكبووان"></zg-column>
        <zg-column index="active_cases" header="حاڵەتی چاڵاك"></zg-column>
        <zg-column index="serious_cases" header="حاڵەتی مەترسیدار"></zg-column>
        <zg-column index="total_tests" header="کۆی پشکنین"></zg-column>
        <zg-column index="cases_per_million" header="حاڵەت لە ملیۆنێك"></zg-column>
        <zg-column index="deaths_per_million" header="مردن لە ملیۆنێك"></zg-column>
        <zg-column index="tests_per_million" header="پشکنین لە ملیۆنێك"></zg-column>
        <zg-column index="population" header="کۆی دانیشتوان"></zg-column>
        <zg-column type="date" index="created_at" header="بەروار"></zg-column>
        -->
        <zg-column index="country" header="Country/Continent"></zg-column>
        <zg-column index="new_cases"></zg-column>
        <zg-column index="new_deaths"></zg-column>
        <zg-column index="new_recovered"></zg-column>
        <zg-column index="total_cases"></zg-column>
        <zg-column index="total_deaths"></zg-column>
        <zg-column index="total_recovered"></zg-column>
        <zg-column index="active_cases"></zg-column>
        <zg-column index="serious_cases"></zg-column>
        <zg-column index="total_tests"></zg-column>
        <zg-column index="cases_per_million"></zg-column>
        <zg-column index="deaths_per_million"></zg-column>
        <zg-column index="tests_per_million"></zg-column>
        <zg-column index="population"></zg-column>
        <zg-column type="date" index="created_at" header="Date"></zg-column>
    </zing-grid>
    <br>


@endsection
