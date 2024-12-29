@extends('layouts.home')

@section('form_action')
    {{ route('admin_category_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_category') }}'"
@endsection
@section('blank_scripts')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <h2>My Cart</h2>
            <?php $total = 0; ?>
            @if ($cart)
                @foreach ($cart as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity'];
                    @endphp
                    <div class="card mb-3 mt-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div>
                                        <img src="{{ Storage::url($details['image']) }}" class="img-fluid rounded-3"
                                            alt="Shopping item" style="width: 65px;">
                                    </div>
                                    <div class="ms-3">
                                        <h5>{{ $details['name'] }}</h5>

                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <div style="width: 50px;">
                                        <h5 class="fw-normal mb-0">{{ $details['quantity'] }}</h5>
                                    </div>
                                    <div style="width: 80px;">
                                        <h5 class="mb-0">{{ $details['price'] }}</h5>
                                    </div>
                                    <a href="{{ route('removeCartItem', ['id' => $id]) }}" style="color: #cecece;"><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-lg-6">
            <h2>Order Now</h2>

            <div class="mb-8 mt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-11 col-xl-10">

                            <div class="mb-8">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-11 col-xl-10">

                                            <form action={{ route('order_store') }} id="dynamic_form" name="dynamic_form"
                                                method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="Total" id="Total"
                                                    value="{{ $total }}" autocomplete="off">
                                                <div class="form-group">
                                                    <label for="TableNo" id="labelforTableNo">TableNo</label>

                                                    <input class="form-control" name="TableNo" id="TableNo"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Note" id="labelforNote">Note</label>
                                                    <input class="form-control" name="Note" id="Note"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group d-none">
                                                    <label for="IP" id="labelforIP">IP</label>

                                                    <input class="form-control" name="IP" id="IP"
                                                        aria-describedby="emailHelp">
                                                </div>

                                                <button type="submit" class="btn btn-primary">ORDER</button>
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="window.location.href='{{ route('showcart') }}'">Cancel</button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
