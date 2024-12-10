    @extends('layout.app')
    @section('title', 'Home Page')

    @section('content')
   
   
    <main class="main">
      <section class="section banner-3 banner-overlay">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-end">
              <div class="col-lg-6 pt-80 pb-50 bg-text"><span class="title-line line-48 wow animate__animated animate__fadeInUp" data-wow-delay=".0s"><span>Get Started</span></span>
              <h1 class="color-brand-1 mb-20 mt-15 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">Discover Fujairah's Business Directory</h1>

                <div class="box-button-video wow animate__animated animate__fadeInUp" data-wow-delay=".4s"><a class="btn btn-play font-sm-bold popup-youtube color-brand-1 hover-up" href="https://www.youtube.com/watch?v=sVPYIRF9RCQ">Watch Video how it's working</a></div>
                <div class="mt-40 d-flex">
                  <div class="wow animate__animated animate__zoomIn" data-wow-delay=".0s"><img class="img-banner-1 mr-15" src="assets/imgs/page/homepage3/chart1.png" alt="iori"></div>
                  <div class="wow animate__animated animate__zoomIn" data-wow-delay=".2s"><img class="img-banner-2" src="assets/imgs/page/homepage3/chart2.png" alt="iori"></div>
                </div>
              </div>
              <div class="col-lg-6 d-none d-lg-block position-relative">
                <div class="box-image-main wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                  <!-- <img class="image-banner-main d-block" src="assets/imgs/page/homepage3/banner.png" alt="iori"></div> -->
                <div class="box-chart"><img class="image-chart shape-1"  alt="Fujairah Business Directory" src="assets/imgs/page/homepage3/chart-1.jpg" alt="iori"></div>
              </div>
            </div>
          </div>
          <div class="row search-container py-4 align-items-center">
    <h2 class="color-brand-1 text-center">SEARCH FUJAIRAH</h2>
    <h3 class="search-desc text-center">
    Find the Best Companies and Services in Fujairah.
    </h3>
    <p>Welcome to Fujairah's leading business directory. Whether you're looking for reliable services, local suppliers, or top companies, our directory connects you to Fujairah's business ecosystem.</p>

    <div class="col-lg-3 col-md-6 mt-2 position-relative">
        <input type="text" class="form-control" id="searchInput" placeholder="What are you looking for">
        <button id="voiceSearchBtn" class="btn btn-secondary position-absolute" >
            <i class="fas fa-microphone"></i>
        </button>
        <div id="suggestions" class="suggestions-box"></div>
    </div>

    <div class="col-lg-3 col-md-6 mt-2">
        <input type="text" class="form-control" placeholder="Location">
    </div>

    <div class="col-lg-3 col-md-6 mt-2">
        <select class="form-select select2" aria-label="Select category">
            <option selected disabled>Select category</option>
            @foreach($categories as $cat)
                <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-3 col-md-6 mt-2">
        <button type="submit" class="btn btn-brand-1 w-100">
            Search
        </button>
    </div>
</div>



        </div>
      </section>
      <div class="section categories-sec bg-grey-80 pt-40 pb-40">
        <div class="container">
        <div class="row parent_cat">
            @foreach($parent_cat as $pcat)
      <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
        <div class="card-small">
          <div class="card-image"><a href="{{ route('company',$pcat->parent_url) }}">
              <div class="box-image"><img src="{{asset('storage/'.$pcat->parent_category_thumb)}}" alt="{{$pcat->parent_category_name}}"></div></a></div>
          <div class="card-info"><a href="{{ route('company',$pcat->parent_url) }}">
              <h6 class="color-brand-1 ">{{$pcat->parent_category_name}}</h6></a></div>
        </div>
      </div>

      @endforeach
    
