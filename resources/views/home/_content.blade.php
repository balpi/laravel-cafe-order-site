<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-8 text-center text-lg-start">
                <h1 class="font-secondary text-primary mb-4">Super Crispy</h1>
                <h1 class="display-1 text-uppercase text-white mb-4">CakeZone</h1>
                <h1 class="text-uppercase text-white">The Best Cake In London</h1>
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                    <a href="{{ route('about') }}" class="btn btn-primary border-inner py-3 px-5 me-5">Read More</a>
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                    <h5 class="font-weight-normal text-white m-0 ms-4 d-none d-sm-block">Play Video</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Slider Start -->

@include('home._slider')

<!-- Slider End -->

<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Menu & Pricing</h1>

            @guest
                <a href="">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Menu & Pricing</a>
            @endguest

        </div>
    </div>
</div>
<!-- Page Header End -->




<!-- Products Start -->
<div class="container-fluid about py-5">
    <div class="container">

        <!-- Şefin Tavsiyesi Start -->

        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Chefs Recomend</h2>
                <h1 class="display-4 text-uppercase">Advantage Menus</h1>
            </div>
            <div class="text-center">
                <div class="row g-3">
                    @foreach ($products as $chefs)
                        <div class="col-lg-4">
                            <div class="card border-0">
                                <a href="{{ route('detail', ['id' => $chefs->ID]) }}">
                                    <img src="{{ Storage::url($chefs->Image) }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">{{ $chefs->Title }}</h5>

                                    <a href="" class="btn btn-primary border-inner py-3 px-5">Order Now</a>
                                    <a href="{{ route('cart', ['product_id' => $chefs->ID]) }}"
                                        class="btn btn-primary border-inner py-3 px-5">AddCart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Şefin Tavsiyesi End -->






            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Menu & Pricing</h2>
                <h1 class="display-4 text-uppercase">Explore and Order Our Delicious Products</h1>
            </div>


            <div class="tab-class text-center">
                <ul
                    class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">

                    @foreach ($categories as $maincat)
                        <li class="nav-item">
                            @if ($loop->first)
                                <a class="nav-link text-white active" data-bs-toggle="pill"
                                    href="#tab-{{ $maincat->ID }}">{{ $maincat->Title }}</a>
                            @else
                                <a class="nav-link text-white" data-bs-toggle="pill"
                                    href="#tab-{{ $maincat->ID }}">{{ $maincat->Title }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($categories as $category)
                        <div id="tab-{{ $maincat->ID }}" class="tab-pane fade show p-0 active">
                            <div class="row g-3">

                                @foreach ($category->product as $product)
                                    <div class="col-lg-6">
                                        <div class="d-flex h-100">
                                            <div class="flex-shrink-0">
                                                <a href="{{ route('detail', ['id' => $product->ID]) }}">
                                                    <img class="img-fluid" src="{{ Storage::url($product->Image) }}"
                                                        alt="" style="width: 150px; height: 85px;">
                                                    <h4 class="bg-dark text-primary p-2 m-0">{{ $product->Price }}</h4>
                                                </a>
                                                <div class="d-flex h-100">
                                                    <div class="col-6 text-center">
                                                        <a href="{{ route('admin_orders', ['id' => $product->ID]) }}"
                                                            class="btn btn-primary border-inner py-3 px-5 mt-3">
                                                            <i class="fa fa-credit-card fa-1x"></i><br>
                                                            Order</a>
                                                    </div>

                                                    <div class="col-6 text-center">
                                                        <a href="{{ route('cart', ['product_id' => $product->ID]) }}"
                                                            class="btn btn-primary border-inner py-3 px-5 mt-3">
                                                            <i class="fa fa-shopping-cart fa-1x"></i><br>
                                                            Cart</a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div
                                                class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4">
                                                <h5 class="text-uppercase">{{ $product->Title }}</h5>
                                                <span>
                                                    @php
                                                        echo html_entity_decode($product->Description);
                                                    @endphp
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- Products End -->
</div>
