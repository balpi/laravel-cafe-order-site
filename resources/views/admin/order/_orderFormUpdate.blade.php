@extends('admin.blank')

@section('form_action')
    {{ route('admin_orders_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_orders') }}'"
@endsection
@section('content')
    @include('components.Form')
@endsection
