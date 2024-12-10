@extends('layout.app')
@section('meta_title', $metaTitle)

@section('meta_description',  $metaDescription)
@section('meta_keywords', 'Fujairah businesses, Fujtown, local services, directory')

    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/company-details.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/source/jquery.fancybox.css?v=2.1.5')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}" />
@endsection
    @section('content')
   
    <main class="main">
     
      <section class="section mt-50">
        <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
  <a href="#" class="close alert-close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> {{ session('success') }}
</div>       
     @endif
        <div class="breadcrumbs wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <ul>
              <li><a href="#">
                  <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                  </svg>Home</a></li>
              <li><a href="#">
                @if ($listing->single_category)
                {{ $listing->single_category->category_name }}
            @elseif (isset($listing->multiple_category[0]))
                {{ $listing->multiple_category[0]->category_name }}
            @else
                No category available
            @endif

                </a></li>
              <li><a href="#">{{$listing->listing_name}}</a></li>
            </ul>
          </div>
          <div class="row mt-20">
          <div class="col-12 listing-details details">
			
          <h2>{{$listing->listing_name}}</h2>
          <ul class="list-inline benefits">
         <li><i class="rounded-x fa fa-home"></i>{{$listing->listing_additional_info}}, {{$listing->listing_region}}</li>
          <li><i class="rounded-x fa fa-phone"></i>
          @if ($listing->listing_phone)
           {{$listing->listing_phone}}
            @else
            {{$listing->listing_landline}}
            @endif
        </li>
        <li>
    <a href="tel:@if($listing->listing_phone){{$listing->listing_phone}}@else{{$listing->listing_landline}}@endif" 
       class="btn btn-success btn-call">
        <span class="fa fa-phone"></span> &nbsp;&nbsp;Call Now
    </a>
</li>

          </ul><br>
          <ul class="listing-badges">

                <li><span class="badge bg-success"><i class="fi-rr-check"></i> </span> Verified Listing</li>
                <li><span class="badge bg-secondary"><i class="fi-rr-time-past"></i> </span>
                @php
                use Carbon\Carbon;
                $startDate = Carbon::parse($listing->listing_date);
                $yearsWithUs = floor($startDate->diffInRealYears(Carbon::now()));

            @endphp

            @if($yearsWithUs==0)1 @else {{ $yearsWithUs }}+ @endif  Years With Us</li>
                <li><span class="badge bg-info"><i class="fi-rr-refresh"></i> </span> Recently Updated</li>
            </ul><br>
          <div class="company-listing-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="contacts-tab" data-bs-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="true">Contacts</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="map-tab" data-bs-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="{{$_SERVER['REQUEST_URI']}}#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{count($listing->reviews)}})</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="qa-tab" data-bs-toggle="tab" href="#qa" role="tab" aria-controls="qa" aria-selected="false">Q&A</a>
            </li>
           
        </ul>
    </div>
    
        <div class="row">
            <div class="col-md-8">
            <div class="cmp_details">
              <div class="row">
                <div class="col-md-6">
                <div class="info">
            <strong class="label">Listing name</strong>
            <h5>{{$listing->listing_name}}</h5>
             </div>
            <div class="info">
            <strong class="label">Address</strong>
            <h5>{{$listing->listing_additional_info}}, {{$listing->listing_region}}</h5>
             </div>
            <div class="info">
            <strong class="label">Phone</strong>
            <h5>{{$listing->listing_landline}}</h5>
             </div>
            <div class="info">
            <strong class="label">Mobile</strong>
            <h5>{{$listing->listing_phone}}</h5>
             </div>
            <div class="info">
            <strong class="label">Website</strong>
            <p><a href="{{$listing->listing_web_url}}">{{$listing->listing_web_url==''? '---------':$listing->listing_web_url}}</a></p>
             </div>
            

                </div>
                <div class="col-md-6">
            <div class="photos">
                    <div class="photos_in">
            @if(is_null($listing->images))
             @foreach($listing->images as $img)           
            <a class="fancybox-buttons photo_href" data-fancybox-group="button" href="{{ strpos($img->listing_images, 'gallery_images') === false ? asset('storage/gallery_images/' . $img->listing_images) : asset('storage/' . $img->listing_images) }}">
            <img src="{{ strpos($img->listing_images, 'gallery_images') === false ? asset('storage/gallery_images/' . $img->listing_images) : asset('storage/' . $img->listing_images) }}" data-src="{{ strpos($img->listing_images, 'gallery_images') === false ? asset('storage/gallery_images/' . $img->listing_images) : asset('storage/' . $img->listing_images) }}" alt="" class="lazy-img" width="150" height="150">
            </a>
            @endforeach 
            @else
            <a class="fancybox-buttons photo_href" data-fancybox-group="button" href="{{ strpos($listing->listing_cover_image, 'cover_images') === false ? asset('storage/cover_images/' . $listing->listing_cover_image) : asset('storage/' . $listing->listing_cover_image) }}">
            <img src="{{ strpos($listing->listing_cover_image, 'cover_images') === false ? asset('storage/cover_images/' . $listing->listing_cover_image) : asset('storage/' . $listing->listing_cover_image) }}" data-src="{{ strpos($listing->listing_cover_image, 'cover_images') === false ? asset('storage/cover_images/' . $listing->listing_cover_image) : asset('storage/' . $listing->listing_cover_image) }}" alt="" class="lazy-img" width="150" height="150">
            </a>
            @endif

                   </div>
                    </div>
                </div>
              
               <div class="col-md-12  mt-50">
               <hr>
               <h3>Listing Details</h3>
               <div class="info mt-30">
                <strong class="label">Description</strong>
                <p>
                    {!! $listing->listing_desc !!}
                </p>
               </div>
               </div><br>
               <strong class="label">Listed in categories</strong>
               <p>
               @if(is_null($listing->multiple_category))
                @foreach($listing->multiple_category as $cat)
               <a href="#">{{$cat->category_name}} </a> |
               @endforeach
               @else
               <a href="#">{{$listing->single_category->category_name}} </a>
               @endif
               
            </p>
              </div>  
           
            </div>
            <br>
            <div class="reviews" id="reviews">
            <h4>Reviews</h4>
            <button class="btn btn-brand-1 hover-up">Write a Review</button>
            </div>
            <br>
            @if($listing->reviews->isEmpty())
            <div class="card">
               <div class="card-body">

               <p>This Company has no reviews. Be the first to share your experiences!</p>
               </div> 
            </div>
            @else
            @foreach($listing->reviews as $review)
            <div class="card">
               <div class="card-body">
               <div class="author"><div class="userimage"><i class="fas fa-user" aria-hidden="true"></i></div><div class="review-name" >
                <span itemprop="name">
                @if ($review->name)
                {{$review->name}}
                @else
                Anonymous
                @endif
                    <span></span></span></div><div class="review-date">
               @php
    $date = \Carbon\Carbon::parse($review->date_created);
