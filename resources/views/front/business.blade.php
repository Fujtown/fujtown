@extends('layout.app')
    @section('title', 'Home Page')
    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/business.css') }}">
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
        <div class="breadcrumbs wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <ul>
              <li><a href="#">
                  <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                  </svg>Home</a></li>
              <li><a href="{{ route('company',$parent_cat->parent_url) }}">{{$parent_cat->parent_category_name}}</a></li>
              <li><a href="#">{{$service}}</a></li>
            </ul>
          </div>
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h3 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn page-title" data-wow-delay=".2s">
                Top {{count($listings)}} {{$service}} in UAE
                </h3>
             
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
         <div class="row ">
            @if($listings->isEmpty())
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body empty-list">
                        <h4>No Listings Found...</h4>
                    </div>
                </div>
            </div>
            @else
            @foreach($listings as $listing)
            <div class="col-md-6 mt-10">
            <div class="card listing-card">
              @if($listing->listing_featured==1)
            <div class="ribbon"><span>FEATURED</span></div>
            @endif
                <div class="card-body">
                
               <div class="row">
               
                <div class="col-md-9">
                <h4><a href="{{ route('listing', ['listing' => $listing->listurl]) }}" title="{{$listing->listing_name}}">{{$listing->listing_name}}</a></h4>
                <div class="address">Address: {{$listing->listing_additional_info}}, <b>{{$listing->listing_region}}</b> </div>
                <div class="s"><i class="fa fa-phone" aria-hidden="true"></i><span> @if ($listing->listing_phone)
           {{$listing->listing_phone}}
            @else
            {{$listing->listing_landline}}
            @endif</span></div>
                <div class="s"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Map</span></div>
                <div class="s"><img src="{{asset('assets/imgs/page/homepage3/picture.png')}}"alt=""> <span>{{count($listing->images)}} Photos</span></div>
                </div>
                <div class="col-md-3">
                    <div class="logo">
                    <img  width="90" height="90"  src="{{ strpos($listing->listing_cover_image, 'cover_images') === false ? asset('storage/cover_images/' . $listing->listing_cover_image) : asset('storage/' . $listing->listing_cover_image) }}" alt="">
                    </div>
                </div>
               </div>
                </div>
            </div>
          </div>
          @endforeach
          <!-- Pagination Links -->
          <div class="mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($listings->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $listings->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
            @endif

            @foreach ($listings->getUrlRange(1, $listings->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $listings->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($listings->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $listings->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                </li>
            @endif
        </ul>
    </nav>
</div>

            @endif
         </div>
        </div>
      </section>

    </main>

  @endsection
