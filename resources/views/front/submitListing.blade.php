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
                Submit Listing
                </h1>
               <p class="submit-intro">You will find out that your business is growing as a direct result of your relationship with #1 Fujairah Business Directory. We offer an integrated approach to online marketing for businesses in Fujairah. The website allows visitors to review and recommend businesses and products that they have used. Fujtown.com is an easy way for your business to connect with more customers.</p>
              
              
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

        <div class="row mt-50">
        
        <div class="col-lg-2"></div>  
        <div class="col-lg-8">
        <h6 class="plan-head">Choose a suitable package for your business.</h6>
            <div class="row">
            @foreach($packages1 as $package)
            <div class=" col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
              <div class="card-plan-style-2 hover-up">
                <div class="card-plan">
                  <div class="card-image-plan">
                    <div class="icon-plan"><img src="{{asset('storage/'.$package->packg_thumb)}}" alt="iori"></div>
                    <div class="info-plan">
                      <h4 class="color-brand-1">{{$package->packg_name}}</h4>
                    </div>
                  </div>
                  <div class="box-day-trial"><span class="font-lg-bold color-brand-1 text-price-standard">AED {{$package->packg_price_year}}</span><span class="font-md color-grey-500 text-type-standard"></span><br><span class="font-xs color-grey-500 text-duration">Per Year</span></div>
                  <div class="mt-20"><a class="btn btn-brand-1-full hover-up" href="{{ route('customer.customer-adlisting', ['package' =>$package->slug]) }}">Create Listing
                      <svg class="w-6 h-6 icon-16 ml-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                      </svg></a></div>
                </div>
                <div class="mt-30 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                <ul class="list-ticks list-ticks-2">
                  @php
                  $points = json_decode($package->packg_points, true);
                  @endphp
                @foreach($points as $point)
                    <li>
                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $point['point'] }}

                        @if(!empty($point['sub_points']))
                            <ul class="pricing-child">
                                @foreach($point['sub_points'] as $sub_point)
                                    <li>{{ $sub_point }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
                </div>
              </div>
            </div>
            @endforeach

            </div>
        </div>  
        <div class="col-lg-2"></div>  
        <div class="row mt-50">
        <h6 class="plan-head">Our Other Packages</h6>
        @foreach($packages2 as $package)
            <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
              <div class="card-plan-style-2 hover-up">
                <div class="card-plan">
                  <div class="card-image-plan">
                    <div class="icon-plan"><img src="{{asset('storage/'.$package->packg_thumb)}}" alt="iori"></div>
                    <div class="info-plan">
                      <h4 class="color-brand-1">{{$package->packg_name}}</h4>
                    </div>
                  </div>
                  <div class="box-day-trial"><span class="font-lg-bold color-brand-1 text-price-standard">AED {{$package->packg_price_month}}</span><span class="font-md color-grey-500 text-type-standard"></span><br><span class="font-xs color-grey-500 text-duration">Month</span></div>
                  <div class="mt-20"><a class="btn btn-brand-1-full hover-up" href="{{ route('customer.customer-adlisting', ['package' =>$package->slug]) }}">Create Listing
                      <svg class="w-6 h-6 icon-16 ml-10" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                      </svg></a></div>
                </div>
                <div class="mt-30 mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                <ul class="list-ticks list-ticks-2">
                  @php
                  $points = json_decode($package->packg_points, true);
                  @endphp
                @foreach($points as $point)
                    <li>
                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ $point['point'] }}

                        @if(!empty($point['sub_points']))
                            <ul class="pricing-child">
                                @foreach($point['sub_points'] as $sub_point)
                                    <li>{{ $sub_point }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
                </div>
              </div>
            </div>
            @endforeach 
          </div>
          <div class="col-md-12">
            <h2 class="qa">Questions & Answers</h2>
            <hr>
           <div class="question">
           <h5>Will my business be visible on Google?</h5>
           <p>As we are not partnered with any search engines, we cannot guarantee that you will appear in the top search engine results.</p>
           </div>
           <div class="question">
           <h5>Will my listing appear on your other websites?</h5>
           <p> As your listing is Fujairah specific it will only appear on this directory website (<a href="https://www.fujtown.com">https://www.fujtown.com</a>).</p>
           </div>
           <div class="question">
           <h5>What does a golden package offer?</h5>
           <p> Golden package listings are published at the top of our search results, categories and keywords. Each listing will share top position for an equal amount of time as other premium listings with the same keywords.</p>
           </div>
           <div class="question">
           <h5>Can I delete a bad review?</h5>
           <p>Yes, listing administrator have access to manage review, you can audit your business reviews, however you can contact the site master admin to request an additional support.</p>
           </div>
          </div>
        </div>
      </section>

    </main>

  @endsection
