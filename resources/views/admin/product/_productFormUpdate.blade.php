@extends('admin.blank')


@section('form_action')
    {{ route('admin_product_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_product') }}'"
@endsection
@section('blank_scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
@endsection
@section('content')
    @include('components.Form')
@endsection
