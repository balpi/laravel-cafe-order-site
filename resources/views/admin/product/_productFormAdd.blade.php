@extends('admin.blank')

@section('form_action')
    {{ route('admin_product_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_product_add') }}'"
@endsection


@section('content')
    @include('components.Form')
@endsection
