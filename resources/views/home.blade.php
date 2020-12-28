@extends('layout')

@section('content')

    <!--
    <div class="container">
        <div class="row">
            <a href="{{route('kurdistanStats')}}" class="btn btn-outline-warning p-5">Kurdistan Statistics</a>
        </div>
        <br>
        <div class="row">
            <a href="{{route('worldStats')}}" class="btn btn-outline-danger p-5">World Statistics</a>

        </div>
    </div>
-->

    <div class="container middle-buttons" style="margin: 140px 0 140px 0;">
        <div class="row">

            <div class="col-md-12 d-flex justify-content-center">

                <div>
                    <div class="active-div zoom">
                        <a href="{{route('kurdistanStats')}}">
                            <img src="{{asset('south-kurdistan.svg')}}" alt="South Kurdistan Map">
                        </a>
                    </div>
                    <p class="text-center">کوردستان</p>
                </div>

                <div>
                    <div class="active-div zoom">
                        <a href="{{route('worldStats')}}">
                            <img src="{{asset('world-map-1.png')}}" alt="South Kurdistan Map">
                        </a>
                    </div>
                    <p class="text-center">جیهان</p>
                </div>

            </div>


        </div>
    </div>

@endsection
