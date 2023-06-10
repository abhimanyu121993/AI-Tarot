<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AITarot- Tarot </title>

    @include('home.includes.head')
</head>

<body>

    <!-- ===============>> Preloader start here <<================= -->
    <div class="preloader">
        <img src="https://cdn.dribbble.com/users/77121/screenshots/14940152/media/43b7da225b094b9e68ef4b4416b60878.gif" alt="Apes land" width="300" height="200">
    </div>
    <!-- ===============>> Preloader end here <<================= -->



    <!-- ========== Multipage Header Section Starts Here========== -->
    @include('home.includes.header')
    <!-- ========== Multipage Header Section Ends Here========== -->





    <!-- connect wallet modal start -->
    <div class="wallet-modal modal fade" id="wallet-option" tabindex="-1" aria-labelledby="choose-wallet"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="choose-wallet">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <p>Please select a wallet to connect for <br> Start Minting your NFTs</p> --}}
                    <form action="{{route('admin.userstore')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-12 d-flex">
                        <div class="col-md-6 p-2"><input type="text" name="first_name" placeholder="Enter your First Name" class="form-control"></div>
                        <div class="col-md-6 p-2"><input type="text" placeholder="Enter your Last Name" name="last_name" class="form-control"></div>
                        </div>
                        <div class="col-md-12 d-flex">
                        <div class="col-md-6 p-2"><input type="email" placeholder="Enter your Email" name="email" class="form-control"></div>
                        <div class="col-md-6 p-2"><input type="password" placeholder="Enter your Password" name="password" class="form-control"></div>
                        </div>
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6 p-2"><input type="number" placeholder="Enter your Number" name="phone" class="form-control"></div>
                        </div>
                        <div class="col-md-12 d-flex">
                        <div class="col-md-12 p-2"><textarea placeholder="Address" name="address" class="form-control"></textarea></div>
                        </div>
                    </div>
                    <button type="submit" style="background: #00ffa3;float:right;margin-right:0.5rem" class="btn">Submit</button>
                    </form>
                    {{-- <p>By connecting your wallet, you agree to our Terms of Service and our Privacy Policy.</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- connect wallet modal end -->





@yield('content')



    <!-- ================> Footer section start here <================== -->
    @include('home.includes.footer')
    <!-- ================> Footer section end here <================== -->


   @include('home.includes.foot')
   @include('sweetalert::alert')

</body>

</html>
