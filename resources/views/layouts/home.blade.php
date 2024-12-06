<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />


    <link href="{{ @asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ @asset('assets') }}/css/templatemo-style.css" rel="stylesheet" />


    <style>
        #nav {
            overflow: hidden
                /* remove */
                width: 100%;
        }
    </style>

</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->

<body>
    <div class="container">
        <div class="row">
            @include('home._header')

        </div>
        <div class="row">
            @include('home._content')
        </div>
        <div class="row">
            @include('home._footer')
        </div>

    </div>
    <script src="{{ @asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ @asset('assets') }}/js/parallax.min.js"></script>
    <script src="{{ @asset('assets') }}/js/bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function() {
            // Handle click on paging links
            $('.tm-paging-link').click(function(e) {
                e.preventDefault();

                var page = $(this).text().toLowerCase();
                $('.tm-gallery-page').addClass('hidden');
                $('#tm-gallery-page-' + page).removeClass('hidden');
                $('.tm-paging-link').removeClass('active');
                $(this).addClass("active");
            });
        });
    </script>

</body>

</html>
