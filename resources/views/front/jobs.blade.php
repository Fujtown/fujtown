@extends('layout.app')
    @section('title', 'Home Page')
    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/job.css') }}">
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    Jobs
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
             @include('front.inc.job-list', ['jobs' => $jobs])
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
            <h5 class="section-title style-1 mb-30">Job Categories</h5>
            <ul>
               <li><a href="#">Information Technology</a></li>
               <li><a href="#">Accountant</a></li>
               <li><a href="#">HR</a></li>
            </ul>
        </div>

        <div class="sidebar-widget widget-category-2 mb-50">
            <h5 class="section-title style-1 mb-30">Location</h5>
            <ul>
               <li><a href="#">Fujairah <span>(10)</span></a></li>
               <li><a href="#">Dubai <span>(10)</span></a></li>
               <li><a href="#">Abu Dhabi <span>(10)</span></a></li>
               <li><a href="#">Sharjah <span>(10)</span></a></li>
            </ul>
        </div>
       
    </div>
</div>

          </div>
        </div>
      </section>

    </main>

  @endsection
