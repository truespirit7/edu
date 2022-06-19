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
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
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

                            <div class="text-center mb-50">
{{--                                <p class="post-date">{{$date->translatedFormat('d F Y')}} / @foreach ($categories as $category) @if ($category['id'] == $post['category_id']) {{ $category['title'] }} @endif  @endforeach </p>--}}
                                <h2 class="post-title">Тест: "{{$test->title}}"</h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    {{--                                    <a href="#"><span>by</span> Colorlib</a>--}}
{{--                                    <a href="#"><span>Комментариев:</span> {{count($comments)}} </a>--}}
                                </div>
                            </div>



                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->
                                @foreach($questions as $question)
                                <form action="" method="post">
                                    <input type="hidden" name="q" value="123">

                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="text-center mt-5">
                                                <p>Вопрос {{count($questions)}}</p>
                                            </div>
                                            <div class="card mt-3">
                                                <div class="card-header">
                                                    <h3>{!! $question->question_text !!}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <input type="radio" name="answer_id" >{!! $question->answer_true !!}
                                                        <input type="radio" name="answer_id" > {!! $question->answer_false !!}
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </form>
                                @endforeach
                                <div class="text-center mt-3">
                                    <button type="submit" href=" {{ route('test-result', $test) }} " class="btn btn-success">Получить результат</button>
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
