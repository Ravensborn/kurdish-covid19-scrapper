@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center mt-4">
                    <img src="{{asset('epu.png')}}" alt="EPU Logo" style="width: 400px; height: auto;">
                </div>


                <div style="direction: rtl;" class="mt-3">
                    ئەم پڕۆژەیە بۆ تاقیکردنەوەی نیوەی ساڵ درووستکراوە لە زانکۆی پۆلیتەکنیکی هەولێر بەشی ئەندازیاری
                    سیستەمی زانیاری لەلایەن قوتابیان:
                    <ul>
                        <li>یاد هۆشیار رسول</li>
                        <li>محمد جعفر ولی</li>
                    </ul>
                </div>

                <p class="p-2">
                    This project is for Mid Terms Project at Erbil Polytechnic University,
                    Department of Information Systems, Information Retrieval Course 2020 - 2021.
                    <br>
                    It is built on Laravel Framework. it scrapes covid statistics
                    from Worldmeters and Kurdistan Government website.
                    The data is scraped daily and its stored in our own database.
                    <br>
                    <br>
                    Our Github Link: <a target="_blank" href="https://github.com/Ravensborn/kurdish-covid19-scrapper">https://github.com/Ravensborn/kurdish-covid19-scrapper</a>
                    <br>
                </p>
            </div>
        </div>
    </div>
@endsection
