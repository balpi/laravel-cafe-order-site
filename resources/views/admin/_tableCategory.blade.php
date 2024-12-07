@extends('admin.blank')



@section('table_th')
    <th>Proccess</th>
    <th>Name</th>
    <th>Keywords</th>
    <th>Description</th>
    <th>Image</th>
    <th>Status</th>
    <th>Create Date</th>
    <th>Last Update</th>
@endsection

@section('table_tbody')
    @foreach ($data as $cat)
        <tr class="@if ($loop->odd) odd gradeX  @else even gradeC @endif">
            <td>
                <button type="button" miss="Update" data-ID="{{ $cat->ID }}" class="btn btn-success">Update</button>
                <button type="button" miss="Delete" data-ID={{ $cat->ID }} class="btn btn-danger">Remove</button>
            </td>
            <td>{{ $cat->Title }}</td>
            <td>{{ $cat->Keywords }}</td>
            <td>{{ $cat->Description }}</td>
            <td>{{ $cat->Image }}</td>
            <td>{{ $cat->Status }}</td>

            <td class="center">{{ $cat->created_at }}</td>
            <td class="center">{{ $cat->updated_at }}</td>
        </tr>
    @endforeach
@endsection
@section('script')
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
                            "{{ route('admin_category_find') }}/" +
                            event.target.getAttribute('data-ID')
                    } else {
                        window.location =
                            "{{ route('admin_category_remove') }}/" +
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
            <button onclick="window.location.href='{{ route('admin_category_add') }}'" class="btn btn-primary">Add
                New</button>
        </div>
    </div>
@endsection
@section('content')
    @include('components._tableGeneric')
@endsection
