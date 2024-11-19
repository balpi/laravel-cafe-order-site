<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ @asset('assets') }}/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ @asset('assets') }}/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="{{ @asset('assets') }}/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ @asset('assets') }}/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">


        <div class="">
            <div class="row">
                @include('admin._header')
            </div>
            <div class="row">
                <div class="col-2">
                    @include('admin._sidebar')
                </div>
                <div class="col-9">
                    @include('admin._content')
                </div>
            </div>

            @include('admin._footer')


        </div>
    </div>
</body>
