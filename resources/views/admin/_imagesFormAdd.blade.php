@extends('admin.blank')


@section('content')
    @if (str_contains(url()->current(), 'alert'))
        <div class="alert alert-success alert-dismissible fade show" id="alertdiv" role="alert">

            <strong>{{ Auth::user()->email }}</strong> Record Removed
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action={{ route('admin_images_store', ['id' => $data->ID]) }} enctype="multipart/form-data" id="dynamic_form"
        name="dynamic_form" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group">

                <input type="text" class="form-control d-none" value="{{ $data->ID }}" name=Product_ID
                    id="Product_ID">
                <input type="text" class="form-control d-none" value="AddingPage" name="AddingPage" id="AddingPage">
            </div>
            <label type="text" class="form-control" name="{{ $data->Title }}"
                id="{{ $data->Title }}">{{ $data->Title }}</label>
        </div>
        <label for="Title" class="form-control" id="{{ $data->Title }}">Title</label>
        <div class="form-group">

            <input type="text" class="form-control" name=Title id="Title">
        </div>
        <div class="form-group">

            <input type="file" class="form-control" name=Image id="Image">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>

        <button type="button" class="btn btn-secondary"
            onclick="window.location.href='{{ route('admin_product') }}'">Cancel</button>
    </form>

    <div class="row">
        <table>
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Product Id</th>
                <th>Remove</th>

            </thead>
            <tbody>
                @foreach ($dataImage as $images)
                    <tr>
                        <td>
                            @if ($images->Image)
                                <img class="h-25 w-50 d-inline-block" src="{{ Storage::url($images->Image) }}"
                                    alt="">
                            @endif
                        </td>
                        <td>{{ $images->Title }}</td>
                        <td>{{ $images->Products_ID }}</td>
                        <td><button type="button" miss="Delete"
                                onclick="window.location.href='{{ route('admin_images_remove', ['id' => $images->ID, 'pid' => $images->Products_ID]) }}'"
                                class="btn btn-danger">Remove</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
