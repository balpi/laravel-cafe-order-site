@extends('admin.blank')

@section('form_action')
    {{ route('admin_category_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_category') }}'"
@endsection
@section('blank_scripts')
@endsection

@section('content')
    @include('components.Form')
@endsection
