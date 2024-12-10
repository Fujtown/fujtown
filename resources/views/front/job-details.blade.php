@extends('layout.app')
    @section('title', 'Home Page')
    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/job.css') }}">
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
          <div class="breadcrumbs wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <ul>
              <li><a href="{{route('jobs')}}">
                  <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                  </svg>All Jobs</a></li>
            
              <li><a href="#">{{$getjob->job_title}}</a></li>
            </ul>
          </div>
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    Job details
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
          <div class="col-12">
           <div class="card job-detail">
           <h4>{{$getjob->job_title}}</h4>
            <small><i class="fa fa-location"></i>&nbsp;<strong>{{$getjob->location}}</strong></small>
            <p>
          <i class="fas fa-money-bill"></i>
          @if($getjob && $getjob->salary_from && $getjob->salary_to)
              &nbsp;AED {{ $getjob->salary_from }} - AED {{ $getjob->salary_to }} a month
          @else
              Confidential
          @endif
      </p>

          <div class="row mt-20 mb-10">
            <div class="col-md-4">
              <h5>Experience</h5>
              <p>@if(empty($getjob->experience)) Not Mentiond @else {{$getjob->experience}} @endif</p>
           
            </div>
            <div class="col-md-4">
              <h5>Gender</h5>
              <p class="gender">@if(empty($getjob->gender)) Gender Not Mentiond @else {{$getjob->gender}} @endif</p>
            </div>
           
            <div class="col-md-4">
            <h5>Education</h5>
            <p>@if(empty($getjob->education)) Not Mentiond @else {{$getjob->education}} @endif</p>
            </div>
          </div>

            <a href="#" class="btn btn-brand-1 apply-btn">Apply</a>
            <hr>
            <div>
           <h3> Full job description</h3>
            {!! $getjob->description !!}
            </div>
            </div>
           </div>
       

          </div>
        </div>
      </section>

    </main>

  @endsection
