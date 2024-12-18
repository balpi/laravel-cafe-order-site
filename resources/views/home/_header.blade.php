<!-- Top box -->
<!-- Logo & Site Name -->



<div class="row">

    <div class="parallax-window" data-parallax="scroll" data-image-src="{{ @asset('assets') }}/img/simple-house-01.jpg">
        @auth
            <div class="row">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle z-0 position-absolute top-0 end-0" href="#"
                        role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
        @endauth

        <div class="tm-header">
            <div class="row tm-header-inner">
                <div class="col-md-6 col-12">
                    <img src="{{ @asset('assets') }}/img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
                    <div class="tm-site-text-box">
                        <h1 class="tm-site-title">Deniz Cafe</h1>
                        <h6 class="tm-site-description">Bodrum Eski Otagarı</h6>
                    </div>
                </div>
                <nav class="col-md-6 col-12 tm-nav">
                    <ul class="tm-nav-ul">
                        <li class="tm-nav-li"><a href="index.html" class="tm-nav-link active">Home</a></li>
                        <li class="tm-nav-li"><a href="about.html" class="tm-nav-link">About</a></li>
                        <li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Contact</a></li>
                        <li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">SignIn</a></li>
                        @guest
                            <li class="tm-nav-li"><a href="{{ route('login') }}" class="tm-nav-link">Login</a></li>
                        @endguest
                        @auth


                            <li class="tm-nav-li"><a href="{{ route('logout') }}" class="tm-nav-link">Logout</a></li>
                        @endauth

                    </ul>
                </nav>
            </div>
        </div>

    </div>
    <div class="row"></div>
    <div class="row">
        @auth
            <div class="col-9">

            </div>
            <div class="btn-group col-3 ">
                <button type="button" class="btn  btn-danger">{{ Auth::user()->name }}</button>
                <button type="button" style="height:auto" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>

                <div class="dropdown-menu dropdown-menu-lg-start">


                    <a class="dropdown-item" href="#">Logout</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> All</a>

                </div>



            </div>
        @endauth
    </div>
</div>
