@extends('layout.app')
    @section('title', 'Home Page')

    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    Blogs
                </h1>
               
              
              
              </div>
              <!-- <div class="col-lg-5 d-none d-lg-block">
                <div class="box-banner-contact"><img src="assets/imgs/page/contact/banner.png" alt="iori"></div>
              </div> -->
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
          <div class="row">
          <div class="col-9">
             @include('front.inc.blog-list', ['blogs' => $getBlogs])
            </div>
            <div class="col-3">
    <div class="widget-area">
        <div class="sidebar-widget-2 widget_search mb-50">
            <div class="search-form">
                <form action="#">
                    <input type="text" placeholder="Search…">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="sidebar-widget widget-category-2 mb-50">
            <h5 class="section-title style-1 mb-30">Categories</h5>
            <ul>
                @foreach($categories as $cat)
                <li><a href="#">{{$cat->blog_cat_name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-widget widget-tags mb-50">
            <h5 class="section-title style-1 mb-30">Popular Tags</h5>
            <ul class="tags-list">
            @foreach($allTags as $tag => $count)
        <li class="hover-up">
            <a href="#"><i class="fi-rs-cross mr-10"></i>{{ $tag }} ({{ $count }})</a>
        </li>
    @endforeach
            </ul>
        </div>
    </div>
</div>

          </div>
        </div>
      </section>

    </main>

  @endsection
