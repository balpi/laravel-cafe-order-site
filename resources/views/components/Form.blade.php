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
                    <select class="form-select" aria-label="Default select example" name="{{ $cat }}">
                        <option selected></option>

                        @foreach ($dataUser as $dataUserEx)
                            <option value="{{ $dataUserEx->id }}">{{ $dataUserEx->name }}
                            </option>
                        @endforeach
                    </select>
                @elseif($cat == 'Image')
                    <input type="file" class="form-control" name="{{ $cat }}" id="{{ $cat }}">
                @elseif ($cat == 'Description')
                    <textarea class="ckeditor" name="Description" id="Description" rows="10"></textarea>
                @elseif (str_contains($cat, 'tatus'))
                    <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                        aria-label="Default select example">
                        <option selected>Active</option>
                        <option>Passive</option>
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
                    <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                        aria-label="Default select example">
                        <option selected></option>


                        @foreach ($dataUser as $dataUserEx)
                            <option {{ $value === $dataUserEx->id ? 'selected' : '' }} value="{{ $dataUserEx->id }}">
                                {{ $dataUserEx->name }}</option>
                        @endforeach
                    </select>
                @elseif ($cat == 'Image')
                    <input value="{{ $value }}" title="{{ $value }}" type="file" class="form-control"
                        name="{{ $cat }}" id="{{ $cat }}">
                    <script>
                        document.getElementById("labelfor{{ $cat }}").innerText = "{{ $value }}"
                    </script>
                @elseif ($cat == 'Description')
                    <textarea class="ckeditor" name="Description" id="Description" rows="10">{{ $value }}</textarea>
                @elseif (str_contains($cat, 'tatus'))
                    <select class="form-select" name="{{ $cat }}" id="{{ $cat }}"
                        aria-label="Default select example">
                        <option {{ $value === 'Active' ? 'selected' : '' }}>Active</option>
                        <option {{ $value === 'Active' ? 'selected' : '' }}>Passive</option>
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
