@extends('layouts.home')

@section('content')
    <div class="row pt-5">
        <div class="text-center">
            <div class="row g-3">
                @foreach ($products as $product)
                    <div class="col-lg-4">
                        <div class="card border-0">
                            <a href="{{ route('detail', ['id' => $product->ID]) }}">
                                <img src="{{ Storage::url($product->Image) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{ $product->Title }}</h5>

                                <a href="" class="btn btn-primary border-inner py-3 px-5">Order Now</a>
                                <a href="" class="btn btn-primary border-inner py-3 px-5">AddCart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>
@endsection
