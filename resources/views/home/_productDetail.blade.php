@extends('layouts.home')

@section('content')
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <div class="container-fluid mt-2 mb-3">
        <div class="row no-gutters">
            <div class="col-md-5 pr-2">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">

                            @foreach ($product->images as $image)
                                <li data-thumb="{{ Storage::url($image->Image) }}"> <img class="img-fluid"
                                        src="{{ Storage::url($image->Image) }}" />
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="card mt-2">
                    @livewire('review', ['id' => $product->ID])
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">

                    <div class="about"> <span class="font-weight-bold">
                            <h2>{{ $product->Title }}</h2>
                        </span>
                        <h4 class="font-weight-bold">{{ $product->Price }} ₺</h4>
                    </div>
                    <div class="buttons mb-5"> <a href="{{ route('cart', ['product_id' => $product->ID]) }}"
                            class="btn btn-outline-warning btn-long cart">Add to Cart</a>
                        <a href="{{ route('cart', ['product_id' => $product->ID]) }}"
                            class="btn btn-warning btn-long buy">Order Now</a>
                        <button class="btn btn-light wishlist"> <i class="fa fa-heart"></i> </button>
                    </div>
                    <hr>
                    <div class="product-description mt-1">

                        <div class="mt-2"> <span class="font-weight-bold">{{ $product->Title }}</span>
                            <p>
                                @php
                                    echo html_entity_decode($product->Description);
                                @endphp
                            </p>
                            <div class="bullets">
                                <p>
                                    @php
                                        echo html_entity_decode($product->Detail);
                                    @endphp
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-2"> <span>Similar:</span>
                    <div class="similar-products mt-2 d-flex flex-row">

                        @foreach ($similarProducts as $sim)
                            <a href="{{ route('detail', ['id' => $sim->ID]) }}">
                                <div class="card border p-1" style="width: 9rem;margin-right: 3px;">
                                    <img src="{{ Storage::url($sim->Image) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $sim->Price }} ₺</h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script>
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9
        });
    </script>
@endsection
