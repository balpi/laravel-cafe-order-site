@extends('admin.blank')

@section('form_action')
    {{ route('admin_faq_update') }}
@endsection

@section('cancel_route')
    onclick="window.location.href='{{ route('admin_faq') }}'"
@endsection
@section('content')
    @include('components.Form')
@endsection
