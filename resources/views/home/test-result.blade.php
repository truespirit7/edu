@extends('layouts.main')

@section('title', 'Название поста')

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
{{--                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="#">Blog</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>--}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12">

                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-content">
{{--                            @foreach($tests as $post_test)--}}
{{--                                @if ($post_test['test_id'] == $test)--}}
                                <div class="text-center mb-50">
{{--                                <p class="post-date">{{$date->translatedFormat('d F Y')}} / @foreach ($categories as $category) @if ($category['id'] == $post['category_id']) {{ $category['title'] }} @endif  @endforeach </p>--}}
                                <h2 class="post-title">Тест: "{{$test['title']}}"</h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    {{--                                    <a href="#"><span>by</span> Colorlib</a>--}}
{{--                                    <a href="#"><span>Комментариев:</span> {{count($comments)}} </a>--}}
                                </div>
                            </div>
{{--                            @endif--}}
{{--                        @endforeach--}}



                            <!-- Post Text -->
                            <div class="post-text">

                                <!-- Share -->
                                <form action="" method="post">
                                    @foreach($questions as $question)
                                    <input type="hidden" name="q" value="123">

                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="text-center mt-5">
                                            </div>
                                            <div class="card mt-3">
                                                <div class="card-header">
                                                    <h3>{!! $question->question_text !!}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <input type="radio" name="answer_id" @if($results[$question->id] == "Верно!") checked @endif>{!! $question->answer_true !!}
                                                        <input type="radio" class="ml-30" name="answer_id" @if($results[$question->id] == "Неверно.") checked @endif> {!! $question->answer_false !!}
                                                    </div>

                                                </div>
                                            </div>
                                            <p  @if($results[$question->id] == "Неверно.") class="text-danger font-weight-bold mt-15" @else class="text-success font-weight-bold mt-15" @endif >
                                            {!! $results[$question->id] !!}
                                            </p>
                                            <p>
                                                {!! $question->question_explanation!!}
                                            </p>




                                        </div>
                                    </div>
                                </form>
                                @endforeach
                                <div class="text-center mt-3">
{{--                                    <button type="submit" href=" {{ route('test-result', $test) }} " class="btn btn-success">Получить результат</button>--}}
                                </div>
{{--                                <div class="post-share">--}}
{{--                                    <span>Share</span>--}}
{{--                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
{{--                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>--}}
{{--                                </div>--}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@endsection
