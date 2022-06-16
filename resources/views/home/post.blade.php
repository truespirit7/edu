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
                                <p class="post-date">{{$date->translatedFormat('d F Y')}} / @foreach ($categories as $category) @if ($category['id'] == $post['category_id']) {{ $category['title'] }} @endif  @endforeach </p>
                                <h2 class="post-title">{{$post->title}}</h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
{{--                                    <a href="#"><span>by</span> Colorlib</a>--}}
                                    <a href="#"><span>Комментариев:</span> {{count($comments)}} </a>
                                </div>
                            </div>

                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <img src="{{asset('storage/' . $post['preview_img'])}}" alt="">
                            </div>

                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->
                                <div class="post-share">
                                    <span>Share</span>
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                                </div>
                                {!! $post->content !!}
                                <!-- Post Tags & Share -->
                                <div class="post-tags-share">
                                    <!-- Tags -->
                                    <ol class="popular-tags d-flex flex-wrap">
                                        @foreach($postTags as $postTag)
                                            @if ($postTag['post_id'] == $post['id'])
                                                @foreach($tags as $tag)
                                                    @if ($postTag['tag_id'] == $tag['id'])
                                                        <li><a href="{{route('postsByTag', $tag)}}">{{$tag['title']}}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif

                                        @endforeach
                                    </ol>
                                </div>
                                @foreach($tests as $test)

                                <div class="single-widget-area mb-30">
                                    <!-- Title -->
                                    <div class="widget-title">
                                        <a href="@if ($test['post_id'] == $post['id']) {{ route('test', $test) }} @endif" class="post-title">
                                        <h6>Пройти тест:""</h6>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                                <!-- Related Post Area -->
                                <div class="related-posts clearfix">
                                    <!-- Headline -->
                                    <h4 class="headline">Рекомендуемые статьи</h4>

                                    <div class="row">
{{--                                    @foreach ($categories as $category) @if ($category['id'] == $post['category_id']) {{   }} @endif  @endforeach--}}
                                        <!-- Single Blog Post -->
                                            @foreach ($postsByCategory as $post)
                                            <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('article', $post)}}"><img src="{{  asset('storage/' . $post['preview_img']) }}" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date">{{substr($post['created_at'], -20, 10)}} / @foreach ($categories as $category) @if ($category['id'] == $post['category_id']) {{ $category['title'] }} @endif  @endforeach </p>
                                                    <a href="{{ route('article', $post)}}" class="post-title">
                                                        <h4>{{$post->title}}</h4>
                                                    </a>
                                                    <p class="post-excerpt">{{$post['excerpt']}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!-- Single Blog Post -->


                                    </div>
                                </div>

                                <!-- Comment Area Start -->
                                <div class="comment_area clearfix">
                                    <h4 class="headline">Комментариев: {{count($comments)}}</h4>
                                    <ol>

                                                <!-- Comment Content -->
                                                @foreach($comments as $comment)
                                                    <!-- Single Comment Area -->
                                                        <li class="single_comment_area">
                                                            <div class="comment-wrapper d-flex">
                                                                <!-- Comment Meta -->
                                                                <div class="comment-author">
                                                                    <img src="img/blog-img/9.jpg" alt="">
                                                                </div>
                                                <div class="comment-content">
                                                    <span class="comment-date">{{$comment->created_at}}MAY 10, 2018</span>
                                                    <h5>{{$comment->name}}</h5>
                                                    <p>{{$comment->message}}</p>
                                                    <a href="#">Like</a>
                                                    <a class="active" href="#">Reply</a>
                                                </div>
                                                @endforeach
                                            </div>
{{--                                            <ol class="children">--}}
{{--                                                <li class="single_comment_area">--}}
{{--                                                    <div class="comment-wrapper d-flex">--}}
{{--                                                        <!-- Comment Meta -->--}}
{{--                                                        <div class="comment-author">--}}
{{--                                                            <img src="img/blog-img/10.jpg" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <!-- Comment Content -->--}}
{{--                                                        <div class="comment-content">--}}
{{--                                                            <span class="comment-date">MAY 18, 2018</span>--}}
{{--                                                            <h5>Dianna Agron</h5>--}}
{{--                                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>--}}
{{--                                                            <a href="#">Like</a>--}}
{{--                                                            <a class="active" href="#">Reply</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ol>--}}
{{--                                        </li>--}}
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-author">
                                                    <img src="img/blog-img/11.jpg" alt="">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content">
                                                    <span class="comment-date">MAY 24, 2018</span>
                                                    <h5>Chris Hemsworth</h5>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>
                                                    <a href="#">Like</a>
                                                    <a class="active" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>

                                <!-- Leave A Comment -->
                                <div class="leave-comment-area clearfix">
                                    <div class="comment-form">
                                        <h4 class="headline">Оставить комментарий</h4>

                                        <!-- Comment Form -->
                                        <form method="post" action="{{route('article.comment.store', $post->id)}}" >
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" id="contact-name" placeholder="Имя">
                                                    </div>
                                                </div>
{{--                                                <div class="col-12 col-md-6">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="email" class="form-control" id="contact-email" placeholder="Email">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Ваш комментарий"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn nikki-btn">Отправить</button>
                                                </div>
                                            </div>
                                        </form>
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
