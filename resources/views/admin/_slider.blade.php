@extends('admin.blank')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="w-75">
        <h2 class="col-md-8">Your Slider</h2>
        <div class="container col-md-8">
            <!-- Carousel -->

            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    @for ($i = 0; $i < count($sliders); $i++)
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $i }}"
                            @if ($i == 0) class="active" @endif></button>
                    @endfor

                </div>

                <!-- The slideshow/carousel -->

                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="card">
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ Storage::url($slider->product->Image) }}" alt="Los Angeles"
                                    class="d-block card-img-top" style="width:100%">
                                <div class="carousel-caption">
                                    <h2 class="card-header">{{ $slider->Title }}</h2>
                                    <div class="card-body">
                                        <p class="card-footer">
                                            @php
                                                echo html_entity_decode($slider->Description);
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="divide-red-500"></div>
    <h2 class="col-md-8">Products in Slider</h2>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Process</th>
                        <th>Slider Title</th>
                        <th>Slider Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($sliders as $slider)
                        <tr class="@if ($loop->odd) odd gradeX @else even gradeC @endif">
                            <form action="{{ route('admin_slider_update', ['id' => $slider->id]) }}" method="POST">
                                @csrf

                                <td>
                                    <input type="hidden" name="ID" value="{{ $slider->id }}">
                                    <button type="submit" class="btn btn-primary">Update</button>

                                    <button type="button"
                                        onclick="window.location='{{ route('admin_slider_remove', ['id' => $slider->id]) }}'"
                                        class="btn btn-danger">Remove
                                    </button>

                                </td>
                                <td><input type="text" name="Title" value="{{ $slider->Title }}"></td>

                                <td>
                                    <textarea class="ckeditor" data-S="{{ $slider->id . 'Description' }}" name="Description"
                                        id="{{ $slider->id . 'Description' }}" value="{{ $slider->Description }}">
                                {{ $slider->Description }}
                            </textarea>
                                </td>

                                <td>
                                    <img class="img-fluid img-thumbnail w-100"
                                        src="{{ Storage::url($slider->product->Image) }}" alt="">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="divide-red-500"></div>
    <h2 class="col-md-8">All Products</h2>

    <div class="row">
        @yield('new_button')

        <div class="col-sm-6">
            <div class="dataTables_length" id="dataTables-example_length">
                <label>
                    <select name="dataTables-example_length" id="pagination" content="{{ csrf_token() }}"
                        aria-controls="dataTables-example" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    records per page
                </label>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="dataTables-example_filter" class="dataTables_filter">
                <label>Search:
                    <input type="search" id="searchBox" class="form-control input-sm" aria-controls="dataTables-example">
                </label>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Process</th>
                        <th>Name</th>
                        <th>Keywords</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $cat)
                        <tr class="@if ($loop->odd) odd gradeX @else even gradeC @endif">
                            <td>
                                <button type="button"
                                    onclick="window.location='{{ route('admin_slider_add', ['id' => $cat->ID]) }}'"
                                    class="btn btn-success" data-ID="{{ $cat->ID }}">AddToSlider</button>
                            </td>
                            <td>{{ $cat->Title }}</td>
                            <td>{{ $cat->Keywords }}</td>
                            <td>{{ $cat->Description }}</td>
                            <td>
                                @if ($cat->Image)
                                    <img class="img-fluid img-thumbnail w-50" src="{{ Storage::url($cat->Image) }}"
                                        alt="">
                                @endif
                            </td>
                            <td class="center">{{ $cat->category->Title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4 id="record_length"></h4>
            </div>
            <div class="col-md-6">
                @if (!$data->isEmpty())
                    {{ $data->Links() }}
                @endif
            </div>
        </div>
    </div>

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS - AT THE BOTTOM TO REDUCE THE LOAD TIME -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- BOOTSTRAP SCRIPTS -->

    <!-- METISMENU SCRIPTS -->

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>



    <script>
        var element = Array.from($('[data-S*="Description"]'));
        element.forEach(function(item) {

            ClassicEditor
                .create(document.getElementById(item.id))
                .catch(error => {
                    console.error(error);
                });

        });
        element.forEach(function(item) {
            CKEDITOR.replace("'" + item.id + "'");
        });
    </script>
@endsection

@section('script')
@endsection
