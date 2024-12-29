@extends('layouts.home')

@section('content')
    <div class="mb-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-xl-10">
                    <div class="d-flex align-items-end mb-5">
                        <i class="bi bi-person-gear me-3 lh-1 display-5"></i>
                        <h3 class="m-0">Frequently Asked Questions</h3>
                    </div>
                </div>
                <div class="col-11 col-xl-10">
                    @foreach ($faqs as $faq)
                        <div class="accordion accordion-flush" id="faqAccount">
                            <div class="accordion-item bg-transparent border-top border-bottom py-3">
                                <h2 class="accordion-header" id="faqAccountHeading1">
                                    <button
                                        class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ 'faqAccountCollapse1' . $faq->ID }}" aria-expanded="false"
                                        aria-controls="faqAccountCollapse1">
                                        {{ $faq->Question }}
                                    </button>
                                </h2>
                                <div id="{{ 'faqAccountCollapse1' . $faq->ID }}" class="accordion-collapse collapse"
                                    aria-labelledby="faqAccountHeading1">
                                    <div class="accordion-body">
                                        <p>{{ $faq->Answer }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