</div>
        </div>
      </div>
      <section class="section mt-20">
        <div class="container">
          <div class="row mt-50 align-items-center card-no-border">
            @foreach($randomCompanies as $comp)
            <div class="col-lg-4 mb-30">
            <div class="card-blog-grid card-blog-grid-2 hover-up">
                <div class="card-image img-reveal listing-img"><a href="{{ route('listing', ['listing' => $comp->listurl]) }}"><img src="{{ strpos($comp->listing_cover_image, 'cover_images') === false ? asset('storage/cover_images/' . $comp->listing_cover_image) : asset('storage/' . $comp->listing_cover_image) }}" alt="iori">
                </a></div>
                <div class="card-info">
                <a href="{{ route('listing', ['listing' => $comp->listurl]) }}">View Listing</a>

        <h6 class="color-brand-1">{{ $comp->listing_name}}</h6>
          </a>
                </div>
              </div>
            </div>
            @endforeach
           
           
          </div>
       
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
          <div class="row mt-50">
            <div class="col-xl-4 col-lg-3">
              <h3 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">See why we are<br class="d-none d-lg-block">trusted the world over</h3>
            </div>
            <div class="col-xl-8 col-lg-9">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-lg-end text-center mb-20">
                  <h2 class="color-brand-1"><span class="counter">50</span><span>K</span></h2>
                  <p class="font-lg color-brand-1">Social followers</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-lg-end text-center mb-20">
                  <h2 class="color-brand-1"><span class="count">300</span><span>+</span></h2>
                  <p class="font-lg color-brand-1">Happy Clients</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-lg-end text-center mb-20">
                  <h2 class="color-brand-1"><span class="count">200</span><span>+</span></h2>
                  <p class="font-lg color-brand-1">Project Done</p>
                </div>
               
              </div>
            </div>
          </div>
        </div>
        <div class="border-bottom mt-70"></div>
      </section>
      <section class="section mt-100">
        <div class="container">
          <div class="row align-items-center mt-50">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-30"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">How it work</span>
              <h2 class="color-brand-1 mt-10 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".2s">Maximize your business online marketing              </h2>
              <p class="color-grey-500 font-sm wow animate__animated animate__fadeIn" data-wow-delay=".4s">Be visible! Obtain new customers and generate more traffic. Improve social media shares. Get reviews and grow business reputation online. Your company profile can include contacts and description, products, photo gallery and your business location on the map.</p>
              <div class="mt-45 wow animate__animated animate__fadeIn" data-wow-delay=".6s"><a class="btn btn-brand-1 hover-up" href="#">Register Company</a>
             </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <img src="assets/imgs/page/homepage3/screens.jpg" alt="iori">
            </div>
           
          </div>
        

        </div>
      </section>
     
    
      <section class="section mt-100">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 text-center">
              <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Choose The Best Plan</h2>
              <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".1s">Pick your plan. Change whenever you want.<br class="d-none d-lg-block">No switching fees between packages</p>
              <ul class="tabs-plan change-price-plan" role="tablist">
                <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s"><a class="active" href="#" data-type="monthly">Monthly</a></li>
                <li class="wow animate__animated animate__fadeIn" data-wow-delay=".1s"><a href="#" data-type="yearly">Yearly</a></li>
              </ul>
            </div>
          </div>
          <div class="row mt-50">
            @foreach($packages as $package)
            <div class="col-xl-3 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
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
          <div class="border-bottom mt-30"></div>
        </div>
      </section>
      <section class="tab-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="companyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">Latest Listings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">Featured Listings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="most-popular-tab" data-bs-toggle="tab" data-bs-target="#most-popular" type="button" role="tab" aria-controls="most-popular" aria-selected="false">Most Popular</button>
                    </li>
                </ul>
                <div class="tab-content" id="companyTabsContent">
                    <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                   
                    @include('front.inc.company-list', ['companies' => $latestCompanies,'badge'=>'New'])
              
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                    @include('front.inc.company-list', ['companies' => $featuredCompanies,'badge'=>'⭐'])

                    </div>
                    <div class="tab-pane fade" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
                    @include('front.inc.company-list', ['companies' => $mostPopularCompanies,'badge'=>'✔️'])

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <section class="section mt-100 box-testimonial-2">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5 text-start pt-50"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Testimonials</span>
              <h2 class="color-brand-1 mb-20 mt-15 wow animate__animated animate__fadeIn" data-wow-delay=".2s">What our clients<br class="d-none d-lg-block">say about us</h2>
              <div class="row">
                <div class="col-lg-10 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                  <p class="font-md color-gray-500 mb-30">Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-7 bg-testimonials position-relative">
              <div class="ml-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                <div class="card-testimonial-list">
                  <div class="d-flex align-items-center">
                    <div class="box-author mb-10">
                      <div class="author-info"><a href="#"><span class="font-md-bold color-brand-1 author-name">Green Valley</span></a><span class="font-xs color-grey-500 department">Restaurant</span></div>
                    </div>
                    <div class="rating text-end"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"></div>
                  </div>
                  <p class="font-md color-grey-500">Our compnay is happy that everyone can access at my location through Fujtown map direction. Thanks Fujtown</p>
                </div>
              </div>
              <div class="ml-100 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                <div class="card-testimonial-list">
                  <div class="d-flex align-items-center">
                    <div class="box-author mb-10">
                      <div class="author-info"><a href="#"><span class="font-md-bold color-brand-1 author-name">Hairlovie Hair Centre</span></a><span class="font-xs color-grey-500 department">Beauty salon in Fujairah</span></div>
                    </div>
                    <div class="rating text-end"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star-gray.svg" alt="iori"></div>
                  </div>
                  <p class="font-md color-grey-500">I found Fujtown very useful result oriented site among several other site. we need to grow with u side by side.</p>
                </div>
              </div>
              <div class="wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                <div class="card-testimonial-list">
                  <div class="d-flex align-items-center">
                    <div class="box-author mb-10">
                      <div class="author-info"><a href="#"><span class="font-md-bold color-brand-1 author-name">FFAA</span></a><span class="font-xs color-grey-500 department">School Of Arts</span></div>
                    </div>
                    <div class="rating text-end"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star.svg" alt="iori"><img src="assets/imgs/template/icons/star-gray.svg" alt="iori"></div>
                  </div>
                  <p class="font-md color-grey-500">Great exposure and easy set up make Fujtown a must for all new businesses. Thanks Fujtown</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-8 col-md-8">
              <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">From our blog</h2>
              <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">Latest Blogs</p>
            </div>
            <div class="col-lg-4 col-md-4 text-md-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
              <a class="btn btn-default font-sm-bold pl-0" href="{{route('blog')}}">View All
                <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg></a></div>
          </div>
          <div class="row mt-55">
            @foreach($blogs as $blog)
            <div class="col-xl-3 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
              <div class="card-blog-grid card-blog-grid-2 hover-up">
                <div class="card-image img-reveal"><a href="{{route('blog-details',$blog->url)}}"><img src="{{asset('storage/'.$blog->image)}}" alt="iori"></a></div>
                <div class="card-info"><a href="{{route('blog-details',$blog->url)}}">
                    <h6 class="color-brand-1">{{$blog->title}}</h6></a>
                    

                  <div class="mt-30 d-flex align-items-center border-top pt-30 ">
                    <a class="btn btn-border-brand-1 mr-15" href="blog.html">{{$blog->category->blog_cat_name}}</a><span class="date-post font-xs color-grey-300 mr-15">
                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                      
                      </svg>{{ $blog->formatted_date }}</span></div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
          <div class="box-newsletter box-newsletter-2 wow animate__animated animate__fadeIn">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-7 m-auto text-center"><span class="font-lg color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Newsletter</span>
                <h2 class="color-brand-1 mb-15 mt-5 wow animate__animated animate__fadeIn" data-wow-delay=".1s">Subcribe our newsletter</h2>
                <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">Do not miss the latest information from us about the trending in the market. By clicking the button, you are agreeing with our Term & Conditions</p>
                <div class="form-newsletter mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                  <form action="#">
                    <input type="text" placeholder="Enter you mail ..">
                    <button class="btn btn-submit-newsletter" type="submit">
                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                      </svg>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  
  @endsection

  @section('script')
 <script>
   $(document).ready(function(){
    $('.select2').select2();

  })

  document.getElementById('searchInput').addEventListener('keyup', function() {
    let query = this.value.trim();

    if (query.length > 1) { // Start searching after typing at least 2 characters
        fetchSuggestions(query);
    } else {
        document.getElementById('suggestions').innerHTML = ''; // Clear suggestions if query is too short
    }
});

