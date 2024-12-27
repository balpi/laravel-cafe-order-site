@extends('layouts.home')
@section('content')
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">About Us</h2>
                <h1 class="display-4 text-uppercase">Welcome To DenizCafe</h1>
            </div>
            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assets') }}/img/about.jpg"
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>
            <div class="row gx-5">

                <div class="row">
                    @php
                        echo html_entity_decode($setting->AboutUs);
                    @endphp

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
