@extends('admin.blank')

@section('form_action')
    {{ route('admin_maincategory_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_maincategory') }}'"
@endsection
@section('content')
    @include('components.Form')
@endsection
