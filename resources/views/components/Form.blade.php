@if ($alert == 'alert')
    <div class="alert alert-success alert-dismissible fade show" id="alertdiv" role="alert">

        <strong>{{ Auth::user()->email }}</strong> Record Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action="{{ route('admin_category_update') }}" method="POST">
    @csrf
    @foreach ($data as $cat => $value)
        <div class="form-group">


            <label for="{{ $cat }}">{{ $cat }}</label>
            <input value="{{ $value }}" class="form-control" name="{{ $cat }}" id="{{ $cat }}"
                aria-describedby="emailHelp">

        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Update</button>
    <button type="reset" class="btn btn-secondary"
        onclick="window.location='{{ route('admin_category') }}'">Cancel</button>
</form>
