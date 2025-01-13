@extends('admin.blank')
@section('table_th')
    <th style="width: 20%">Proccess</th>
    <th style="width: 10%">Name</th>
    <th style="width: 10%">Keywords</th>
    <th style="width: 20%">Description</th>
    <th style="width: 10%">CategoryID</th>
    <th style="width: 20%">Image</th>
    <th style="width: 10%">Add İmages</th>
@endsection

@section('table_tbody')
    @foreach ($data as $cat)
        <tr class="@if ($loop->odd) odd gradeX  @else even gradeC @endif">
            <td>
                <button type="button" miss="Update" data-ID="{{ $cat->ID }}"
                    class="btn btn-success m-1">Update</button>
                <button type="button" miss="Delete" data-ID={{ $cat->ID }} class="btn btn-danger m-1">Remove</button>
            </td>
            <td>{{ $cat->Title }}</td>
            <td>{{ $cat->Keywords }}</td>
            <td>{{ $cat->Description }}</td>
            <td>{{ $cat->category->ID }}</td>
            <td>

                @if ($cat->Image)
                    <img class="img-fluid img-thumbnail" src="{{ Storage::url($cat->Image) }}" alt="">
                @endif
            </td>
            <td>

                <a class="nav-item d-inline-flex text-decoration-none rounded"
                    href="{{ route('admin_images_add', ['id' => $cat->ID]) }}">
                    <i class="fa-solid fa-upload fa-3x"></i>Add Image
                </a>
            </td>

        </tr>
    @endforeach
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-1.10.2.js"></script>

    <script>
        document.getElementById('pagination').onchange = function() {
            window.location = "{{ $data->url(1) }}&items=" + this.value;


        };
        document.getElementById('searchBox').onchange = function() {
            window.location = "{{ $data->url(1) }}/&search=" + this.value;


        }

        const buttons = document.getElementsByTagName("button");
        const buttonsArray = [...buttons];
        buttonsArray.forEach((item) => {
            item.addEventListener("click", function() {
                if (item.hasAttribute('miss')) {

                    if (event.target.getAttribute('miss') == "Update") {
                        window.location =
                            "{{ route('admin_product_find') }}/" +
                            event.target.getAttribute('data-ID')

                    } else {
                        window.location =
                            "{{ route('admin_product_remove') }}/" +
                            event.target.getAttribute('data-ID')

                    }


                }
            })
        });
        jQuery(document).ready(function() {
            var queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            if (urlParams.has('items')) {
                document.getElementById('pagination').value = urlParams.get('items');
            }
            if (urlParams.has('search')) {
                document.getElementById('searchBox').value = urlParams.get('search');
            }
        });
    </script>
@endsection
@section('new_button')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-3">
            <button onclick="window.location.href='{{ route('admin_product_add') }}'" class="btn btn-primary">Add
                New</button>
        </div>
    </div>
@endsection
@section('content')
    @include('components._tableGeneric')
@endsection
