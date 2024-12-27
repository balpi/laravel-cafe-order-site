@extends('home._userAccount')

@section('userprofile')
    <form action="" enctype="multipart/form-data" id="dynamic_form" name="dynamic_form" method="post">
        @csrf

        @foreach ($myaccount as $cat => $value)
            @if ($loop->first)
                @continue
            @endif
            <div class="form-group">
                <label for="{{ $cat }}" id="labelfor{{ $cat }}">{{ $cat }}</label>
                <input value="{{ $value }}" class="form-control" name="{{ $cat }}" id="{{ $cat }}"
                    aria-describedby="emailHelp">
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary">Cancel</button>
    </form>
@endsection
