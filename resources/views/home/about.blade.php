@extends('home.includes.layout')
@section('content')

    <!-- ================> About section start here <================== -->
    <section class="about padding-top padding-bottom" id="about" style="background-image: url({{asset('frontend/assets/images/banner/bg.png')}});">
        <div class="container">
            <div class="about__wrapper">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="about__thumb" data-aos="fade-up" data-aos-duration="1500">
                            <img src="{{asset('frontend/assets/images/about/01.png')}}" alt="About Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content" data-aos="fade-up" data-aos-duration="2000">
                            <p class="subtitle">The Story</p>
                            <h2>About us</h2>
                            <p>{!! $about->value??''!!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================> About section end here <================== -->

@endsection
