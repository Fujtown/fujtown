@extends('layout.app')
    @section('title', 'Home Page')
    @section('meta_title', $blog->title)

@section('meta_description',  $metaDescription)
@section('meta_keywords', $blog->keywords)
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
        <div class="breadcrumbs wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <ul>
              <li><a href="{{route('home')}}">
                  <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                  </svg>Home</a></li>
              <li><a href="{{route('blog')}}">Blog</a></li>
              <li><a href="#">{{$blog->title}}</a></li>
            </ul>
          </div>  
          
          </div>
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
          <div class="row">
          <div class="col-12">
            <h2 class="color-brand-1 mb-50">{{$blog->title}}</h2>
            <div class="row">
                <div class="col-md-7 blog-desc">
                <p>
                {!! $blog->description !!}
            </p>
                </div>
                <div class="col-md-5">
                <div class="blog-img">
                <img src="{{asset('storage/'.$blog->image)}}" alt="">
            </div>
                </div>
            </div>
           
            
            </div>
          </div>
        </div>
        <div class="border-bottom bd-grey-80 mt-30"></div>
      </section>
      <div class="section mt-50">
        <div class="container">
          <h3 class="color-brand-1">Recommended articles</h3>
          <div class="row mt-50">
          @foreach($recommendedBlogs as $recommended)
            <div class="col-lg-4 col-md-6 mb-30 item-article featured wow animate__animated animate__fadeIn" data-wow-delay=".0s">
              <div class="card-blog-grid card-blog-grid-3 hover-up">
                <div class="card-image"><a href="{{route('blog-details',$recommended->url)}}"><img src="{{asset('storage/'.$recommended->image)}}" alt="iori"></a>
                  <label class="lbl-border">{{$recommended->category->blog_cat_name}}</label>
                </div>
                <div class="card-info"><a href="{{route('blog-details',$recommended->url)}}">
                    <h4 class="color-brand-1">{{$recommended->title}}</h4></a>
                  <div class="mb-25 mt-10"><span class="font-xs color-grey-500">{{$recommended->formatted_date}}</span></div>
                 
                </div>
              </div>
            </div>
           @endforeach
        
          </div>
        </div>
      </div>

    </main>

  @endsection