function fetchSuggestions(query) {
    fetch(`/get-listing-suggestions?q=${query}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        displaySuggestions(data);
    })
    .catch(error => console.error('Error:', error));
}

function displaySuggestions(suggestions) {
    const suggestionsBox = document.getElementById('suggestions');
    suggestionsBox.innerHTML = ''; // Clear previous suggestions
    
    suggestions.forEach(item => {
        const suggestionItem = document.createElement('div');
        suggestionItem.classList.add('suggestion-item');
        suggestionItem.innerHTML = `<a href="/listing/${item.listurl}">${item.listing_name}</a>`;
        suggestionsBox.appendChild(suggestionItem);
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const voiceSearchBtn = document.getElementById('voiceSearchBtn');

    // Check if browser supports SpeechRecognition API
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (SpeechRecognition) {
        const recognition = new SpeechRecognition();
        recognition.lang = 'en-US'; // Set language for recognition
        recognition.interimResults = false; // Get only final results
        recognition.maxAlternatives = 1;

        // Start recognition when microphone button is clicked
        voiceSearchBtn.addEventListener('click', () => {
            recognition.start();
        });

        // Handle recognition results
        recognition.addEventListener('result', (event) => {
            const transcript = event.results[0][0].transcript;
            searchInput.value = transcript; // Set the recognized text in the input field
            fetchSuggestions(transcript);
        });

        // Handle errors
        recognition.addEventListener('error', (event) => {
            console.error('Speech recognition error:', event.error);
            alert('Error recognizing speech. Please try again.');
        });
    } else {
        // If browser doesn't support SpeechRecognition API
        alert('Voice search is not supported in your browser.');
        voiceSearchBtn.disabled = true; // Disable the button
    }
});

 </script>
  @endsection