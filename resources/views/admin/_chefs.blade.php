@extends('admin.blank')

@section('content')
    <div class="divide-red-500"></div>
    <h2 class="col-md-8">Products in Chefs</h2>

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

                    @foreach ($Chefs as $slider)
                        <tr class="@if ($loop->odd) odd gradeX @else even gradeC @endif">
                            <form action="{{ route('admin_chefs_update', ['id' => $slider->id]) }}" method="POST">
                                @csrf

                                <td>
                                    <input type="hidden" name="ID" value="{{ $slider->id }}">
                                    <button type="submit" class="btn btn-primary">Update</button>

                                    <button type="button"
                                        onclick="window.location='{{ route('admin_chefs_delete', ['id' => $slider->id]) }}'"
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
                                <form action="{{ route('admin_chefs_add', ['id' => $cat->ID]) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-success"
                                        data-ID="{{ $cat->ID }}">AddToChefs</button>
                                </form>
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
