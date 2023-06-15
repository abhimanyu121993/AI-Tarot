<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ask with OpenAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');

        body {
            background: #C9D6FF;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #E2E2E2, #C9D6FF);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .form-horizontal {
            background: linear-gradient(50deg, rgba(0, 0, 0, 0.05) 49%, rgba(0, 0, 0, 0.08) 50%);
            font-family: 'Quicksand', sans-serif;
            width: 50%;
            padding: 30px 15px 25px;
            border-radius: 30px 0 30px 0;
            box-shadow: 4px 4px 0 #fff, 6px 6px 0 #e7e7e7, -4px -4px 0 #fff, -6px -6px 0 #e7e7e7;
        }

        .form-horizontal .form-icon {
            color: #fff;
            background: linear-gradient(45deg, #00a8ff 49%, #0097e6 50%);
            font-size: 55px;
            text-align: center;
            line-height: 80px;
            height: 80px;
            width: 80px;
            margin: 0 auto 15px;
            border-radius: 25px;
        }

        .form-horizontal .title {
            color: #333;
            font-size: 30px;
            font-weight: 700;
            text-transform: capitalize;
            text-align: center;
            margin: 0 0 30px 0;
        }

        .form-horizontal .form-group {
            margin: 0 0 15px;
        }

        .form-horizontal label {
            font-size: 15px;
        }

        .form-horizontal .form-control {
            color: #0097e6;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            letter-spacing: 1px;
            height: 40px;
            padding: 2px 15px 2px 15px;
            box-shadow: 0 0 5px -3px #333;
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .form-horizontal .form-control:focus {
            box-shadow: 0 0 5px -1px #0097e6;
            border: none;
        }

        .form-horizontal .form-control::placeholder {
            color: rgba(0, 0, 0, 0.3);
            font-size: 14px;
        }

        .btn {
            color: #fff;
            background: #173356;
            font-family: 'Archivo', sans-serif;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 10px 15px;
            border-radius: 2px;
            border: none;
            overflow: hidden;
            position: relative;
            z-index: 1;
            transition: all 0.5s ease 0s;
        }

        .btn:focus,
        .btn:hover {
            color: #fff;
            background-color: #0e4383;
            border-radius: 30px;
            box-shadow: -3px -3px 0 #fff, -4px -4px 0 #0e4383;
        }

        .btn:before,
        .btn:after,
        .btn span:before {
            content: "";
            background: #fff;
            width: 2px;
            height: 2px;
            box-shadow: 30px 20px 0px #fff, 40px 60px 0px #fff, 40px 60px 0px #fff,
                80px 50px 0px #fff, 120px 20px 0px #fff, 110px 60px 0px #fff,
                120px 5px 0px #fff, 200px 5px 0px #fff, 210px 25px 0px #fff,
                230px 50px 0px #fff, 170px 90px 0px #fff, 190px 74px 0px #fff,
                140px 80px 0px #fff, 20px 90px 0px #fff, 40px 760px 0px #fff,
                60px 70px 0px #fff, 80px 80px 0px #fff, 160px 20px 0px #fff;
            border-radius: 50%;
            opacity: 0.1;
            position: absolute;
            top: 30px;
            left: 5px;
            z-index: 2;
        }

        .btn:after {
            height: 3px;
            width: 3px;
            box-shadow: 60px 5px 0px #fff, 40px 30px 0px #fff, 10px 40px 0px #fff,
                90px 40px 0px #fff, 100px 10px 0px #fff, 110px 5px 0px #fff,
                7px 20px 0px #fff, 200px 50px 0px #fff, 180px 80px 0px #fff, 190px 15px 0px #fff;
            top: -30px;
            animation-delay: 0.5s;
        }

        .btn span:before {
            height: 1px;
            width: 1px;
            box-shadow: 30px 10px 0px #fff, 80px -20px 0px #fff, 120px 10px 0px #fff,
                12px 50px 0px #fff, 25px 190px 0px #fff, 65px 840px 0px #fff,
                125px 70px 0px #fff, 160px 20px 0px #fff, 160px -7px 0px #fff,
                200px -18px 0px #fff, 225px -38px 0px #fff, 240px -40px 0px #fff;
            top: 25px;
            animation-delay: 0.9s;
        }

        .btn:hover:before,
        .btn:hover:after,
        .btn span:before {
            animation: twinkle 1s infinite;
        }

        @keyframes twinkle {
            50% {
                opacity: 1;
            }
        }

        @media only screen and (max-width: 767px) {
            .btn {
                margin-bottom: 30px;
            }
        }

        .background-image {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .background-image .bg-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .trials-option input[type="radio"]:checked+img {
            border: 10px solid #15e3d2;
            border-radius: 20px;
        }
    </style>

    <link rel='stylesheet' id='astra-theme-css-css'
        href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/wp-content/themes/astra/assets/css/unminified/style74067406.css?ver=2.0.1') }}"
        type='text/css' media='all' />

    <link rel='stylesheet' id='astra-child-theme-css-css'
        href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/wp-content/themes/astra-child/style8a548a54.css?ver=1.0.0') }}"
        type='text/css' media='all' />
    <script type='text/javascript'
        src="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/wp-includes/js/jquery/jquery4a5f4a5f.js?ver=1.12.4-wp') }}">
    </script>
    <link rel="stylesheet"
        href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/wp-content/themes/astra/custom-css.css') }}" />
    <link rel='stylesheet' id='magicards-style-css'
        href="{{ asset('frontend/tarot/asset/wp-content/plugins/magicards/css/magicardsc801.css?ver=1.9.3') }}"
        type='text/css' media='all' />

    <link rel="stylesheet"
        href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/wp-content/themes/astra/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/css/magicards.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/tarot/asset/nospace.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/css/responsive-magicards.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/tarot/asset/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/jquery-editable-select.min.css') }}" />


    <style type="text/css" id="wp-custom-css">
        @media (max-width:768px) {
            .magicard-shuffle {
                background: #701D9F;
                border: 1px solid #701D9F;
                color: #ffffff;
                margin-right: 10px;
                border-radius: 30px;
                padding: 6px 10px 6px 10px;
            }

            .magicard-toggle {
                background: #701D9F;
                border: 1px solid #701D9F;
                color: #ffffff;
                margin-left: 10px;
                border-radius: 30px;
                padding: 6px 10px 6px 10px;
            }
        }

        .magicard-tooltip {
            background-color: #ffffff;
            color: #fff;
        }

        .magicard-caption {
            color: #000000;
        }

        .magicard-visible-tooltip .magicard-tooltip {
            max-height: 250px;
        }

        @media screen and (max-width:980px) {
            .a2a_floating_style.a2a_vertical_style {
                display: none;
            }
        }

        .cntrBTDiv {
            display: none !important;
        }

        .popupParent {
            display: none !important;
        }
    </style>
</head>

<body class="background-image">

    <img class="bg-image" src="{{ asset($tarot_background->background_images) }} " />

    <div class="container shadow p-3 mb-5 bg-body rounded p-5 mt-5 m-5 mx-auto form-horizontal">
        <h1 class="text-center" style="font-family: 'Lobster', cursive;">The AI Tarot</h1><br />
        <div id="content" class="site-content magi-cus-page">
            <div class="ast-container">
                <div id="primary" class="content-area primary">
                    <main id="main" class="site-main">
                        <article class="post-1318 page type-page status-publish ast-article-single"
                            itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-1318">
                            <header class="entry-header ast-header-without-markup">
                            </header>
                            <div class="entry-content clear" itemprop="text">
                                <div class="fl-builder-content fl-builder-content-1318 fl-builder-content-primary fl-builder-global-templates-locked"
                                    data-post-id="1318">
                                    <div class="fl-row fl-row-full-width fl-row-bg-none fl-node-5d129426b854a fl-row-custom-height fl-row-align-center centerconts"
                                        data-node="5d129426b854a">
                                        <div class="fl-row-content-wrap">
                                            <div class="fl-row-content fl-row-fixed-width fl-node-content">
                                                <div class="fl-col-group fl-node-5d129426b9be8"
                                                    data-node="5d129426b9be8">
                                                    <div class="fl-col fl-node-5d129426b9c8d fl-col-has-cols"
                                                        data-node="5d129426b9c8d">
                                                        <div class="fl-col-content fl-node-content">
                                                            <div class="fl-module fl-module-widget fl-node-5d128444f3097 margintb"
                                                                data-node="5d128444f3097">
                                                                <div class="fl-module-content fl-node-content">
                                                                    <div class="fl-widget">
                                                                        {{-- <form> --}}
                                                                        <form action="{{ route('tarotCard') }}"
                                                                            class="text-center mt-4" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" id="card_id" />
                                                                            <div class="widget widget_magicards_widget">
                                                                                <div class="magicards-deck-wrap ">
                                                                                    <div class="magicards-deck magicards-col-1"
                                                                                        id="magicards_stack_1">
                                                                                        <div class="magicard-wrap">
                                                                                            <div class="magicard-flipper">
                                                                                                <div class="magicard-front">
                                                                                                    <img  src="{{ asset('frontend/tarot/asset/wp-content/uploads/2021/12/Back-Of-Card.png') }}"
                                                                                                        class="skip-lazy">
                                                                                                </div>
                                                                                                <div class="magicard-back back-card-panel" >
                                                                                                    <img class="card_result"  src="{{ asset('frontend/tarot/asset/wp-content/uploads/2021/12/The-Nine-Of-Cups.png') }}"
                                                                                                        class="skip-lazy">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="magicard-tooltip">
                                                                                                    <h4
                                                                                                        class="magicard-caption">
                                                                                                        The Nine Of Cups
                                                                                                    </h4>
                                                                                                    <div
                                                                                                        class="magicard-description">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="magicard-description-reversed  magicards-hide-info">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="magicard-commands align-center">
                                                                                        <table id="bts">
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <div
                                                                                                        class="magicard-shuffle reveal_card" id="show">
                                                                                                        <i
                                                                                                            class="magicons magicon-shuffle"></i>
                                                                                                        SHUFFLE
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div
                                                                                                        class="magicard-toggle" id="hide" style="display:none;">
                                                                                                        <i
                                                                                                            class="magicons magicon-flip"></i>
                                                                                                        REVEAL CARD
                                                                                                    </div>
                                                                                                </td>
                                                                                                {{-- <td><a id="smeaning" href="#"
																									target="_self"
																									class="purbt"
																									role="button"><span
																										class="uabb-button-text uabb-creative-button-text">
																										SHOW
																										MEANING</span></a>
																							</td> --}}
                                                                                                <td><a href="https://tarotmoon.com/free-tarot-reading-instant-answers/"
                                                                                                        target="_self"
                                                                                                        class="purbt"
                                                                                                        role="button"><span
                                                                                                            class="uabb-button-text uabb-creative-button-text">MORE
                                                                                                            READINGS</span></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        href="#"
                                                                                        class="btn btn-lg"><span>Read
                                                                                            my Tarot</span> </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        {{-- </form> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @include('sweetalert::alert')

    <script src="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/jquery-editable-select.min.js') }}"></script>
    {{-- <script src="asset/wp-content/themes/tarotmoon/jquery.preloadinator.js"></script> --}}

    <script src="{{ asset('frontend/tarot/asset/wp-content/themes/tarotmoon/js/accordion.min.js') }}"></script>
    <script src="{{ asset('frontend/tarot/asset/nospace.js') }}"></script>


    <script>
        function handlePreloader() {
            "use strict";
            if (jQuery('.preloader').length) {
                jQuery('.preloader').delay(500).fadeOut(500);
            }
        }
        jQuery(window).on("load", function() {
            handlePreloader();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $('.back-card-panel').hide();
            $('.reveal_card').on('click', function(event) {
                $('.magicard-back').show();
                var newurl = "{{ url('ajaxfunction') }}";
                $.ajax({
                    url: newurl,
                    type: "get",
                    success: function(response) {
                        // console.log(response.card);
                        $('#card_id').val(response.card.id);
                        $(".card_result").attr("src",response.card.card_images);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#show").click(function() {
                $("#hide").toggle();
            });
        });
    </script>
</body>

</html>
