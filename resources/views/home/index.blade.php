@extends('layouts.main')
@section('title', 'Главная')
@section('content')
 <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="circle-preloader">
                <div class="a" style="--n: 5;">
                    <div class="dot" style="--i: 0;"></div>
                    <div class="dot" style="--i: 1;"></div>
                    <div class="dot" style="--i: 2;"></div>
                    <div class="dot" style="--i: 3;"></div>
                    <div class="dot" style="--i: 4;"></div>
                </div>
            </div>
        </div>

        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            @foreach ($posts as $post)
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url({{  asset('storage/' . $post['preview_img']) }});"></div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms">11 января, 2022 / Древний Рим</p>
                        <a href="{{ route('post.show', $post)}}" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2>{{$post->title}}</h2>
                        </a>
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">{{$post['excerpt']}}</p>
                        <a href="#" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Читать далее</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>
            @endforeach
        <!-- Single Hero Post -->
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url(img/blog-img/14.jpg);"></div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms">MAY 01, 2018 / lifestyle</p>
                        <a href="#" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2>A Closer Look At Our Front Porch Items From Lowe’s</h2>
                        </a>
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                        <a href="#" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Read More</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url(img/blog-img/15.jpg);"></div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms">MAY 01, 2018 / lifestyle</p>
                        <a href="#" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2>Answering Your Most Frequent International Transportation Questions</h2>
                        </a>
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                        <a href="#" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Read More</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-100">
        <div class="container">

            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">

