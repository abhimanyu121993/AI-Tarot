<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Result</title>
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
    </style>
</head>

<body>



    <div class="container shadow p-3 mb-5 bg-body rounded col-8 d-flex justify-content-center mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="text-center mt-3 mb-3">{{ $user->question }}</h5><br />

                    @forelse ($img_result['data'] as $data)
                        <div class="col-12">
                            <img class="img-thumbnail col-4 rounded-2 mx-auto d-block" src="{{ $data['url'] }}" />
                        </div>

                    @empty
                        <p class="text-center">No image available</p>
                    @endforelse
                </div>

                <div class="row mt-5">
                    <h1 class="text-center mt-3 mb-2" style="font-family: 'Lobster', cursive;">Text AI Output</h1><br />


                    <h6 style="text-align: justify;">{{ $txt_result['content'] }}</h6>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')

</body>

</html>
