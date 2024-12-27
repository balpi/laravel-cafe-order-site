<style>
    .badge {
        padding-left: 9px;
        padding-right: 9px;
        -webkit-border-radius: 9px;
        -moz-border-radius: 9px;
        border-radius: 9px;
    }

    .label-warning[href],
    .badge-warning[href] {
        background-color: #c67605;
    }

    #lblCartCount {
        font-size: 12px;
        background: #ff0000;
        color: #fff;
        padding: 0 5px;
        vertical-align: top;
        margin-left: -10px;
    }
</style>

<!-- Topbar Start -->
<div class="container-fluid px-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-4 text-center bg-secondary py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase mb-1">Email Us</h6>
                    <span>{{ $setting->Email }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-primary border-inner py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-white"><i
                            class="fa fa-birthday-cake fs-1 text-dark me-3"></i>DenizCafe</h1>
                </a>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-secondary py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase mb-1">Call Us</h6>
                    <span>{{ $setting->Phone }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->




<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.html" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>CakeZone
        </h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto mx-lg-auto py-0">

            {{-- dropdown baslangıc --}}

            @isset($categories)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa-solid fa-user"></i> Categories</a>
                    <div class="dropdown-menu m-0">
                        @foreach ($categories as $category)
                            <a href="{{ route('procuctsforCategory', ['categoryID' => $category->ID]) }}"
                                class="dropdown-item"><i class="fa-solid fa-id-card-clip"></i>
                                {{ $category->Title }}</a>
                        @endforeach

                    </div>
                </div>
            @endisset




            {{-- dropdown bitis --}}


            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">About Us</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact Us</a>
            @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa-solid fa-user"></i> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('myaccount') }}" class="dropdown-item"><i class="fa-solid fa-id-card-clip"></i>
                            Profile</a>
                        <a href="{{ route('myaccount') }}" class="dropdown-item"><i class="fa-solid fa-gear fa-1x"></i>
                            Settings</a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                            <button href="" type="submit" class="dropdown-item"><i
                                    class="fa-solid fa-arrow-right"></i>
                                Logout</button>
                        </form>

                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa-solid fa-shopping-cart"></i>
                        <span class=' badge badge-warning' id='lblCartCount'>
                            @if (is_countable(session()->get('cart')))
                                {{ count(session()->get('cart')) }}
                            @endif
                        </span>Cart</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('showcart') }}" class="dropdown-item"><i class="fa-solid fa-shopping-cart"></i>
                            <span class=' badge badge-warning' id='lblCartCount'>
                                @if (is_countable(session()->get('cart')))
                                    {{ count(session()->get('cart')) }}
                                @endif
                            </span>
                            My Cart</a>
                        <a href="{{ route('showcart') }}" class="dropdown-item"><i class="fa-solid fa-clipboard-list"></i>
                            My Orders</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('about') }}" class="dropdown-item"><i class="fa-solid fa-shopping-cart"></i>
                            Checkout</a>
                    </div>
                </div>
            @endauth
            @guest()
                <a href="{{ route('login') }}" class="nav-item nav-link">Login/SignUp</a>
            @endguest
            <div class="nav-item nav-link">
                <div class="header-search">
                    <form action="{{ route('getProduct') }}" method="GET" class="d-flex">
                        @csrf
                        @livewire('search')
                        <button type="submit" class=" btn btn-primary"> <i class="fa fa-search"></i> </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</nav>
<!-- Navbar End -->


<!-- Video Modal Start -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                        allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->
