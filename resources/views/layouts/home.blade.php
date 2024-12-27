<!DOCTYPE html>
<html lang="en">
@inject('HomeController', 'App\Http\Controllers\HomeController')




<head>
    <meta charset="utf-8">
    <title>{{ $setting->Title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{ $setting->Keywords }}" name="keywords">
    <meta content="{{ $setting->Description }}" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css"
        integrity="sha512-v8QQ0YQ3H4K6Ic3PJkym91KoeNT5S3PnDKvqnwqFD1oiqIl653crGZplPdU5KKtHjO0QKcQ2aUlQZYjHczkmGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets') }}/css/solid.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
    @livewireStyles

</head>

<body>

    <div class="container">

        @include('home._header')



        @yield('content')



        @include('home._footer')



    </div>
    <script src="{{ asset('assets') }}/js/jquery.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('assets') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>


    <script>
        let dropdowns = document.querySelectorAll('.dropdown-toggle')
        dropdowns.forEach((dd) => {
            dd.addEventListener('click', function(e) {
                let dropmenu = document.querySelectorAll('[can-be-hide="serhat"]')
                dropmenu.forEach((ss) => {
                    ss.style.display = 'none'
                });
                var el = this.nextElementSibling
                el.style.display = el.style.display === 'block' ? 'none' : 'block'
            })
        })
    </script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

    @livewireScripts
</body>

</html>
