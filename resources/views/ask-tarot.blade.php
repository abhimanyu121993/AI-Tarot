<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ask with OpenAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

        .tcb-product-slider {
            background: #333;
            background-image: url(https://unsplash.it/1240/530?image=721);
            background-size: cover;
            background-repeat: no-repeat;
            padding: 100px 0;
        }

        .tcb-product-slider .carousel-control {
            width: 5%;
        }

        .tcb-product-item a {
            color: #147196;
        }

        .tcb-product-item a:hover {
            text-decoration: none;
        }

        .tcb-product-item .tcb-hline {
            margin: 10px 0;
            height: 1px;
            background: #ccc;
        }

        @media all and (max-width: 768px) {
            .tcb-product-item {
                margin-bottom: 30px;
            }
        }

        .tcb-product-photo {
            text-align: center;
            height: 180px;
            background: #fff;
        }

        .tcb-product-photo img {
            height: 100%;
            display: inline-block;
        }

        .tcb-product-info {
            background: #f0f0f0;
            padding: 15px;
        }

        .tcb-product-title h4 {
            margin-top: 0;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .tcb-product-rating {
            color: #acacac;
        }

        .tcb-product-rating .active {
            color: #FFB500;
        }

        .tcb-product-price {
            color: firebrick;
            font-size: 18px;
        }



        .details {
            margin: 50px 0;
        }

        .details h1 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 3px;
        }

        .details .back-link {
            text-align: center;
        }

        .details .back-link a {
            display: inline-block;
            margin: 20px 0;
            padding: 15px 30px;
            background: #333;
            color: #fff;
            border-radius: 24px;
        }

        .details .back-link a svg {
            margin-right: 10px;
            vertical-align: text-top;
            display: inline-block;
        }
    </style>
</head>

<body>


    <div class="container shadow p-3 mb-5 bg-body rounded p-5 mt-5 m-5 mx-auto form-horizontal">
        <h1 class="text-center" style="font-family: 'Lobster', cursive;">The AI Tarot</h1><br />
        <h6 class="text-center">The AI Tarot is an oracle.</h6>
        <h6 class="text-center">Using artificial intelligence, you can provide a question and</h6>
        <h6 class="text-center">the AI tarot will create a unique tarot card for you.</h6>

        <form action="{{ route('tarotCard') }}" class="text-center mt-4" method="POST">
            @csrf
            <div class="mb-3 form-group">
                {{-- <label for="exampleInputEmail1" class="form-label">Ask your question</label> --}}
                <input type="text" name="search" class="form-control" id="exampleInputEmail1"
                    placeholder="Will i find my love">
            </div>
            <div class="mb-3 form-group">
                <div class="tcb-product-slider">
                    <div class="container">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/Z7eqMnj.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Olympus Photo Camera </a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(4,585 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 495.00 (17% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/fCrZot6.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Coca Cola Bottle</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(245 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 99.00 (21% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/kTmJp8W.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Jewel from Italy</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(345 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 999.00 (33% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/sMwmKmh.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">White Pepper</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(45 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 199.00 (37% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/RuPhz54.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Belt Improted From Japan</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(2,125 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 49.00 (40% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/e4ARfEJ.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Tomato</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(5 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 9.00
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/ZlchtwK.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Tape Line</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(215 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 39.00 (15% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/GRPrGN6.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Test Glasses For Lab</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i>
                                                        <a href="#">(10,345 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 11,999.00 (37% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/Ds5mtGy.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Jewel From India</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(945 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 299.00 (54% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/e7IYyso.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Red Pepper</a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(15 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 5.00 (11% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/vuRE1W6.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Pro Cell Batteries </a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(745 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 19.00 (63% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="tcb-product-item">
                                                <div class="tcb-product-photo">
                                                    <a href="#"><img src="https://i.imgur.com/UibcRla.jpg"
                                                            class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="tcb-product-info">
                                                    <div class="tcb-product-title">
                                                        <h4><a href="#">Eye Glasses </a></h4>
                                                    </div>
                                                    <div class="tcb-product-rating">
                                                        <i class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="active glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i>
                                                        <a href="#">(145 ratings)</a>
                                                    </div>
                                                    <div class="tcb-hline"></div>
                                                    <div class="tcb-product-price">
                                                        $ 129.00 (29% off)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button"
                                data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button"
                                data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <section class="details">
                    <h1>Bootstrap 3 Carousel Slider Explained</h1>
                    <div class="back-link"><a
                            href="http://thecodeblock.com/beautiful-thumbnail-product-slider-in-bootstrap">

                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="20px" height="20px" viewBox="0 0 400.004 400.004"
                                style="enable-background:new 0 0 400.004 400.004;" fill="rgb(234,234,234)"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M382.688,182.686H59.116l77.209-77.214c6.764-6.76,6.764-17.726,0-24.485c-6.764-6.764-17.73-6.764-24.484,0L5.073,187.757
                            c-6.764,6.76-6.764,17.727,0,24.485l106.768,106.775c3.381,3.383,7.812,5.072,12.242,5.072c4.43,0,8.861-1.689,12.242-5.072
                            c6.764-6.76,6.764-17.726,0-24.484l-77.209-77.218h323.572c9.562,0,17.316-7.753,17.316-17.315
                            C400.004,190.438,392.251,182.686,382.688,182.686z">
                                    </path>
                                </g>
                            </svg>
                            Back to article</a></div>
                </section>
            </div>
            <button type="submit" href="#" class="btn btn-lg"><span>Read my Tarot</span> </button>
        </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')

</body>

</html>
