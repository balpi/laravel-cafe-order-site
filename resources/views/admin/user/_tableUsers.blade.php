@extends('admin.blank')



@section('table_th')
    <th style="width: 20%">Proccess</th>
    <th style="width: 10%">name</th>
    <th style="width: 10%">Role</th>
    <th style="width: 10%">email</th>
    <th style="width: 10%">password</th>
    <th style="width: 20%">profile_photo_path</th>
    <th style="width: 10%">created_at</th>
    <th style="width: 10%">updated_at</th>
@endsection

@section('table_tbody')
    @foreach ($data as $cat)
        <tr class="@if ($loop->odd) odd gradeX  @else even gradeC @endif">
            <td>
                <button type="button" miss="Update" data-ID="{{ $cat->id }}"
                    class="btn btn-success m-1">Update</button>
                <button type="button" miss="Delete" data-ID={{ $cat->id }} class="btn btn-danger m-1">Remove</button>
                <form action="{{ route('MakeAdmin', ['id' => $cat->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $cat->id }}">
                    @if ($cat->roles[0]->name == 'admin')
                        <button type="submit" class="btn btn-secondary m-1">MakeUser</button>
                    @else
                        <button type="submit" class="btn btn-secondary m-1">MakeAdmin</button>
                    @endif

                </form>
            </td>

            <td>{{ $cat->name }}</td>
            <td>{{ $cat->roles[0]->name }}</td>
            <td>{{ $cat->email }}</td>
            <td>{{ $cat->password }}</td>
            <td>{{ $cat->profile_photo_path }}</td>
            <td>{{ $cat->created_at }}</td>
            <td>{{ $cat->updated_at }}</td>
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
                            "{{ route('admin_users_find') }}/" +
                            event.target.getAttribute('data-ID')

                    } else {
                        window.location =
                            "{{ route('admin_users_remove') }}/" +
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
            <button onclick="window.location.href='{{ route('admin_users_add') }}'" class="btn btn-primary">Add
                New</button>
        </div>
    </div>
@endsection
@section('content')
    @include('components._tableGeneric')
@endsection
