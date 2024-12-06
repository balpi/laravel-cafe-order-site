<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets') }}/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            @include('admin._header')
        </div>

        <div class="row">
            <div class="col-md-2">
                @include('admin._sidebar')
            </div>

            <div class="col-md-9">





                <div id="wrapper">
                    @if (request()->get('alert') == 'alertDel')
                        <div class="alert alert-success alert-dismissible fade show" id="alertdiv" role="alert">

                            <strong>{{ Auth::user()->email }}</strong> Record Updated
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div id="page-inner">
                        @include('admin._tableGeneric')

                    </div>
                </div>
            </div>




            <!-- JQUERY SCRIPTS -->

            <!-- BOOTSTRAP SCRIPTS -->
            <script src="{{ asset('assets') }}/js/bootstrap.min.js">
                < /scrip>   <
                script src = "{{ asset('assets') }}/js/jquery.metisMenu.js" >
            </script>
            <!-- CUSTOM SCRIPTS -->
            <script src="{{ asset('assets') }}/js/custom.js"></script>


</body>

</html>
