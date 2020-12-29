<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ISD4 - IR Project</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-mUkCBeyHPdg0tqB6JDd+65Gpw5h/l8DKcCTV2D2UpaMMFd7Jo8A+mDAosaWgFBPl" crossorigin="anonymous">

    <script src="https://cdn.zinggrid.com/zinggrid.min.js" defer></script>

    <style>
        .zoom {
            transition: transform .2s; /* Animation */
        }
        .zoom:hover {
            transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }

        .active-div {
            border: 1px solid lightgray;
            padding: 15px;
            border-radius: 5px;
            width: 200px;
            height: 185px;
            margin: 10px;
        }
        img {
           width: 100%; height: auto;
        }
    </style>

</head>

<body>


<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Scrapping Covid19 Statistics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('about*')) active @endif"
                           href="{{route('about')}}">دەربارە</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('world-statistics*')) active @endif"
                           href="{{route('worldStats')}}">جیهان</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('kurdistan-statistics*')) active @endif"
                           href="{{route('kurdistanStats')}}">کوردستان</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('home')) active @endif" aria-current="page"
                           href="{{route('home')}}">سەرەتا</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container">

        <hr>

        @yield('content')
    </div>
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="border-top: 1px solid lightgray;">
                <p class="mt-3">
                    Erbil Polytechnic University<br>
                    Information Systems Engineering<br>
                    <br> <b>Web Scrapper</b> Implementation for Information Retrieval
                    Course 2020 - 2021.
                </p>

                <div class="row">
                    <div class="col-md-4">
                        Creators
                        <ul>
                            <li>Yad Hoshyar Rasul</li>
                            <li>Muhammad Jaffer Wali</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        Supervised By
                        <ul>
                            <li>Dr. Shahhab Wahhab Karim</li>
                        </ul>
                    </div>

                    <hr>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>
