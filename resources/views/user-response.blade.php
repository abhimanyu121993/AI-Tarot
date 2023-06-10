<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Response</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
        body{
            background: #C9D6FF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #E2E2E2, #C9D6FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        </style>
</head>

<body>
    <h1 class="text-center mt-3 mb-2" style="font-family: 'Lobster', cursive;">User Responses</h1>

    <div class="container col-8 mt-5 card">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Questions</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $d)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $d->question }}</td>
                    <td><a href="{{ route('delUserResponse', $d->id) }}" class="btn btn-danger" >Delete</a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          {{$users->links('pagination::bootstrap-5')}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')

</body>

</html>
