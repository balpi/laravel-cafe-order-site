@extends('admin.blank')

@section('form_action')
    {{ route('admin_messages_store') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_messages') }}'"
@endsection


@section('content')
    @include('components.Form')
@endsection
