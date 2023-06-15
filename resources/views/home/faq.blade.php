@extends('home.includes.layout')
@section('content')

    <!-- ================FAQ section start here <================== -->
    <section id="faq" class="faq padding-top padding-bottom">
        <div class="container">
            <div class="section-header text-center">
                <p class="subtitle">Questions & Answers</p>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="faq__wrapper">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="accordion" id="faqAccordion">
                            <div class="row g-4">
                                @foreach ($faq as $faq)
                                <div class="col-12">
                                    <div class="accordion__item" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="accordion__header" id="faq1">
                                            <button class="accordion__button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faqBody{{ $faq->id }}"
                                            aria-expanded="false" aria-controls="faqBody">
                                            {{$faq->question}}<span class="plus-icon"></span>
                                        </button>
                                    </div>
                                    <div id="faqBody{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="faq1"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion__body">
                                        {{$faq->answer}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================FAQ section end here <================== -->


@endsection
@section('script-area')

<script>
$(document).ready(function() {
    $(".accordion").on("click", ".heading", function() {

        $(this).toggleClass("active").next().slideToggle();

        $(".contents").not($(this).next()).slideUp(300);

        $(this).siblings().removeClass("active");
    });
});
</script>

@endsection