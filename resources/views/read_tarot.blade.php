<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ask with OpenAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>


    <div class="container col-6">
        <h1 class="text-center">Ask with Open AI</h1>
        <form action="{{ route('openAiGenerate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ask question</label>
                <input type="text" name="search" class="form-control" id="exampleInputEmail1"
                    placeholder="Ask your question with Open AI">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
    @isset($txt_result)
        <div class="container col-6 mt-5 border border-2 border-primary">

            <h2>Result (Text)</h2>
            <hr />
            <p>{{ $txt_result['content'] }}</p>


        </div>
    @endisset
    @isset($img_result)
    <div class="container col-6 mt-5 border border-2 border-success mt-3 mb-5">

        <h2>Result (Image)</h2>
        <hr />
        <div class="row">
                @forelse ($img_result['data'] as $data)
                    <div class="col-4">
                        <img src="{{ $data['url'] }}" height="250px" width="250px" />
                    </div>

                @empty
                    <p class="text-center">No image available</p>
                @endforelse
        </div>


    </div>
    @endisset

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
