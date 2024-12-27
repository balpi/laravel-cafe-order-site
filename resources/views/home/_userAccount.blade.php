@extends('home.blank')

@section('content')
    <div class="container-fluid row">
        <div class="col-3">
            <div class="row flex-nowrap">
                <div class="col-auto px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/"
                            class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Profile</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">My Orders</span></a>
                            </li>
                            <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                    <i class="fs-4 bi-cart"></i> <span class="ms-1 d-none d-sm-inline">My Shop
                                        Basket</span></a>

                            </li>
                            <li>
                                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-envelope"></i> <span class="ms-1 d-none d-sm-inline">Messages</span>
                                </a>

                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-chat-dots"></i> <span class="ms-1 d-none d-sm-inline">My
                                        Comments</span>
                                </a>
                            </li>
                        </ul>


                    </div>
                </div>

            </div>
        </div>
        <div class="col-9">
            <iframe src="{{ route('iframeBlank') }}" width="100%" seamless="seamless" height="100%">



            </iframe>
        </div>
    </div>
@endsection
