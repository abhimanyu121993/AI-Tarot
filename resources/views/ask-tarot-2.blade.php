<!DOCTYPE html>
<html lang="en-GB">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <link rel="stylesheet" href="{{ asset('frontend/tarot/stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('frontend/tarot/wp-content/uploads/2019/10/tarot-moon-logo-new.png')}}" />

    <link rel='stylesheet' id='astra-google-fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C&amp;display=fallback&amp;ver=2.0.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='fl-builder-layout-8-css' href="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/wp-content/uploads/bb-plugin/cache/8-layout11201120.css?er=62959aa306b1f4585e330e8a6b4afd5f')}}"
        type='text/css' media='all' />

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
    </style>
    <link rel="StyleSheet" href="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/wp-content/themes/astra/custom-css.css')}}" />
    <style id='astra-theme-css-inline-css' type='text/css'>
        html {
            font-size: 112.5%;
        }

        a,
        .page-title {
            color: #701d9f;
        }

        a:hover,
        a:focus {
            color: #390044;
        }

        body,
        button,
        input,
        select,
        textarea {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 18px;
            font-size: 1rem;
        }

        blockquote {
            color: #000000;
        }

        h1,
        .entry-content h1,
        h2,
        .entry-content h2,
        h3,
        .entry-content h3,
        h4,
        .entry-content h4,
        h5,
        .entry-content h5,
        h6,
        .entry-content h6,
        .site-title,
        .site-title a {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }

        .site-title {
            font-size: 25px;
            font-size: 1.3888888888889rem;
        }

        header .site-logo-img .custom-logo-link img {
            max-width: 127px;
        }

        .astra-logo-svg {
            width: 127px;
        }

        .ast-archive-description .ast-archive-title {
            font-size: 40px;
            font-size: 2.2222222222222rem;
        }

        .site-header .site-description {
            font-size: 15px;
            font-size: 0.83333333333333rem;
        }

        .entry-title {
            font-size: 30px;
            font-size: 1.6666666666667rem;
        }

        .comment-reply-title {
            font-size: 29px;
            font-size: 1.6111111111111rem;
        }

        .ast-comment-list #cancel-comment-reply-link {
            font-size: 18px;
            font-size: 1rem;
        }

        h1,
        .entry-content h1 {
            font-size: 45px;
            font-size: 2.5rem;
        }

        h2,
        .entry-content h2 {
            font-size: 25px;
            font-size: 1.3888888888889rem;
        }

        h3,
        .entry-content h3 {
            font-size: 35px;
            font-size: 1.9444444444444rem;
        }

        h4,
        .entry-content h4 {
            font-size: 25px;
            font-size: 1.3888888888889rem;
        }

        h5,
        .entry-content h5 {
            font-size: 20px;
            font-size: 1.1111111111111rem;
        }

        h6,
        .entry-content h6 {
            font-size: 17px;
            font-size: 0.94444444444444rem;
        }

        .ast-single-post .entry-title,
        .page-title {
            font-size: 30px;
            font-size: 1.6666666666667rem;
        }

        #secondary,
        #secondary button,
        #secondary input,
        #secondary select,
        #secondary textarea {
            font-size: 18px;
            font-size: 1rem;
        }

        ::selection {
            color: transparent;
        }

        body,
        h1,
        .entry-title a,
        .entry-content h1,
        h2,
        .entry-content h2,
        h3,
        .entry-content h3,
        h4,
        .entry-content h4,
        h5,
        .entry-content h5,
        h6,
        .entry-content h6 {
            color: #000000;
        }

        .tagcloud a:hover,
        .tagcloud a:focus,
        .tagcloud a.current-item {
            color: #ffffff;
            border-color: #701d9f;
            background-color: #701d9f;
        }

        .main-header-menu a,
        .ast-header-custom-item a {
            color: #000000;
        }

        .main-header-menu li:hover>a,
        .main-header-menu li:hover>.ast-menu-toggle,
        .main-header-menu .ast-masthead-custom-menu-items a:hover,
        .main-header-menu li.focus>a,
        .main-header-menu li.focus>.ast-menu-toggle,
        .main-header-menu .current-menu-item>a,
        .main-header-menu .current-menu-ancestor>a,
        .main-header-menu .current_page_item>a,
        .main-header-menu .current-menu-item>.ast-menu-toggle,
        .main-header-menu .current-menu-ancestor>.ast-menu-toggle,
        .main-header-menu .current_page_item>.ast-menu-toggle {
            color: #701d9f;
        }

        input:focus,
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="password"]:focus,
        input[type="reset"]:focus,
        input[type="search"]:focus,
        textarea:focus {
            border-color: #701d9f;
        }

        input[type="radio"]:checked,
        input[type=reset],
        input[type="checkbox"]:checked,
        input[type="checkbox"]:hover:checked,
        input[type="checkbox"]:focus:checked,
        input[type=range]::-webkit-slider-thumb {
            border-color: #701d9f;
            background-color: #701d9f;
            box-shadow: none;
        }

        .site-footer a:hover+.post-count,
        .site-footer a:focus+.post-count {
            background: #701d9f;
            border-color: #701d9f;
        }

        .ast-small-footer {
            color: #ffffff;
        }

        .ast-small-footer>.ast-footer-overlay {
            background-color: #701d9f;
        }

        .ast-small-footer a {
            color: #33a2cc;
        }

        .ast-small-footer a:hover {
            color: #89226d;
        }

        .footer-adv .footer-adv-overlay {
            border-top-style: solid;
            border-top-color: #7a7a7a;
        }

        .ast-comment-meta {
            line-height: 1.666666667;
            font-size: 15px;
            font-size: 0.83333333333333rem;
        }

        .single .nav-links .nav-previous,
        .single .nav-links .nav-next,
        .single .ast-author-details .author-title,
        .ast-comment-meta {
            color: #701d9f;
        }

        .menu-toggle,
        button,
        .ast-button,
        .button,
        input#submit,
        input[type="button"],
        input[type="submit"],
        input[type="reset"] {
            border-radius: 30px;
            padding: 8px 50px;
            color: #ffffff;
            border-color: #701d9f;
            background-color: #701d9f;
        }

        button:focus,
        .menu-toggle:hover,
        button:hover,
        .ast-button:hover,
        .button:hover,
        input[type=reset]:hover,
        input[type=reset]:focus,
        input#submit:hover,
        input#submit:focus,
        input[type="button"]:hover,
        input[type="button"]:focus,
        input[type="submit"]:hover,
        input[type="submit"]:focus {
            color: #ffffff;
            border-color: #701d9f;
            background-color: #701d9f;
        }

        .entry-meta,
        .entry-meta * {
            line-height: 1.45;
            color: #701d9f;
        }

        .entry-meta a:hover,
        .entry-meta a:hover *,
        .entry-meta a:focus,
        .entry-meta a:focus * {
            color: #390044;
        }

        .ast-404-layout-1 .ast-404-text {
            font-size: 200px;
            font-size: 11.111111111111rem;
        }

        .widget-title {
            font-size: 25px;
            font-size: 1.3888888888889rem;
            color: #000000;
        }

        #cat option,
        .secondary .calendar_wrap thead a,
        .secondary .calendar_wrap thead a:visited {
            color: #701d9f;
        }

        .secondary .calendar_wrap #today,
        .ast-progress-val span {
            background: #701d9f;
        }

        .secondary a:hover+.post-count,
        .secondary a:focus+.post-count {
            background: #701d9f;
            border-color: #701d9f;
        }

        .calendar_wrap #today>a {
            color: #ffffff;
        }

        .ast-pagination a,
        .page-links .page-link,
        .single .post-navigation a {
            color: #701d9f;
        }

        .ast-pagination a:hover,
        .ast-pagination a:focus,
        .ast-pagination>span:hover:not(.dots),
        .ast-pagination>span.current,
        .page-links>.page-link,
        .page-links .page-link:hover,
        .post-navigation a:hover {
            color: #390044;
        }

        .ast-header-break-point .ast-mobile-menu-buttons-minimal.menu-toggle {
            background: transparent;
            color: #701d9f;
        }

        .ast-header-break-point .ast-mobile-menu-buttons-outline.menu-toggle {
            background: transparent;
            border: 1px solid #701d9f;
            color: #701d9f;
        }

        .ast-header-break-point .ast-mobile-menu-buttons-fill.menu-toggle {
            background: #701d9f;
            color: #ffffff;
        }

        .ast-header-break-point .main-header-bar .ast-button-wrap .menu-toggle {
            border-radius: 8px;
        }

        @media (min-width:545px) {

            .ast-page-builder-template .comments-area,
            .single.ast-page-builder-template .entry-header,
            .single.ast-page-builder-template .post-navigation {
                max-width: 1240px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width:768px) {
            .ast-archive-description .ast-archive-title {
                font-size: 40px;
            }

            .entry-title {
                font-size: 30px;
            }

            h1,
            .entry-content h1 {
                font-size: 70px;
            }

            h2,
            .entry-content h2 {
                font-size: 35px;
            }

            h3,
            .entry-content h3 {
                font-size: 30px;
            }

            h4,
            .entry-content h4 {
                font-size: 25px;
                font-size: 1.3888888888889rem;
            }

            h5,
            .entry-content h5 {
                font-size: 20px;
                font-size: 1.1111111111111rem;
            }

            h6,
            .entry-content h6 {
                font-size: 17px;
                font-size: 0.94444444444444rem;
            }

            .ast-single-post .entry-title,
            .page-title {
                font-size: 30px;
            }

            #masthead .site-logo-img .custom-logo-link img {
                max-width: 120px;
            }

            .astra-logo-svg {
                width: 120px;
            }

            .ast-header-break-point .site-logo-img .custom-mobile-logo-link img {
                max-width: 120px;
            }
        }

        @media (max-width:544px) {
            .ast-archive-description .ast-archive-title {
                font-size: 40px;
            }

            .entry-title {
                font-size: 30px;
            }

            h1,
            .entry-content h1 {
                font-size: 40px;
            }

            h2,
            .entry-content h2 {
                font-size: 25px;
            }

            h3,
            .entry-content h3 {
                font-size: 24px;
            }

            h4,
            .entry-content h4 {
                font-size: 23px;
                font-size: 1.2777777777778rem;
            }

            h5,
            .entry-content h5 {
                font-size: 16px;
                font-size: 0.88888888888889rem;
            }

            h6,
            .entry-content h6 {
                font-size: 15px;
                font-size: 0.83333333333333rem;
            }

            .ast-single-post .entry-title,
            .page-title {
                font-size: 30px;
            }
        }

        @media (max-width:768px) {
            html {
                font-size: 102.6%;
            }
        }

        @media (max-width:544px) {
            html {
                font-size: 102.6%;
            }
        }

        @media (min-width:769px) {
            .ast-container {
                max-width: 1240px;
            }
        }

        @font-face {
            font-family: "Astra";
            src: url(https://tarotmoon.com/wp-content/themes/tarotmoon/wp-content/themes/astra/assets/fonts/astra.woff) format("woff"), url(https://tarotmoon.com/wp-content/themes/tarotmoon/wp-content/themes/astra/assets/fonts/astra.ttf) format("truetype"), url(https://tarotmoon.com/wp-content/themes/tarotmoon/wp-content/themes/astra/assets/fonts/astra.svg#astra) format("svg");
            font-weight: normal;
            font-style: normal;
            font-display: fallback;
        }

        @media (max-width:921px) {
            .main-header-bar .main-header-bar-navigation {
                display: none;
            }
        }

        .ast-desktop .main-header-menu.submenu-with-border .sub-menu,
        .ast-desktop .main-header-menu.submenu-with-border .children,
        .ast-desktop .main-header-menu.submenu-with-border .astra-full-megamenu-wrapper {
            border-color: #eaeaea;
        }

        .ast-desktop .main-header-menu.submenu-with-border .sub-menu,
        .ast-desktop .main-header-menu.submenu-with-border .children {
            border-top-width: 1px;
            border-right-width: 1px;
            border-left-width: 1px;
            border-bottom-width: 1px;
            border-style: solid;
        }

        .ast-desktop .main-header-menu.submenu-with-border .sub-menu .sub-menu,
        .ast-desktop .main-header-menu.submenu-with-border .children .children {
            top: -1px;
        }

        .ast-desktop .main-header-menu.submenu-with-border .sub-menu a,
        .ast-desktop .main-header-menu.submenu-with-border .children a {
            border-bottom-width: 1px;
            border-style: solid;
            border-color: #eaeaea;
        }

        @media (min-width:769px) {

            .main-header-menu .sub-menu li.ast-left-align-sub-menu:hover>ul,
            .main-header-menu .sub-menu li.ast-left-align-sub-menu.focus>ul {
                margin-left: -2px;
            }
        }

        .ast-small-footer {
            border-top-style: solid;
            border-top-width: 0;
            border-top-color: #f5ecf2;
        }

        @media (max-width:920px) {
            .ast-404-layout-1 .ast-404-text {
                font-size: 100px;
                font-size: 5.5555555555556rem;
            }
        }

        .ast-header-break-point .site-header {
            border-bottom-width: 0;
        }

        @media (min-width:769px) {
            .main-header-bar {
                border-bottom-width: 0;
            }
        }

        .main-header-menu .menu-item,
        .main-header-bar .ast-masthead-custom-menu-items {
            -js-display: flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .main-header-menu>.menu-item>a {
            height: 100%;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -js-display: flex;
            display: flex;
        }

        .ast-primary-menu-disabled .main-header-bar .ast-masthead-custom-menu-items {
            flex: unset;
        }

        #masthead .ast-container,
        .ast-header-breadcrumb .ast-container {
            max-width: 100%;
            padding-left: 35px;
            padding-right: 35px;
        }

        @media (max-width:921px) {

            #masthead .ast-container,
            .ast-header-breadcrumb .ast-container {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        #masthead .ast-container,
        .ast-header-breadcrumb .ast-container {
            max-width: 100%;
            padding-left: 35px;
            padding-right: 35px;
        }

        @media (max-width:921px) {

            #masthead .ast-container,
            .ast-header-breadcrumb .ast-container {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        .ast-breadcrumbs .trail-browse,
        .ast-breadcrumbs .trail-items,
        .ast-breadcrumbs .trail-items li {
            display: inline-block;
            margin: 0;
            padding: 0;
            border: none;
            background: inherit;
            text-indent: 0;
        }

        .ast-breadcrumbs .trail-browse {
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            color: inherit;
        }

        .ast-breadcrumbs .trail-items {
            list-style: none;
        }

        .trail-items li::after {
            padding: 0 0.3em;
            content: "»";
        }

        .trail-items li:last-of-type::after {
            display: none;
        }

        div.site-content {
            background: #FFFFFF !important;
        }

        @media(min-width: 768px) and (max-width: 993px) {
            .bannerBTBig {
                float: none !important;
                display: block !important;
                width: 100% !important;
                margin-top: 145px !important;
            }
        }

        @media(min-width: 100px) and (max-width: 768px) {
            .bannerBTBig {
                float: none !important;
                display: block !important;
                width: 100% !important;
                margin-top: 50px !important;
            }
        }

        @media(min-width: 410px) and (max-width: 415px) and (max-height: 736px) and (-webkit-min-device-pixel-ratio:0) {
            .ast-header-break-point .main-navigation li {
                display: block !important;
            }

            .magicard-wrap>div:nth-child(2):not(.magicard-back) {
                left: 31%;
            }
        }

        @media(min-width: 100px) and (max-width: 1023px) {
            .fl-node-5dc30d1642486 .fl-button-left {
                margin-top: -50px !important;
            }

            .fl-builder-content .fl-node-5cc821748ae40 .uabb-infobox-title {
                margin-top: 20px !important;
            }
        }
    </style>

    <link rel='stylesheet' id='magicards-style-css'
        href="{{ asset('frontend/tarot/wp-content/plugins/magicards/css/magicardsc801.css?ver=1.9.3')}}" type='text/css' media='all' />


    <script type='text/javascript' src="{{ asset('frontend/tarot/wp-includes/js/jquery/jquery.minaf6c.js?ver=3.6.0')}}" id='jquery-core-js'></script>

    <link rel="stylesheet" href="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/wp-content/themes/astra/custom.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/css/magicards.css')}}" />
    <style>
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
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/jquery-editable-select.min.css')}}" />
    <script src="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/jquery-editable-select.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/tarot/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" />
    <style>
        .accordionjs {
            clear: both;
            width: 850px;
            max-width: 100%;
            position: relative;
            margin: 0 auto;
            padding: 0;
            list-style: none;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .accordionjs .acc_section {
            margin: 0px f 5px 0px;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .accordionjs .acc_section .acc_head {
            width: 100%;
            float: left;
            position: relative;
            padding: 20px;
            user-select: none;
            display: block;
            cursor: pointer;
            transition: all 100ms ease;
            font-size: 24px;
            font-weight: 700;
            color: #FFF;
            font-family: 'Roboto', sans-serif;
            background: #701d9f;
            border-radius: 120px;
        }

        .accordionjs .acc_section .acc_head h3 {
            line-height: 1;
            margin: 5px 0;
        }

        .study-list li,
        .study-list {
            list-style: none;
        }

        .study-list {
            list-style: none;
            padding-left: 0px;
        }

        .study-list li span {
            border: 1px solid #5e00bd;
            color: #FFFFFF;
            background: #7f00ff;
            font-weight: 700;
            border-radius: 50%;
            height: 40px;
            margin-right: 5px;
            margin-left: -3px;
            font-size: 20px;
            padding: 0px;
            width: 40px;
            text-align: center;
            display: inline-block;
        }

        .study-list li {
            margin-left: 0px !important;
            list-style: none !important;
            font-size: 16px;
            font-family: 'Roboto', sans-serif;
            line-height: 40px;
            background: #FFFFFF;
            margin-bottom: 5px;
            padding: 5px 10px;
            color: #000000;
            border-radius: 50px;
            border: 1px solid #CCCCCC;
        }

        .accordionjs .acc_section .acc_content {
            padding: 20px;
            background: #FFF;
        }

        .accordionjs .acc_section.acc_active>.acc_content {
            display: block;
        }

        .accordionjs .acc_section.acc_active>.acc_head,
        .accordionjs .acc_section:hover>.acc_head,
        .accordionjs .acc_section:focus>.acc_head {
            background: #701d9f;
            color: #FFFFFF;
        }

        .acc_head {
            line-height: 77px;
        }

        element {

            display: block;
            padding: 20px;
            float: left;

        }

        .accordionjs .acc_section>.acc_content {

            display: block;
            padding: 20px;
            float: left;

        }

        .acc_head img {
            width: 60px;
            position: relative;
            float: left;
            margin: -10px 10px -10px auto;
            left: 60px;
            border: 3px solid #FFF;
            border-radius: 5px;
        }

        .accord_sec h1 {
            font-weight: 400;
            color: #701d9f;
        }

        .accord_sec h2 {
            font-weight: 400;
            color: #000;
        }

        .acc_content img {
            float: left;
            width: 200px;
            margin-right: 20px;
        }

        .acc_content p {
            text-align: left;
        }

        @media(min-width: 100px) and (max-width: 920px) {
            .acc_content img {
                float: none;
                clear: both;
                margin: 0px auto 10px auto;
                width: 150px;
            }
        }

        #study-topics li {
            margin-bottom: 20px !important;
        }

        .popupParent {
            display: none;
            height: 100%;
            width: 100%;
            background: #000000c4;
            top: 0;
            overflow: visible;
            padding-bottom: 60px;
            z-index: 99991;
            position: absolute;
        }

        .magicard-tooltp.pop {
            width: 100%;
            position: relative !important;
            top: 0px !important;
            left: 0px !important;
            opacity: 1 !important;
            padding: 2%;
            box-shadow: 0px 0px 35px 5px #000;
            padding-bottom: 50px;
            background: #701D9F;
            color: #FFFFFF;
            border-radius: 20px;
        }

        .modal-content {
            border-radius: 20px !important;
        }

        .toadd {
            overflow: visible;
        }

        .magicard-tooltip.pop .magicard-caption {
            font-size: 2em !important;
        }

        .magicard-tooltip.pop .magicard-description {
            padding: 0px 0px !important;
            font-size: 14px !important;
        }

        .toCls {
            transition: all 0.3s ease !important;
            background: #FFF;
            width: 100%;
            display: inline-block;
            padding-top: 3px;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Arial';
            z-index: 99999999999999999999999999999999999;
            position: relative;
            top: 15px;
            border-radius: 50px;
            text-transform: uppercase;
        }

        .paidRead {
            position: relative;
            z-index: 99999999999999999999999999;
            background: #FFF;
            transition: all 0.3s ease !important;
            width: 60%;
            margin: auto;
            font-size: 18px;
            color: #7B26D2;
            text-transform: uppercase;
            text-align: center;
            border-radius: 50px;
            font-weight: 900;
            cursor: pointer;
            display: block;
            left: 7px;
            top: -1.2%;
        }

        .toCls:hover,
        .toCls:focus,
        .paidRead:hover,
        .paidRead:focus {
            opacity: 0.75 !important;
        }

        @media(min-width: 1024px) and (max-width: 10000px) {
            .popupParent {
                height: 125% !important;
            }
        }

        @media(min-width: 100px) and (max-width: 1024px) {
            .paidRead {
                width: 75%;
                font-size: 13px;
                margin-top: -25px;
            }

            .toadd,
            .magicard-tooltip.pop,
            .popupParent {
                overflow: auto !important;
            }

            .magicard-tooltip.pop {
                height: auto;
            }
        }

        @media(min-width: 1023px) and (max-width: 10000px) {
            .magicard-tooltip.pop {
                width: 80%;
                border-radius: 25px;
                height: auto;
            }

            .paidRead {
                width: 250px !important;
            }
        }

        @media(min-width: 100px) and (max-width: 1023px) {
            .magicard-tooltip.pop {
                width: 80%;
                height: auto;
                left: 10%;
                border-radius: 25px;
                padding: 20px 20px 100px 20px;
            }

            .paidRead {
                left: 0% !important;
                width: 250px !important;
            }
        }

        .site-footer {
            margin-top: 130px !important;
        }

        .ast-separate-container {
            background-color: #fff !important;
        }

        button[data-dismiss="modal"] {
            background: #FFFFFF;
            border-radius: 50px;
            display: block;
            width: 100%;
            font-weight: 600;
            color: #701d9f;
            text-transform: uppercase;
            margin-top: 20px;
            float: left;
        }

        .a2a_full,
        .a2a_mini {
            z-index: 99999999999999999999999999999999999 !important;
        }

        h4.magicard-caption {
            font-size: 26px !important;
        }

        .magicard-description {
            padding: 50px 0px !important;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 400px !important;
            }
        }

        .social_share_icons .a2a_floating_style.a2a_vertical_style {
            display: block !important;
        }

        .share_title,
        .share_footer {
            color: transparent !important;
            background: transparent !important;
        }

        .share_title::selection,
        .share_footer::selection,
        .share_footer *::selection {
            color: transparent !important;
            background: transparent !important;
        }

        .ktp .magicard-caption {
            user-select: none !important;
        }

        .highlight-and-share-wrapper {
            z-index: 99999999999999999999999999999 !important;
        }

        .a2a_kit>div {
            display: inline-block !important;
        }

        .social_share_icons div.a2a_kit.a2a_vertical_style {
            width: 100% !important;
            margin-left: -10px !important;
        }

        .a2a_kit>div i {
            color: #701d9f !important;
            background: #FFFFFF !important;
            font-size: 23px !important;
            width: 30px;
            height: 30px;
            text-align: center;
            padding-top: 4px;
            border-radius: 5px;
        }

        .ktp .magicard-description p::selection {
            background: transparent !important;
        }

        .highlight-and-share-wrapper {
            display: none !important;
        }

        .swal2-container.swal2-shown {
            background-color: rgba(0, 0, 0, .4);
            z-index: 999999999999999999999999999999999999999999 !important;
            position: fixed;
        }

        .modal-body.toadd>.magicard-caption {
            margin-bottom: -40px;
        }

        #bts td strong {
            position: relative;
            font-size: 28px;
            margin-top: -30px;
            display: inline-block;
            top: 3px;
            left: -10px;
            font-weight: 900;
            margin-right: 0px;
        }

        @media(min-width: 380px) and (max-width: 445px) {

            .magicard-shuffle,
            .magicard-toggle,
            .purbt,
            .uabb-creative-button-wrap a,
            .uabb-creative-button-wrap a:visited {
                width: 180px !important;
                font-size: 12px !important;
            }

            #bts td strong {
                position: relative;
                top: 5px;
            }
        }

        @media(min-width: 340px) and (max-width: 380px) {

            .magicard-shuffle,
            .magicard-toggle,
            .purbt,
            .uabb-creative-button-wrap a,
            .uabb-creative-button-wrap a:visited {
                width: 160px !important;
                font-size: 12px !important;
            }

            #bts td strong {
                position: relative;
                top: 5px;
            }
        }

        @media(min-width: 100px) and (max-width: 340px) {

            .magicard-shuffle,
            .magicard-toggle,
            .purbt,
            .uabb-creative-button-wrap a,
            .uabb-creative-button-wrap a:visited {
                width: 145px !important;
                font-size: 10px !important;
            }

            #bts td strong {
                position: relative;
                top: 5px;
            }
        }

        @media (max-width: 402px) and (min-width: 100px) {
            .accordionjs .acc_section .acc_head {
                font-size: 15px !important;
            }
        }

        .ktp>h4 {
            display: none !important;
        }

        .affiliate_text p {
            font-size: 14px !important;
        }

        .affiliate_text p a {
            font-size: 14px !important;
            color: #FFFFFF !important;
            text-decoration: underline !important;
            font-weight: 400 !important;
        }

        #bts tr td:last-child {
            display: none;
        }

        ::selection {
            background: #FFFFFF !important;
            color: #701d9e !important;
        }

        .ktp *::selection {
            background: #701d9e !important;
            color: #FFFFFF !important;
        }

        .ajax *::selection {
            background: #701d9e !important;
            color: #FFFFFF !important;
        }
    </style>
    <script src="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/js/accordion.min.js')}}"></script>
    <script>
        jQuery.fn.selectText = function() {
            this.find('input').each(function() {
                if ($(this).prev().length == 0 || !$(this).prev().hasClass('p_copy')) {
                    $('<p class="p_copy" style="position: absolute; z-index: -1;"></p>').insertBefore($(this));
                }
                $(this).prev().html($(this).val());
            });
            var doc = document;
            var element = this[0];
            console.log(this, element);
            if (doc.body.createTextRange) {
                var range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                var selection = window.getSelection();
                var range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        };
        jQuery(document).ready(function() {
            jQuery("#smeaning").attr("data-toggle", "modal").attr("data-target", "#mMdl");
            jQuery("header").on("mouseover", function() {
                jQuery("header").css("z-index", "10000000");
            });
            jQuery(".magicard-commands > div").each(function() {
                jQuery(this).children("i").remove();
            });
            if (jQuery(".widget_magicards_widget").length > 0) {
                jQuery("#smeaning").removeAttr("href").css("cursor", "pointer").css("user-select", "none");
                jQuery(".magicard-clicker, .magicard-back").unbind("click").bind("click");
                (function(jQuery) {
                    jQuery.fn.clickToggle = function(func1, func2) {
                        var funcs = [func1, func2];
                        this.data('toggleclicked', 0);
                        this.click(function() {
                            var data = jQuery(this).data();
                            var tc = data.toggleclicked;
                            jQuery.proxy(funcs[tc], this)();
                            data.toggleclicked = (tc + 1) % 2;
                        });
                        return this;
                    };
                }(jQuery));
                jQuery(".magicard-toggle").unbind("click");
                var getcode = jQuery(".magicard-flipper").parent().html();
                jQuery(".magicard-flipper").parent().append(getcode);
                jQuery(".magicard-shuffle").on("click", function() {
                    if (jQuery("#ques").val() == "") {} else {
                        jQuery("#mModle").attr("id", "mMdl");
                        jQuery("header").css("z-index", "90");
                        jQuery(".magicard-toggle").unbind("click");
                        jQuery("#smeaning").unbind("click");
                        var s;
                        var orgLeft = jQuery(".magicard-flipper").parent().children("div:nth-child(2)").css(
                            "left");
                        for (s = 1; s <= 10; s++) {
                            jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({
                                left: '40.2%',
                                top: '8%'
                            }, 110, function() {
                                jQuery(this).css('z-index', 10000)
                            });
                            jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({
                                left: '50%',
                                top: '-8%'
                            }, 110, function() {
                                jQuery(this).css('z-index', -10000)
                            });
                            jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({
                                left: orgLeft,
                                top: '2%'
                            }, 110, function() {
                                jQuery(this).css('z-index', 10000)
                            });
                            jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({
                                left: orgLeft,
                                top: '2%'
                            }, 10, function() {
                                jQuery(this).css('z-index', 0)
                            });
                        }
                        jQuery(".magicard-flipper").parent().children("div:nth-child(2)").css(
                            "{z-index: 0 !important;}");
                        setTimeout(function() {
                            jQuery('.magicard-toggle').bind("click", function() {
                                jQuery(".magicard-back, .magicard-description").css("left",
                                    "0px");
                                jQuery(".magicard-description").css("padding", "0px 20px");
                                if (jQuery(".magicard-wrap").hasClass("magicard-hover")) {
                                    jQuery(".magicard-wrap").addClass("magicard-wrap")
                                        .removeClass("magicard-hover").removeClass(
                                            "magicard-toggle-open");
                                    jQuery(".magicard-tooltip").animate({
                                        scrollTop: (0, 0)
                                    }, 1000);
                                } else {
                                    jQuery(".magicard-wrap").addClass("magicard-wrap")
                                        .addClass("magicard-hover");
                                    jQuery('#smeaning').bind("click", function() {
                                        jQuery(".ktp .magicard-description").html(
                                            '<img  title="Loading..." data-src="/wp-content/themes/tarotmoon/ajax.gif" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img src="/wp-content/themes/tarotmoon/ajax.gif" title="Loading..."/></noscript>'
                                            );

                                        function replace_last_comma_with_and(x) {
                                            if (x.startsWith('.')) {
                                                return x.replace(x.charAt(0), '');
                                            } else if (x.startsWith('!')) {
                                                return x.replace(x.charAt(0), '');
                                            } else if (x.startsWith('?')) {
                                                return x.replace(x.charAt(0), '');
                                            }
                                            if (x.endsWith(('.', '!', '?'))) {
                                                return x;
                                            } else {
                                                if (x.lastIndexOf("?") > 1) {
                                                    var pos = x.lastIndexOf('?');
                                                    return x.substring(0, pos) +
                                                    "?";
                                                } else if (x.lastIndexOf("!") > 1) {
                                                    var pos = x.lastIndexOf('!');
                                                    return x.substring(0, pos) +
                                                    "!";
                                                } else if (x.lastIndexOf(".") > 1) {
                                                    var pos = x.lastIndexOf('.');
                                                    return x.substring(0, pos) +
                                                    ".";
                                                }
                                            }
                                        }

                                        function removeLastSentence(output) {
                                            output = output.replace("###", "");
                                            return replace_last_comma_with_and(
                                                output);
                                        }
                                        async function gptCall(prompt) {
                                            let data = {
                                                "model": "curie:ft-personal-2021-12-20-15-21-20",
                                                "prompt": prompt,
                                                "temperature": 0.7,
                                                "max_tokens": 160,
                                                "top_p": 0.9,
                                                "frequency_penalty": 0.5,
                                                "presence_penalty": 0.2,
                                                "stop": ["/-/-/-/-/"]
                                            }
                                            const response = await fetch(
                                                'https://api.openai.com/v1/completions', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Authorization': 'Bearer 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',
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify(
                                                        data)
                                                });
                                            const result = await response
                                        .json();
                                            var ai_text = result.choices[0]
                                            .text;
                                            var remove = removeLastSentence(
                                                ai_text);
                                            jQuery(".ktp .magicard-description")
                                                .html(remove);
                                            jQuery(".ajax").css("display",
                                                "none");
                                            if (!ai_text.endsWith(".")) {
                                                var removed =
                                                    removeLastSentence(ai_text);
                                                return removed
                                            } else {}
                                        }
                                        window.setTimeout(function() {
                                            var aitext = gptCall(
                                                "My tarot card is " +
                                                jQuery(
                                                    ".modal-body.toadd .magicard-caption"
                                                    ).text() + ". " +
                                                jQuery('#ques').val());
                                            jQuery(".ajax").css("display",
                                                "block");
                                        }, 2000);
                                        jQuery(".magi-cus-page").css("z-index",
                                            "1000 !important");
                                        jQuery(".magicard-wrap").addClass(
                                            "magicard-wrap").addClass(
                                            "magicard-hover").addClass(
                                            "magicard-toggle-open");
                                        var htmlsec = jQuery(".magicard-flipper")
                                            .parent().children("div:nth-child(1)")
                                            .children(".magicard-tooltip").children(
                                                ".magicard-caption").parent()
                                        .html();
                                        jQuery(".toadd .ktp").html(htmlsec);
                                        var txt = "";

                                        var url =
                                            '<meta property="og:url" content="' + +
                                            '" />';
                                        var web =
                                            '<meta property="og:type" content="website" />';
                                        var title =
                                            '<meta property="og:title" content="' +
                                            jQuery(".share_title").text() + '" />';
                                        var desc =
                                            '<meta property="og:description" content="' +
                                            jQuery(".ktp").text() + '" />';
                                        var img =
                                            '<meta property="og:image" content="" />';
                                        jQuery('head').append(url + web + title +
                                            desc + img);
                                        jQuery(".popupParent").css("display",
                                            "block");
                                        jQuery(".magicard-flipper").parent()
                                            .children("div:nth-child(1)").children(
                                                ".magicard-tooltip").css("opacity",
                                                "0");
                                        var htxml = jQuery(
                                                ".highlight-and-share-wrapper-cts")
                                            .next().html();
                                        jQuery(".social_share_icons .a2a_kit").html(
                                            htxml);
                                        jQuery(".a2a_kit > div").each(function() {
                                            jQuery(this).children("a")
                                                .children("span").remove();
                                            jQuery(this).children("a").on(
                                                "mouseover",
                                                function() {
                                                    jQuery(".share_sec")
                                                        .selectText();
                                                });
                                        });
                                        window.setInterval(function() {
                                            var tw = jQuery(
                                                    ".modal-backdrop.fade.show"
                                                    ).next().children(
                                                    ".has_twitter")
                                                .children("a").attr("href");
                                            jQuery(".a2a_kit .has_twitter")
                                                .children("a").attr("href",
                                                    tw);
                                            var fb = jQuery(
                                                    ".modal-backdrop.fade.show"
                                                    ).next().children(
                                                    ".has_facebook")
                                                .children("a").attr("href");
                                            jQuery(".a2a_kit .has_facebook")
                                                .children("a").attr("href",
                                                    fb);
                                            var ln = jQuery(
                                                    ".modal-backdrop.fade.show"
                                                    ).next().children(
                                                    ".has_linkedin")
                                                .children("a").attr("href");
                                            jQuery(".a2a_kit .has_linkedin")
                                                .children("a").attr("href",
                                                    ln);
                                            var ems = jQuery(
                                                ".modal-backdrop.fade.show"
                                                ).next().children(
                                                ".has_email").children(
                                                "a").attr("href");
                                            jQuery(".a2a_kit .has_email")
                                                .children("a").attr("href",
                                                    ems);
                                            var pt = jQuery(
                                                    ".modal-backdrop.fade.show"
                                                    ).next().children(
                                                    ".has_pinterest")
                                                .children("a").attr("href");
                                            jQuery(
                                                    ".a2a_kit .has_pinterest")
                                                .children("a").attr("href",
                                                    pt);
                                            var wa = jQuery(
                                                    ".modal-backdrop.fade.show"
                                                    ).next().children(
                                                    ".has_whatsapp")
                                                .children("a").attr("href");
                                            jQuery(".a2a_kit .has_whatsapp")
                                                .children("a").attr("href",
                                                    wa);
                                        }, 500);
                                        var titleX = jQuery(
                                                ".share_sec .magicard-caption")
                                            .text();
                                        jQuery(".share_sec  .magicard-caption")
                                            .remove();
                                        jQuery(".modal-body.toadd > h4").each(
                                            function() {
                                                jQuery(this).remove();
                                            });
                                        jQuery(".modal-body.toadd").prepend(
                                            '<h4 class="magicard-caption">' +
                                            titleX + '</h4>');
                                        window.setTimeout(function() {
                                            //WA
                                            jQuery(
                                                    ".social_share_icons .a2a_kit div.has_whatsapp a")
                                                .attr("href", jQuery(
                                                        ".social_share_icons .a2a_kit div.has_whatsapp a"
                                                        ).attr("href")
                                                    .replace(": %url%", "")
                                                    );
                                            var hrf = "index.html";
                                            jQuery(
                                                    ".social_share_icons .a2a_kit div")
                                                .each(function() {
                                                    var hrfs = jQuery(
                                                            this)
                                                        .children("a")
                                                        .attr("href")
                                                        .replace(
                                                            "%url%", hrf
                                                            );
                                                    jQuery(this)
                                                        .children("a")
                                                        .attr("href",
                                                            hrfs);
                                                });
                                        }, 1000);
                                        jQuery(".modal-body.toadd button").on(
                                            "click",
                                            function() {
                                                jQuery('#ques').val("");
                                                jQuery("#bts .magicard-shuffle")
                                                    .click();

                                            });
                                    });
                                    jQuery(".magicard-tooltip").animate({
                                        scrollTop: (0, 0)
                                    }, 1000);
                                }
                            });
                        }, 3200);
                    }
                });
            }
            jQuery('button[data-dismiss="modal"]').on("click", function() {
                jQuery(".modal-body.toadd h4").each(function() {
                    jQuery(this).remove();
                });
            });
            jQuery(document).on("click", ".es-list li", function() {
                jQuery(this).parent().css("display", "none");
            });
            jQuery(document).on("click", "#ques", function() {
                jQuery(".es-list").css("display", "block");
            });
            jQuery("#study-topics").accordionjs();
            jQuery("#study-topics li").each(function() {
                jQuery(this).removeClass("acc_active");
            });
            jQuery("#study-topics li:nth-child(1) .acc_content").css("display", "none");
            jQuery(".magicard-shuffle strong").text("2");
            jQuery(".magicard-toggle strong").text("3");
            jQuery("#smeaning strong").text("4");
            jQuery(".magicard-commands.align-center").prepend(
                "<form><select id='ques' placeholder='Type a question or select from list' maxlength='35'><option value='1'>Am I going to become wealthy?</option><option value='2'>Will I find love?</option><option value='3'>Will today be a good day?</option><option value='3'>Will my relationship succeed?</option><option value='4'>Will I have a good future?</option><option value='5'>What do others think of me?</option><option value='6'>How can I improve my health?</option><option value='7'>Should I change careers?</option></select></form>"
                );
            jQuery('#ques').editableSelect({
                filter: false,
                trigger: 'focus'
            });
            var input = document.getElementById("ques");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    jQuery(".es-list").css("display", "none");
                    jQuery(".magicard-shuffle").click();
                    window.setTimeout(function() {
                        var aitext = gptCall("My tarot card is " + jQuery(
                            ".modal-body.toadd .magicard-caption").text() + ". " + jQuery(
                            '#ques').val());
                        jQuery(".ajax").css("display", "block");
                    }, 2000);
                }
            });
        });
    </script>
    <style>
        .s1 {
            background: #701d9f;
            color: #FFFFFF;
            font-size: 22px;
            font-weight: 600;
            display: inline-block;
            width: 60px;
            height: 40px;
            padding-top: 0px;
            position: relative;
            border-radius: 0px;
            top: -5px;
            border-top-left-radius: 100px;
            border-bottom-left-radius: 100px;
        }

        #quesSubmit {
            border-radius: 0px;
            height: 61px;
            width: 60px;
            text-align: center;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            position: relative;
            top: -11px;
            font-size: 0px;
            background: none;
            background-size: 35px;
            background-repeat: no-repeat;
            background-color: #701d9f;
            padding: 0px;
            background-image: url(../wp-content/themes/tarotmoon/downarr.fw.png);
            background-position: center;
        }

        #ques {
            border: 2px solid #701e9d;
            font-size: 17px;
            position: relative;
            top: -7px;
            color: #701d9e;
            border-radius: 0px;
            outline: 0;
            height: 40px;
            width: 400px;
            text-align: left;
            border-radius: 100px;
            background: #FFFFFF !important;
        }

        .es-list {
            max-height: 200px;
            text-align: left;
        }

        @media(min-width: 100px) and (max-width: 500px) {
            #ques {
                width: 40%;
                background: #FFFFFF !important;
                border-radius: 20px;
            }

            .s1 {
                display: none;
            }

            .site-content.magi-cus-page {
                z-index: 1000 !important;
                position: relative;
                top: 20px;
            }

            .a2a_floating_style.a2a_default_style {
                width: 20px;
                top: 110px !important;
            }

            .a2a_kit {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/tarot/wp-content/themes/tarotmoon/css/responsive-magicards.css')}}" />
</head>

<body class="background-image">

    <img class="bg-image" src="{{ asset($tarot_background->background_images) }} " />

    <div class="container">
        <main id="main" class="site-main">
            <article class="post-1318 page type-page status-publish ast-article-single"
                itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-1318">

                <div class="entry-content clear" itemprop="text">
                    <div class="fl-builder-content fl-builder-content-1318 fl-builder-content-primary fl-builder-global-templates-locked"
                        data-post-id="1318">
                        <div class="mt-3 fl-row fl-row-full-width fl-row-bg-none fl-node-5d129426b854a fl-row-custom-height fl-row-align-center centerconts"
                            data-node="5d129426b854a" style="background-color: black; opacity: .9; border-radius: 20px;">
                            <div class="fl-row-content-wrap">
                                <div class="fl-row-content fl-row-fixed-width fl-node-content">
                                    <div class="fl-col-group fl-node-5d129426b9be8" data-node="5d129426b9be8">
                                        <div class="fl-col fl-node-5d129426b9c8d fl-col-has-cols"
                                            data-node="5d129426b9c8d">
                                            <div class="fl-col-content fl-node-content">
                                                <div class="fl-module fl-module-widget fl-node-5d128444f3097 margintb"
                                                    data-node="5d128444f3097">
                                                    <div class="fl-module-content fl-node-content">
                                                        <div class="fl-widget">
                                                            <form action="{{ route('tarotCard') }}" class="text-center mt-4" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="tarot_card_id" id="card_id" value="" />
                                                                <div class="widget widget_magicards_widget">
                                                                    <div class="magicards-deck-wrap ">
                                                                        <div class="magicards-deck magicards-col-1"
                                                                            id="magicards_stack_1">
                                                                            <div class="magicard-wrap">
                                                                                <div class="magicard-flipper ">
                                                                                    <div class="magicard-front "><img
                                                                                            src="{{ asset('frontend/tarot/wp-content/uploads/2021/12/Back-Of-Card.png')}}"
                                                                                            class="skip-lazy"></div>
                                                                                    <div class="magicard-back card_result"><img class=""
                                                                                            src="{{ asset('frontend/tarot/wp-content/uploads/2021/12/The-Nine-Of-Cups.png')}}"
                                                                                            class="skip-lazy"></div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="magicard-commands align-center">
                                                                            <table id="bts">
                                                                                <tr>
                                                                                    <td>
                                                                                        <div
                                                                                            class="magicard-shuffle reveal_card" onclick="takecard()" style="
                                                                                            float: right;
                                                                                        " >
                                                                                            <i
                                                                                                class="magicons magicon-shuffle"></i>
                                                                                            SHUFFLE
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="magicard-toggle">
                                                                                            <i
                                                                                                class="magicons magicon-flip"></i>
                                                                                            REVEAL CARD
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><a id="smeaning"
                                                                                            href="#"
                                                                                            target="_self"
                                                                                            class="purbt"
                                                                                            role="button"><span
                                                                                                class="uabb-button-text uabb-creative-button-text"><strong>3</strong>
                                                                                                SHOW
                                                                                                MEANING</span></a>
                                                                                    </td>
                                                                                    {{-- <td><a href="https://tarotmoon.com/free-tarot-reading-instant-answers/"
                                                                                            target="_self"
                                                                                            class="purbt"
                                                                                            role="button"><span
                                                                                                class="uabb-button-text uabb-creative-button-text">MORE
                                                                                                READINGS</span></a>
                                                                                    </td> --}}
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

    <div id="mModle" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="magicard-tooltp pop">
                    <div class="modal-body toadd">
                        <div class="share_sec">
                            <div class="share_title"></div>
                            <div class="ktp">
                            </div>
                            <div class="ajax" style="margin-top: -50px;">
                                <p style="text-align: center;font-weight: 900;"><img style="width: 45px;margin: auto;"
                                        title="Loading..." data-src="/wp-content/themes/tarotmoon/ajax.gif"
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img
                                            style="width: 45px;margin: auto;"
                                            src="../wp-content/themes/tarotmoon/ajax.gif"
                                            title="Loading..." /></noscript><br>I am thinking. Please wait 30
                                    seconds...
                                </p>
                            </div>
                            <div class="share_footer"></div>
                        </div>
                        <div class="affiliate_text">
                            <p data-pm-slice="1 1 []">Need more answers?</p>
                            <p data-pm-slice="1 1 []">Enjoy a FREE 3 minute chat with a friendly experienced tarot
                                reader and discover hidden factors influencing your current situation.</p>
                            <p data-pm-slice="1 1 []">
                                <a href="https://liveperson.7eer.net/c/2653582/993942/847">Click here for a live
                                    reading</a>
                            </p>
                            <p>(When you visit our partner site we receive a commission which helps us keep Tarot Moon
                                free)</p>
                        </div>
                        <p style="margin: 0px !important;"><strong>Share your reading:</strong></p>
                        <div class="social_share_icons"></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type='text/javascript' src="{{ asset('frontend/tarot/wp-includes/js/imagesloaded.mineda1.js?ver=4.1.4')}}" id='imagesloaded-js'></script>

    <script type='text/javascript' src="{{ asset('frontend/tarot/wp-content/plugins/magicards/js/magicards.minc801.js?ver=1.9.3')}}" id='magicards-js-js'></script>

    <script type='text/javascript' src="{{ asset('frontend/tarot/stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}" ></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}



    <script>
        function takecard(){
            var newurl = "{{ url('ajaxfunction') }}";
            fetch(newurl)
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Network response was not ok.');
            })
            .then(function(data) {
                // Process the response data
                console.log(data.card.card_images);
                document.getElementById('card_id').value = data.card.id;
                document.querySelectorAll('.card_result img').forEach(img => img.setAttribute('src', data.card.card_images));


                // document.getElementsByClassName('card_result').src = data.card.card_images;
            })
            .catch(function(error) {
                // Handle any error that occurred during the request
                console.log(error);
            });
        }


    </script>


    <style>
        .popupParent {
            display: none !important;
        }
    </style>
</body>

</html>
