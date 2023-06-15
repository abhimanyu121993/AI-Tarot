 <footer class="footer" style="background-image: url(assets/images/footer/bg.png);">
    <div class="footer__wrapper padding-top padding-bottom">
        <div class="container">
            <div class="footer__content text-center">
                <a class="mb-4 d-inline-block" href="{{route('home')}}"><img src="{{ asset('frontend/assets/images/logo/logo-white.svg') }}"
                    alt="logo" width="92" height="92" ></a>
                {{-- <ul class="social justify-content-center">
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
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li class="social__item">
                        <a href="#" class="social__link"><i class="fab fa-facebook-f"></i></a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="container">
            <div class="row">
            <div class="col-sm-6 py-4"><p class="mb-0">© 2022 | All Rights Reserved </p></div>
            <div class="col-sm-6 py-4"><div style="float: right;"><a class="" href="{{route('terms')}}">Terms & Condition </a>|<a class="" href="{{route('privacy')}}"> Privacy Policy</a></div></div>
            </div>
        </div>
    </div>
</footer>
