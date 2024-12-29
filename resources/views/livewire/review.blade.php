<style>
    .rate {
        border-bottom-right-radius: 12px;
        border-bottom-left-radius: 12px
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

    .buttons {
        top: 36px;
        position: relative
    }

    .rating-submit {
        border-radius: 8px;
        color: #fff;
        height: auto
    }

    .rating-submit:hover {
        color: #fff
    }
</style>

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div>

    <form action="{{ route('addComment') }}" class="rate">
        @csrf
        <input type="hidden" name="Product_ID" value="{{ $product->ID }}">

        <div class="rating">
            <input type="radio" name="rating" value="5" id="5">
            <label for="5">☆</label>
            <input type="radio" name="rating" value="4" id="4">
            <label for="4">☆</label>
            <input type="radio" name="rating" value="3" id="3">
            <label for="3">☆</label>
            <input type="radio" name="rating" value="2" id="2">
            <label for="2">☆</label>
            <input type="radio" name="rating" value="1" id="1">
            <label for="1">☆</label>
        </div>


        <textarea class="form-control" name="comment" id="comment" rows="2" placeholder="Write your review"></textarea>



        <button type="submit" value="save" name="btn" id="btns"
            class="btn btn-info px-4 py-1 rating-submit">Rate</button>

    </form>
</div>
