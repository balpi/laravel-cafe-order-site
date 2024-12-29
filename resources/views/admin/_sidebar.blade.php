<div class="sidebar-sticky">
    <nav class="navbar-default navbar-side sidebar" role="navigation">
        <div class="sidebar-collapse sidebar-sticky">
            <ul class="nav flex-column" id="">
                <li class="text-center">

                    @if (Auth::user()->profile_photo_path)
                        <img src="{{ Storage::url(Auth::user()->profile_photo_path) }}" class="user-image" />
                    @else
                        <img src="{{ asset('assets') }}/img/find_user.png" class="user-image" />
                    @endif



                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}"><i class="fa fa-dashboard fa-3x"></i>
                        Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_users') }}"><i class="fa fa-user fa-3x"></i>
                        Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_slider') }}"><i class="fa fa-user fa-3x"></i>
                        SliderControl</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_setting_get') }}"><i class="fa fa-desktop fa-3x"></i>
                        Settings</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_category') }}"><i class="fa fa-desktop fa-3x"></i>
                        Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_product') }}"><i class="fa fa-desktop fa-3x"></i>
                        Products</a>
                </li>

                <li class="nav-item">

                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0"
                        style="color: white" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                        aria-expanded="true">
                        <i class="fa fa-sitemap fa-3x"></i>Other Tables
                    </button>
                    <div class="collapse" id="dashboard-collapse" style="color: white">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 "style="color: white">
                            <li><a href="{{ route('admin_orders') }}"
                                    class="nav-link link-white d-inline-flex text-decoration-none rounded"
                                    style="color: white"> <i class="fa fa-shopping-cart fa-3x"></i>Orders
                                </a></li>
                            <li><a href="{{ route('admin_faq') }}"
                                    class="nav-link link-white d-inline-flex text-decoration-none rounded"
                                    style="color: white"><i class="fa fa-question-circle fa-3x" style="color: white">
                                    </i>Faq
                                </a></li>
                            <li><a href="{{ route('admin_messages') }}"
                                    class="nav-link link-white d-inline-flex text-decoration-none rounded"
                                    style="color: white"><i class="fa fa-inbox fa-3x" style="color: white"></i>Messages
                                </a></li>
                            <li><a href="{{ route('admin_comments') }}"
                                    class="nav-link link-white d-inline-flex text-decoration-none rounded"
                                    style="color: white"><i class="fa fa-comment fa-3x"
                                        style="color: white"></i>Comments
                                </a></li>
                        </ul>
                    </div>
                </li>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                </li>
                <li>
                    <a class="nav-link" href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                </li>
                <li>
                    <a class="nav-link" href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                </li>
            </ul>

        </div>

    </nav>
</div>
