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
        body{
            background: #C9D6FF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #E2E2E2, #C9D6FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        </style>
</head>
<body>
    <div class="container col-8">
        <h1 class="text-center">Admin Screen</h1>
        <div class="row mt-5">
            <div class="col-5 p-3 card shadow p-3 m-2 bg-body rounded">
                <h4 class="text-center mb-2" >Text</h4>
                <hr/>
                <form action="{{ route('saveAdminQuery') }}" method="POST">
                    @csrf
                    <input type="hidden" name="query2" value="text" />
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">T1</label>
                        <input type="text" name="t1" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter text 1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">T2</label>
                        <input type="text" name="t2" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter text 2">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-5 card shadow p-3 m-2 bg-body rounded p-3">
                <h4 class="text-center mb-2" >Picture</h4>
                <hr/>
                <form action="{{ route('saveAdminQuery') }}" method="POST">
                    @csrf
                    <input type="hidden" name="query1" value="picture" />
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">P1</label>
                        <input type="text" name="t1" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter picture 1 text">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">P2</label>
                        <input type="text" name="t2" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter picture 2 text">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @isset($data)
    <div class="container col-8 mt-5 card">
        <h3 class="text-center"> Admin Screen Data</h3>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Query</th>
                <th scope="col">Text 1</th>
                <th scope="col">Text 2</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $d->query }}</td>
                    <td>{{ $d->t1 }}</td>
                    <td>{{ $d->t2 }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    @endisset
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')
</body>
</html>
