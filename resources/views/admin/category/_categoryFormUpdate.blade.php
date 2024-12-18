@extends('admin.blank')

@section('form_action')
    {{ route('admin_category_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_category') }}'"
@endsection
@section('content')
    @include('components.Form')
@endsection
