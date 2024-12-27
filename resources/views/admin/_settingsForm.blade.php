@extends('admin.blank')

@section('form_action')
    {{ route('admin_setting_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin') }}'"
@endsection

@section('blank_scripts')
@endsection

@section('content')
    @include('components.Form')
@endsection
