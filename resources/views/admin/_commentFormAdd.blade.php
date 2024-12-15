@extends('admin.blank')

@section('form_action')
    {{ route('admin_comments_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_comments') }}'"
@endsection


@section('content')
    @include('components.Form')
@endsection
