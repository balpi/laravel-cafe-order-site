@extends('admin.blank')



@section('table_th')
    <th>id</th>
    <th>name</th>
    <th>email</th>
    <th>email_verified_at</th>
    <th>password</th>
    <th>two_factor_secret</th>
    <th>two_factor_recovery_codes</th>
    <th>two_factor_confirmed_at</th>
    <th>remember_token</th>
    <th>User_Role</th>
    <th>current_team_</th>
    <th>profile_photo_path</th>
    <th>created_at</th>
    <th>updated_at</th>
@endsection

@section('table_tbody')
    @foreach ($data as $cat)
        <tr class="@if ($loop->odd) odd gradeX  @else even gradeC @endif">
            <td>
                <button type="button" miss="Update" data-ID="{{ $cat->id }}" class="btn btn-success">Update</button>
                <button type="button" miss="Delete" data-ID={{ $cat->id }} class="btn btn-danger">Remove</button>
            </td>
            <td class="d-hide">{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->email }}</td>
            <td>{{ $cat->email_verified_at }}</td>
            <td>{{ $cat->password }}</td>
            <td>{{ $cat->two_factor_secret }}</td>
            <td>{{ $cat->two_factor_recovery_codes }}</td>
            <td>{{ $cat->two_factor_confirmed_at }}</td>
            <td>{{ $cat->remember_token }}</td>
            <td>{{ $cat->User_Role }}</td>
            <td>{{ $cat->current_team_ }}</td>
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
