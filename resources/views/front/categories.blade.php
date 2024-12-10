@extends('layout.app')
    @section('title', 'Home Page')
    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/business.css') }}">
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn page-title" data-wow-delay=".2s">
                {{$pcat->parent_category_name}}
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
         <div class="row b-list">
            @foreach($categories as $cat)
            <div class="col-md-4">
                <a href="{{route('bussiness',['service' => $cat->url])}}">{{$cat->category_name}} <span>{{$cat->listing_count}}</span></a>
            </div>
            @endforeach
         </div>
        </div>
      </section>

    </main>

  @endsection
