@extends('layouts.main')

@section('title', 'Название теста')

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
                                    <a href="#"><span>by</span> Colorlib</a>
                                    <a href="#">03 <span>Comments</span></a>
                                </div>
                            </div>



                            <!-- Post Text -->
                            <div class="post-text">
{{--                            {!! $post->content !!}--}}

                                @foreach ($questions as $question)
                                    <h3 >Вопрос 1</h3>
                                {!! $question->question_text !!}
                                    <input type="radio" id="qwe"
                                           name="contact" value="email">
                                    <label for="contactChoice1">{{$question->answer_true}}</label>

                                    <input type="radio" id="qwe"
                                           name="contact" value="phone">
                                    <label for="contactChoice2">{{$question->answer_false}}</label>

{{--                                <input type="checkbox" name="answer" value="{{$question->answer_true}}" onclick="">--}}
{{--                                <input type="checkbox" name="answer" value="{{$question->answer_false}}" onclick="">--}}

                            @endforeach
                            <!-- Share -->
                                <div class="post-share">
                                    <span>Share</span>
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                                </div>

                                <div class="single-widget-area mb-30">
                                    <!-- Title -->
                                    <div class="widget-title">
                                        <a href=" {{ route('test-result', $test) }} " class="title">
                                            <h6>Узнать результат теста</h6>
                                        </a>
                                    </div>
                                </div>

                            {{--                                {!! $post->content !!}--}}
                                <!-- Post Tags & Share -->


                                <!-- Related Post Area -->
                                <div class="related-posts clearfix">
                                    <!-- Headline -->
                                    <h4 class="headline">related posts</h4>

                                    <div class="row">

                                        <!-- Single Blog Post -->
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="#"><img src="img/blog-img/1.jpg" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date">MAY 17, 2018 / lifestyle</p>
                                                    <a href="#" class="post-title">
                                                        <h4>A Closer Look At Our Front Porch Items From Lowe’s</h4>
                                                    </a>
                                                    <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single Blog Post -->
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="#"><img src="img/blog-img/4.jpg" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date">MAY 25, 2018 / Fashion</p>
                                                    <a href="#" class="post-title">
                                                        <h4>5 Things to Know About Dating a Bisexual</h4>
                                                    </a>
                                                    <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>




                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@endsection
