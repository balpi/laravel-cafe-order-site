<div>
    <input wire:model.live="search" type="text" name="search" list="mylist" class="form-text form-input"
        placeholder="Search Products">
    @if (!empty($query))

        <datalist id="mylist" name="mylist">
            @foreach ($datalist as $d)
                <option value="{{ $d->Title }}">
                    <img src="{{ Storage::url($d->Image) }}" alt="" class="img-fluid">
                    {{ $d->category->Title }}
                </option>
            @endforeach

    @endif

</div>
