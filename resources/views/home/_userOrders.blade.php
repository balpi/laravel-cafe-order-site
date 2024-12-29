@extends('layouts.home')

@section('content')
    <div class="mb-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-xl-10">
                    <div class="d-flex align-items-end mb-5">
                        <i class="bi bi-person-gear me-3 lh-1 display-5"></i>
                        <h3 class="m-0">My Orders</h3>
                    </div>
                </div>
                <div class="col-11 col-xl-10">
                    @foreach ($orders as $order)
                        <div class="accordion accordion-flush" id="faqAccount">
                            <div class="accordion-item bg-transparent border-top border-bottom py-3">
                                <h2 class="accordion-header" id="faqAccountHeading1">

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">

                                                            <div class="ms-3">
                                                                <h5>{{ $order->updated_at }}</h5>

                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0">
                                                                    {{ $order->Orders_Product->count() }} </h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0">{{ $order->Total }}</h5>
                                                            </div>

                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">

                                                            <div class="ms-3">
                                                                <h5>{{ $order->Status }}</h5>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-2">
                                            <button
                                                class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#{{ 'faqAccountCollapse1' . $order->ID }}"
                                                aria-expanded="false" aria-controls= "faqAccountCollapse1">
                                            </button>
                                        </div>
                                    </div>
                                </h2>
                                <div id="{{ 'faqAccountCollapse1' . $order->ID }}" class="accordion-collapse collapse"
                                    aria-labelledby="faqAccountHeading1">
                                    <div class="accordion-body">
                                        @foreach ($order->Orders_Product as $order_product)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="{{ Storage::url($order_product->product->Image) }}"
                                                                    class="img-fluid rounded-3" alt="Shopping item"
                                                                    style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5>{{ $order_product->product->Title }}</h5>

                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 30px;">
                                                                <h5 class="fw-normal mb-0">{{ $order_product->Amount }}</h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0">{{ $order_product->Price }}</h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0">{{ $order_product->Total }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
