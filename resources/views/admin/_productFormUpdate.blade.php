@extends('admin.blank')


@section('form_action')
    {{ route('admin_product_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_product') }}'"
@endsection

@section('content')
    @include('components.Form')
@endsection
