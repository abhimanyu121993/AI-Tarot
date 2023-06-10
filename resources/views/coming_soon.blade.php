<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AITarot- Tarot coming soon</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css')}}">

    <!-- main css for template -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
</head>

<body>

    <!-- ===============>> Preloader start here <<================= -->
    <div class="preloader">
        <img src="{{ asset('frontend/assets/images/logo/preloader.png')}}" alt="SuperHero">
    </div>
    <!-- ===============>> Preloader end here <<================= -->



    <!-- ================> coming soon section start here <================== -->
    <section class="coming-soon">
        <div class="coming-soon__inner">
            <div class="coming-soon__content">
                <h2 class="color--gradient-y">We're Coming Soon ! </h2>
                <p>We are working hard to bring you new experience</p>
                <ul class="countdown" data-date="July 25, 2022 21:14:01" id="countdown">
                    <li class="countdown__item">
                        <h3 class="countdown__number color--theme-color countdown__number-days">99</h3>
                        <p class="countdown__text">Days</p>
                    </li>
                    <li class="countdown__item">
                        <h3 class="countdown__number color--theme-color countdown__number-hours">18</h3>
                        <p class="countdown__text">Hour</p>
                    </li>
                    <li class="countdown__item">
                        <h3 class="countdown__number color--theme-color countdown__number-minutes">44</h3>
                        <p class="countdown__text">Minu</p>
                    </li>
                    <li class="countdown__item">
                        <h3 class="countdown__number color--theme-color countdown__number-seconds">36</h3>
                        <p class="countdown__text">Seco</p>
                    </li>
                </ul>
                <form action="{{ route('subscribe')}}" method="POST">
                    @csrf
                    <div class="input-group mb-5">
                            <input type="email" name="email" class="form-control" placeholder="Enter You Email to get update"
                            aria-label="Email Newsletter" aria-describedby="email-newsletter">
                            <button type="submit" class="input-group-text" id="email-newsletter"><i
                                class="fa-solid fa-paper-plane"></i></button>

                    </div>
                </form>
                <ul class="social justify-content-center">
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-discord"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-twitch"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
            <div class="coming-soon__thumb">
                <a href="#"><img src="{{ asset('frontend/assets/images/coming-soon/01.jpg')}}" alt="NFT Image"> </a>
            </div>
        </div>

    </section>
    <!-- ================> coming soon section end here <================== -->



    <!-- vendor plugins -->
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/all.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/lightcase.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/purecounter_vanilla.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/countdown.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js')}}"></script>

    @include('sweetalert::alert')

</body>

</html>
