@extends('admin.includes.layout', ['breadcrumb_title' => 'FAQ'])
@section('title', 'FAQ')
@section('main-content')
<style>

/* accordion */
.accordion {
    max-width: auto;
    background: linear-gradient(to bottom right, #FFF, #f7f7f7);
    background: #25a0e2;
    margin: 1px auto;
    border-radius: 6px;
    /* box-shadow: 0 10px 15px -20px rgba(0, 0, 0, 0.3), 0 30px 45px -30px rgba(0, 0, 0, 0.3), 0 80px 55px -30px rgba(0, 0, 0, 0.1); */
}

.heading {
    color: #FFF;
    font-size: 14px;
    border-bottom: 1px solid #e7e7e7;
    letter-spacing: 0.8px;
    padding: 15px;
    cursor: pointer;
}

.heading:nth-last-child(2) {
    border-bottom: 0;
}

.heading:hover {
    background: #98bcf5;
    border-radius: 0px;
}

.heading:first-child:hover {
    border-radius: 3px 3px 0 0;
}

.heading:nth-last-child(2):hover {
    border-radius: 0 0 3px 3px;
}

.heading::before {
    content: '';
    vertical-align: middle;
    display: inline-block;
    border-top: 7px solid #f5f5f5;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    float: right;
    transform: rotate(0);
    transition: all 0.5s;
    margin-top: 5px;
}

.active.heading::before {
    transform: rotate(-180deg);
}

.not-active.heading::before {
    transform: rotate(0deg);
}

.contents {
    display: none;
    background: #FFFAFA;
    padding: 15px;
}
</style>
    <div id="basic-tabs" class="card card-default scrollspy">
        <div class="card-content">
            <div class="card-body">
                <div class="card-title">FAQ</div>
            <form
                action="{{ isset($faqedit)?route('admin.faq.update',$faqedit->id):route('admin.faq.store')}}"
                method="POST">
                @if (isset($faqedit))
                @method('patch')
                @endif
                @csrf
                <div class="row gy-4 mt-2">
                    <div class="input-feild col s12">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" id="question" name="question"
                            value="{{ isset($faqedit) ? $faqedit->question : old('question') }}" required>
                        {{-- @error('question')<span class="pink-text text-accent-3">{{$message}}</span>@enderror --}}
                    </div>
                </div>
                <div class="row gy-4 mt-2">
                    <div class="input-feild col s12">
                        <label for="answer">Answer</label>
                        <textarea name="answer" id="answer" class="materialize-textarea form-control"
                            placeholder="Answer" class=""
                            required>{{ isset($faqedit) ? $faqedit->answer : old('answer') }}</textarea>
                    </div>
                    <!--end col-->
                </div><br>
                <div class="row gy-4">
                    <div class="col-xxl-3 col md-4">
                        <button class="btn btn-primary" id="btn-btn"
                            type="submit">{{ isset($faqedit) ? 'Update' : 'Submit' }}</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div id="basic-tabs" class="card card-default scrollspy">
        <div class="card-content">
            <div class="card-body">
                <div class="card-title">Manage FAQ</div><br>
            @foreach ($faq as $faq )
            <div class="row">
                <div class="col-md-11">
                    <div class="accordion">
                        <div class="heading">Question:-{{$faq->question}}
                        </div>
                        <div class="contents">Answer:- {{$faq->answer}}</div>
                    </div>
                </div>
                <div class="col-md-1" style="margin-top: 10px;">
                    <a href="{{route('admin.faq.edit', $faq->id)}}"><i
                            class="fa fa-pencil-square bg-white text-success fs-2"></i></a>
                    <a class="delete_confirm" href="{{route('admin.faq.show', $faq->id) }}"><i
                            class="fa fa-trash bg-white text-danger fs-2"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script-area')

<script>
$(document).ready(function() {
    $(".accordion").on("click", ".heading", function() {

        $(this).toggleClass("active").next().slideToggle();

        $(".contents").not($(this).next()).slideUp(300);

        $(this).siblings().removeClass("active");
    });
});
</script>

@endsection