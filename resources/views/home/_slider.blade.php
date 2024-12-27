<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        width: 100%;
    }
</style>
<div class="text-center">
    <div class="row g-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">


            <div class="d-flex justify-content-center">
                <!-- Carousel -->

                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < count($sliders); $i++)
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $i }}"
                                @if ($i == 0) class="active" @endif></button>
                        @endfor

                    </div>

                    <!-- The slideshow/carousel -->

                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                            <a href="{{ route('detail', ['id' => $slider->Product_ID]) }}">
                                <div class="card">
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ Storage::url($slider->product->Image) }}" alt="Los Angeles"
                                            class="d-block card-img-top" style="width:100%">
                                        <div class="carousel-caption">
                                            <h2 class="card-header">{{ $slider->Title }}</h2>
                                            <div class="card-body">
                                                <p class="card-footer">
                                                    @php
                                                        echo html_entity_decode($slider->Description);
                                                    @endphp
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

        </div>
        <div class="col-3"></div>
    </div>
</div>
