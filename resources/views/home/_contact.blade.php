@extends('layouts.home')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid contact position-relative px-5">
        <div class="container-fluid bg-dark bg-img mb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 text-uppercase text-white">Contact Us</h1>
                    <a href="">Home</a>
                    <i class="far fa-square text-primary px-2"></i>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <div class="container">
            @include('home._flashMessage')

            @php
                echo html_entity_decode($setting->Contact);
            @endphp



            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('sendmessage') }}" method="post" class="contact-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <input type="text" name="Name" class="form-control bg-light border-0 px-4"
                                    placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" name="Email" class="form-control bg-light border-0 px-4"
                                    placeholder="Your Email" style="height: 55px;">
                            </div>

                            <div class="col-sm-8">
                                <input type="text"name="Subject" class="form-control bg-light border-0 px-4"
                                    placeholder="Subject" style="height: 55px;">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="Phone" class="form-control bg-light border-0 px-4"
                                    placeholder="Phone" style="height: 55px;">
                            </div>
                            <div class="col-sm-12">
                                <textarea name="Message" class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Message"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-primary border-inner w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
