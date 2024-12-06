@extends('admin.blank')



@section('table_th')
    <th>Proccess</th>
    <th>Name</th>
    <th>Keywords</th>
    <th>Description</th>
    <th>CategoryID</th>
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
            <td>{{ $cat->Category_ID }}</td>
            <td>{{ $cat->Image }}</td>
            <td>{{ $cat->Status }}</td>

            <td class="center">{{ $cat->created_at }}</td>
            <td class="center">{{ $cat->updated_at }}</td>
        </tr>
    @endforeach
@endsection



@section('content')
    @include('components._tableGeneric')
@endsection