@endphp

<time itemprop="datePublished" datetime="{{ $date->format('Y-m-d H:i:s') }}">
    Posted on {{ $date->format('j M, Y') }}
</time>
</div> </div>
               <p>{{$review->message}}</p>
               </div> 
            </div>
            @endforeach
            @endif  
            <br><br>
            <hr>
            <div class="card">
            <div class="card-body">
    <h5 class="card-title">Review Form</h5>
    
    <form action="{{route('send-review')}}" method="POST">
        @csrf
        <span class="anonymous"><input type="checkbox" id="hid" onclick="return send_anonymous(this);" name="anonymous" value="1"> Anonymous</span>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="companyName" >
                </div>
                <div class="col-md-6">
                <label for="email" class="form-label">Contact Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
           <input type="hidden" value="{{$listing->listing_id}}" name="listing_id">
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required ></textarea>
        </div>
       
       
        <button type="submit" class="btn btn-brand-1 hover-up">Submit Listing</button>
    </form>
</div>

            </div>
           
        </div>
        <div class="col-md-4">
        @include('front.inc.list-map',['business_hour' => $business_hour,'listing_lat'=>$listing->listing_lat,'listing_long'=>$listing->listing_long])
        <br>
        <p class="views">  This Listing has been viewed {{$listing->listing_view_counter}} Times</p>
        <br>
        <h6>Share on social media</h6><br>
        <div class="sharethis-inline-share-buttons"></div>
        </div>
</div>   

           
        </div>
           

          </div>
        </div>
      </section>

    </main>

    <!-- Schema Markup -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": @json($listing->listing_name),
    "description": @json($metaDescription),
    "address": {
        "@type": "PostalAddress",
        "streetAddress": @json($listing->listing_region)
    },
    "url": "{{ url()->current() }}"
}
</script>
  @endsection

    @section('script')
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=671379f94f05ef00123c5fb7&product=inline-share-buttons&source=platform" async="async"></script>
    <script type="text/javascript" src="{{asset('assets/source/jquery.fancybox.js?v=2.1.5')}}"></script>
    <script type="text/javascript" src="{{asset('assets/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}"></script>
    
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.alert-close').forEach(function(closeBtn) {
        closeBtn.addEventListener('click', function(event) {
            event.preventDefault();
            // Find the parent .alert element and hide it
            const alert = this.closest('.alert');
            if (alert) {
                alert.style.display = 'none';
            }
        });
    });
});

     function send_anonymous(obj){
        if (obj.checked){
            $('#companyName').hide().find('input').attr('required',false);

        } else {
            $('#companyName').show().find('input').attr('required',true);
        }
        return true;
    }
    $(document).ready(function() {
        $('.fancybox').fancybox();
        $(".fancybox-effects-a").fancybox({
            helpers: {
                title : {
                    type : 'outside'
                },
                overlay : {
                    speedOut : 0
                }
            }
        });
        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            prevEffect : 'none',
            nextEffect : 'none',
            closeBtn  : false,
            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },
            afterLoad : function() {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });

    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.api_key') }}"></script>

             
                 <script>
                    var myCenter=new google.maps.LatLng(25.120160444288842,56.331054458257995);
                    function initialize()
                    {
                        var mapProp = {
                            center:myCenter,
                            zoom:15,
                            scrollwheel: false,
                            styles: [
                                {
        "featureType": "all",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#202c3e"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "gamma": 0.01
            },
            {
                "lightness": 20
            },
            {
                "weight": "1.39"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "weight": "0.96"
            },
            {
                "saturation": "9"
            },
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            }
        ]
    },
   
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 30
            },
            {
                "saturation": "9"
            },
            {
                "color": "#29446b"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": 20
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 20
            },
            {
                "saturation": -20
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 10
            },
            {
                "saturation": -30
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#193a55"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "saturation": 25
            },
            {
                "lightness": 25
            },
            {
                "weight": "0.01"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "lightness": -20
            }
        ]
    }
               ]
                        };
                        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                        var icon = {
                            url: 'https://www.fujtown.com/images/marker.png'
                        };
                        var marker = new google.maps.Marker({
                            position: map.getCenter(),
                            map: map,
                            icon: icon
                        });
                        marker.setMap(map);
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>
    @endsection