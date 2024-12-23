@extends('admin.blank')

@section('form_action')
    {{ route('admin_product_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_product_add') }}'"
@endsection

@section('blank_scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.getElementById("Description"))
            .catch(error => {
                console.error(error);
            });
        CKEDITOR.replace('Description');
    </script>
@endsection

@section('content')
    @include('components.Form')
@endsection
