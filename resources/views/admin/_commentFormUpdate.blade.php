@extends('admin.blank')

@section('form_action')
    {{ route('admin_comments_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_comments') }}'"
@endsection
@section('content')
    @include('components.Form')
@endsection
