<header class="header-section">
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/assets/images/logo/logo-white.svg') }}" alt="logo" width="92" height="92" >
                    </a>
                </div>
                <div class="menu-area">
                    <ul class="menu">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        <li>
                            <a href="{{route('about')}}">About</a>
                        </li>
                        <li>
                            <a href="#team">Team</a>
                        </li>
                        <li>
                            <a href="{{route('show-faq')}}">FAQ</a>
                        </li>
                        {{-- <li>
                            <a href="#0">Pages</a>
                            <ul class="submenu">
                                <li><a href="javsascript:void();">Home</a>
                                    <ul class="submenu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="javsascript:void();">About</a>
                                    <ul class="submenu">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="roadmap.html">Roadmap</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="team-single.html">Team Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="javsascript:void();">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-single.html">Blog single</a></li>
                                    </ul>
                                </li>
                                <li><a href="collection.html">Collection</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="404.html">404 Error</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                    <div class="header-btn">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#wallet-option" class="default-btn default-btn--secondary">
                            <span>Join <i class="fa-brands fa-discord"></i></span>
                        </a>

                        <a href="{{ route('google.login') }}" class="default-btn" >
                            <span>AI Tarot </span>
                        </a>

                        @isset(Auth::user()->id)
                            <div class="dropdown">
                                <img src="{{ Auth::user()->pic }}" alt="profie_img" style="width: 70px;height:60px;border:none;background:none;border-radius:50%;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        @endisset


                    </div>

                    <!-- toggle icons -->
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
