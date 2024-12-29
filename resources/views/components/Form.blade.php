@if (str_contains(url()->current(), 'alert'))
    <div class="alert alert-success alert-dismissible fade show" id="alertdiv" role="alert">

        <strong>{{ Auth::user()->email }}</strong> Record Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action=@yield('form_action') enctype="multipart/form-data" id="dynamic_form" name="dynamic_form" method="post">
    @csrf

    @foreach ($data as $cat => $value)
        <div class="form-group">

            <label for="{{ $cat }}" id="labelfor{{ $cat }}">{{ $cat }}</label>

            @if (str_contains(url()->current(), 'add'))
                @if (str_contains($cat, 'Category_ID'))
                    <select class="form-select" aria-label="Default select example" name="{{ $cat }}">
                        <option selected></option>

                        @foreach ($dataCategory as $dataCat)
                            <option value="{{ $dataCat->ID }}">{{ $dataCat->Title }}</option>
                        @endforeach
                    </select>
                @elseif (str_contains($cat, 'User_ID'))
                    @if (isset($dataUser))
                        <select class="form-select" aria-label="Default select example" name="{{ $cat }}">
                            <option selected></option>

                            @foreach ($dataUser as $dataUserEx)
                                <option value="{{ $dataUserEx->id }}">{{ $dataUserEx->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input class="form-control" name="{{ $cat }}" id="{{ $cat }}"
                            aria-describedby="emailHelp">
                    @endif
                @elseif($cat == 'Image')
                    <input type="file" class="form-control" name="{{ $cat }}" id="{{ $cat }}">
                @elseif ($cat == 'Description' or $cat == 'AboutUs' or $cat == 'Contact' or $cat == 'Detail')
                    <textarea class="ckeditor" name="{{ $cat }}" id="{{ $cat }}" rows="10"></textarea>
                @elseif (str_contains($cat, 'tatus'))
                    <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                        aria-label="Default select example">
                        <option selected>approved</option>
                        <option>pending</option>
                        <option>rejected</option>
                    </select>
                @else
                    <input class="form-control" name="{{ $cat }}" id="{{ $cat }}"
                        aria-describedby="emailHelp">
                @endif
            @else
                @if (str_contains($cat, 'Category_ID'))
                    <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                        aria-label="Default select example">
                        <option selected></option>

                        @foreach ($dataCategory as $dataCat)
                            <option {{ $value === $dataCat->ID ? 'selected' : '' }} value="{{ $dataCat->ID }}">
                                {{ $dataCat->Title }}</option>
                        @endforeach
                    </select>
                @elseif (str_contains($cat, 'User_ID'))
                    @if ($dataUser)
                        <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                            aria-label="Default select example">
                            <option selected></option>

                            @foreach ($dataUser as $dataUserEx)
                                <option {{ $value === $dataUserEx->id ? 'selected' : '' }}
                                    value="{{ $dataUserEx->id }}">
                                    {{ $dataUserEx->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <input value="{{ $value }}" class="form-control" name="{{ $cat }}"
                            id="{{ $cat }}" aria-describedby="emailHelp">
                    @endif
                @elseif ($cat == 'Image')
                    <input value="{{ $value }}" title="{{ $value }}" type="file" class="form-control"
                        name="{{ $cat }}" id="{{ $cat }}">
                    <script>
                        document.getElementById("labelfor{{ $cat }}").innerText = "{{ $value }}"
                    </script>
                @elseif ($cat == 'Description' or $cat == 'AboutUs' or $cat == 'Contact' or $cat == 'Detail')
                    <textarea class="ckeditor" name="{{ $cat }}" id="{{ $cat }}" rows="10">{{ $value }}</textarea>
                @elseif (str_contains($cat, 'tatus'))
                    <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                        aria-label="Default select example">
                        <option {{ $value === 'approved' ? 'selected' : '' }}>approved</option>
                        <option {{ $value === 'pending' ? 'selected' : '' }}>pending</option>
                        <option {{ $value === 'rejected' ? 'selected' : '' }}>rejected</option>
                    </select>
                @else
                    <input value="{{ $value }}" class="form-control" name="{{ $cat }}"
                        id="{{ $cat }}" aria-describedby="emailHelp">
                @endif
            @endif
        </div>
        @if ($loop->first)
            <script>
                var element = document.getElementById("{{ $cat }}");
                element.classList.add("d-none")
                var element2 = document.getElementById("labelfor{{ $cat }}");
                element2.classList.add("d-none")
            </script>
        @endif
    @endforeach
    <button type="submit" class="btn btn-primary">Update</button>
    <button type="button" class="btn btn-secondary" @yield('cancel_route')>Cancel</button>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById("Description"))
        .catch(error => {
            console.error(error);
        });
    CKEDITOR.replace('Description');
</script>
<script>
    ClassicEditor
        .create(document.getElementById("Detail"))
        .catch(error => {
            console.error(error);
        });
    CKEDITOR.replace('Detail');
</script>

<script>
    ClassicEditor
        .create(document.getElementById('AboutUs'))
        .catch(error => {
            console.error(error);
        });
    CKEDITOR.replace('AboutUs');
</script>

<script>
    ClassicEditor
        .create(document.getElementById('Contact'))
        .catch(error => {
            console.error(error);
        });
    CKEDITOR.replace('Contact');
</script>
