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
                    {{-- @livewire('review', ['id' => $product->ID]) --}}
                    <style>
                        .rate {
                            border-bottom-right-radius: 12px;
                            border-bottom-left-radius: 12px
                        }

                        .rating {
                            display: flex;
                            flex-direction: row-reverse;
                            justify-content: center
                        }

                        .rating>input {
                            display: none
                        }

                        .rating>label {
                            position: relative;
                            width: 1em;
                            font-size: 30px;
                            font-weight: 300;
                            color: #FFD600;
                            cursor: pointer
                        }

                        .rating>label::before {
                            content: "\2605";
                            position: absolute;
                            opacity: 0
                        }

                        .rating>label:hover:before,
                        .rating>label:hover~label:before {
                            opacity: 1 !important
                        }

                        .rating>input:checked~label:before {
                            opacity: 1
                        }

                        .rating:hover>input:checked~label:before {
                            opacity: 0.4
                        }

                        .buttons {
                            top: 36px;
                            position: relative
                        }

                        .rating-submit {
                            border-radius: 8px;
                            color: #fff;
                            height: auto
                        }

                        .rating-submit:hover {
                            color: #fff
                        }
                    </style>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">

                        <form action="{{ route('addComment') }}" method="POST" class="rate">
                            @csrf
                            <input type="hidden" name="Product_ID" value="{{ $product->ID }}">

                            <div class="rating">
                                <input type="radio" name="rate" value="5" id="5">
                                <label for="5">☆</label>
                                <input type="radio" name="rate" value="4" id="4">
                                <label for="4">☆</label>
                                <input type="radio" name="rate" value="3" id="3">
                                <label for="3">☆</label>
                                <input type="radio" name="rate" value="2" id="2">
                                <label for="2">☆</label>
                                <input type="radio" name="rate" value="1" id="1">
                                <label for="1">☆</label>
                            </div>


                            <textarea class="form-control" name="comment" id="comment" rows="2" placeholder="Write your review"></textarea>



                            <button type="submit" value="save" name="btn" id="btns"
                                class="btn btn-info px-4 py-1 rating-submit m-2">Rate</button>

                        </form>
                    </div>
                    <div class="card-body">
                        <div class="comments">
                            @foreach ($comments as $comment)
                                <div class="comment">
                                    <div class="row">
                                        <div class="rating">
                                            @for ($i = 0; $i < $comment->rate; $i++)
                                                <i style="color: #FFD600" class="fa fa-star"></i>
                                            @endfor

                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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