{{--                            <!-- Featured Post Area -->--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="featured-post-area mb-50">--}}
{{--                                    <!-- Thumbnail -->--}}
{{--                                    <div class="post-thumbnail mb-30">--}}
{{--                                        <a href="#"><img src="img/blog-img/12.jpg" alt=""></a>--}}
{{--                                    </div>--}}
{{--                                    <!-- Featured Post Content -->--}}
{{--                                    <div class="featured-post-content">--}}
{{--                                        <p class="post-date">MAY 7, 2018 / lifestyle</p>--}}
{{--                                        <a href="#" class="post-title">--}}
{{--                                            <h2>A Closer Look At Our Front Porch Items From Lowe’s</h2>--}}
{{--                                        </a>--}}
{{--                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- Post Meta -->--}}
{{--                                    <div class="post-meta d-flex align-items-center justify-content-between">--}}
{{--                                        <!-- Author Comments -->--}}
{{--                                        <div class="author-comments">--}}
{{--                                            <a href="#"><span>by</span> Colorlib</a>--}}
{{--                                            <a href="#">03 <span>Comments</span></a>--}}
{{--                                        </div>--}}
{{--                                        <!-- Social Info -->--}}
{{--                                        <div class="social-info">--}}
{{--                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>--}}
{{--                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <!-- Single Blog Post -->
                            @foreach ($posts as $post)
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="{{  asset('storage/' . $post['preview_img']) }}" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">

                                            <p class="post-date">{{substr($post['created_at'], -20, 10)}} / @foreach ($categories as $category) @if ($category['id'] == $post['category_id']) {{ $category['title'] }} @endif  @endforeach </p>

                                        <a href="{{ route('post.show', $post)}}" class="post-title">
{{--                                            {{dd($post)}}--}}
                                            <h4>{{$post->title}}</h4>
                                        </a>
                                        <p class="post-excerpt"> {{$post['excerpt']}}</p>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            {{ $posts -> links() }}



                        </div>
                    </div>

                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                        <li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                    </ol>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">
                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Категории</h6>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('postsByCategory', $category) }}">{{ $category['title'] }}</a></li>
                                @endforeach
                            </ol>
                        </div>
{{--                        <!-- ##### Single Widget Area ##### -->--}}
{{--                        <div class="single-widget-area mb-30">--}}
{{--                            <!-- Title -->--}}
{{--                            <div class="widget-title">--}}
{{--                                <h6>About Me</h6>--}}
{{--                            </div>--}}
{{--                            <!-- Thumbnail -->--}}
{{--                            <div class="about-thumbnail">--}}
{{--                                <img src="img/blog-img/about-me.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <!-- Content -->--}}
{{--                            <div class="widget-content text-center">--}}
{{--                                <img src="img/core-img/signature.png" alt="">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ipsum adipisicing</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- ##### Single Widget Area ##### -->--}}
{{--                        <div class="single-widget-area mb-30">--}}
{{--                            <!-- Title -->--}}
{{--                            <div class="widget-title">--}}
{{--                                <h6>Subscribe &amp; Follow</h6>--}}
{{--                            </div>--}}
{{--                            <!-- Widget Social Info -->--}}
{{--                            <div class="widget-social-info text-center">--}}
{{--                                <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-instagram"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-google-plus"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-pinterest"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-linkedin"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-rss"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- ##### Single Widget Area ##### -->--}}
{{--                        <div class="single-widget-area mb-30">--}}
{{--                            <!-- Title -->--}}
{{--                            <div class="widget-title">--}}
{{--                                <h6>Latest Posts</h6>--}}
{{--                            </div>--}}

{{--                            <!-- Single Latest Posts -->--}}
{{--                            <div class="single-latest-post d-flex">--}}
{{--                                <div class="post-thumb">--}}
{{--                                    <img src="img/blog-img/lp1.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="post-content">--}}
{{--                                    <a href="#" class="post-title">--}}
{{--                                        <h6>10 Books to Read This Summer If You Want to Improve Yourself</h6>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Single Latest Posts -->--}}
{{--                            <div class="single-latest-post d-flex">--}}
{{--                                <div class="post-thumb">--}}
{{--                                    <img src="img/blog-img/lp2.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="post-content">--}}
{{--                                    <a href="#" class="post-title">--}}
{{--                                        <h6>Why I Decided to Give up My Favorite Foods and Go Vegan</h6>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Single Latest Posts -->--}}
{{--                            <div class="single-latest-post d-flex">--}}
{{--                                <div class="post-thumb">--}}
{{--                                    <img src="img/blog-img/lp3.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="post-content">--}}
{{--                                    <a href="#" class="post-title">--}}
{{--                                        <h6>The 10 Most Instagrammable Spots in San Diego</h6>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Single Latest Posts -->--}}
{{--                            <div class="single-latest-post d-flex">--}}
{{--                                <div class="post-thumb">--}}
{{--                                    <img src="img/blog-img/lp4.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="post-content">--}}
{{--                                    <a href="#" class="post-title">--}}
{{--                                        <h6>5 Things to Know About Dating a Bisexual</h6>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Single Latest Posts -->--}}
{{--                            <div class="single-latest-post d-flex">--}}
{{--                                <div class="post-thumb">--}}
{{--                                    <img src="img/blog-img/lp5.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="post-content">--}}
{{--                                    <a href="#" class="post-title">--}}
{{--                                        <h6>How to Take Critical Feedback at Work (Like a Boss)</h6>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

                        <!-- ##### Single Widget Area ##### -->
{{--                        <div class="single-widget-area mb-30">--}}
{{--                            <!-- Adds -->--}}
{{--                            <a href="#"><img src="img/blog-img/add.png" alt=""></a>--}}
{{--                        </div>--}}

{{--                        <!-- ##### Single Widget Area ##### -->--}}
{{--                        <div class="single-widget-area mb-30">--}}
{{--                            <!-- Title -->--}}
{{--                            <div class="widget-title">--}}
{{--                                <h6>Newsletter</h6>--}}
{{--                            </div>--}}
{{--                            <!-- Content -->--}}
{{--                            <div class="newsletter-content">--}}
{{--                                <p>Subscribe our newsletter for get notification about new updates, information discount, etc.</p>--}}
{{--                                <form action="#" method="post">--}}
{{--                                    <input type="email" name="email" class="form-control" placeholder="Your email">--}}
{{--                                    <button><i class="fa fa-send"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
    @endsection
