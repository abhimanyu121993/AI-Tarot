@extends('home.includes.layout')
@section('content')

    <!-- ================> About section start here <================== -->
    <section class="about padding-top padding-bottom" id="about" style="background-image: url({{asset('frontend/assets/images/banner/bg.png')}});">
        <div class="container">
            <div class="about__wrapper">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="about__content" data-aos="fade-up" data-aos-duration="2000">
                            <h2>Terms & Condition</h2>
                            <p>{!! $terms->value??''!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> About section end here <================== -->

@endsection
