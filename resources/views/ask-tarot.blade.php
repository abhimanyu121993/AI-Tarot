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

<body style="background-image:  ">


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
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          @foreach ($cards as $card)
                          <div class="col-md-3" >
                            <input type="checkbox" name="card" id="card" />
                            <img src="{{ asset($card->card_images) }}" for="card" class="d-block w-100" alt="Product 1">
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

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
