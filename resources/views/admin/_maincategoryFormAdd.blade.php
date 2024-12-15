@extends('admin.blank')

@section('form_action')
    {{ route('admin_maincategory_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_maincategory') }}'"
@endsection


@section('content')
    @include('components.Form')
@endsection
