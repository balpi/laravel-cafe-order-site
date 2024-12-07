@if (isset($alert) and $alert == 'alert')
    <div class="alert alert-success alert-dismissible fade show" id="alertdiv" role="alert">

        <strong>{{ Auth::user()->email }}</strong> Record Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action=@yield('form_action') id="dynamic_form" method="post">
    @csrf

    @foreach ($data as $cat => $value)
        <div class="form-group">


            <label for="{{ $cat }}">{{ $cat }}</label>
            @if (str_contains(url()->current(), 'add'))
                <input class="form-control" name="{{ $cat }}" id="{{ $cat }}"
                    aria-describedby="emailHelp">
            @else
                <input value="{{ $value }}" class="form-control" name="{{ $cat }}"
                    id="{{ $cat }}" aria-describedby="emailHelp">
            @endif
            @if ($loop->first)
                <script>
                    var element = document.getElementById("{{ $cat }}");
                    element.classList.add("d-none")
                </script>
            @endif




        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Update</button>
    <button type="button" class="btn btn-secondary" @yield('cancel_route')>Cancel</button>
</form>
