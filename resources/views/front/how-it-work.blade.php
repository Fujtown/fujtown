@extends('layout.app')
    @section('title', 'Home Page')

    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endsection

    @section('content')
   
    <main class="main">
    <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn page-title" data-wow-delay=".2s">
                How it works
                </h1>
              </div>
            
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
        <div class="row mt-50">
        
        <div class="col-md-12 how-section">
        <h4><span class="fa fa-user"></span> 1. Create an Account</h4>
            <div class="mock-img">
            <img src="{{asset('assets/imgs/page/homepage3/mockup2.png')}}" class="img-responsive">
            <p class="mt-20">Creating an account with Fujtown is easy, register with your email or login via social media. <br> Having an account allows you to create a listing for your business, rate, book tours, and favourite listings in no time!</p>
            <div class="btn-reg">
            <a href="{{route('register')}}" class="btn btn-brand-1 hover-up">Register Today!</a>
            </div>
            </div>
            <h4 class="mt-30"><span class="fa fa-edit"></span> 2. Submit Listing</h4>
            <div class="mock-img">
            <img src="{{asset('assets/imgs/page/homepage3/listing.png')}}" class="img-responsive">
            <p class="mt-20">Submitting a listing using fujtown is super simple, we've made entering your company's details easy to fill, you will be finished in just under 4 minutes! <br><br> Make sure that you pin your company on the map (use the red cross-hair as guide).

              <br><br>  You can enter all the details you would like for your company, and can even include pictures.
            <br><br>
                Make sure you enter your company name as per registered – this allows visitors to look for you better.</p>
            <div class="btn-reg">
            <a href="{{route('register')}}" class="btn btn-brand-1 hover-up">Submit Listing</a>
            </div>
            </div>
            <h4 class="mt-30"><span class="fa fa-tasks"></span> 3. Get More Interest In Your Place</h4>
            <div class="mock-img">
           
            <p class="mt-20">Fujtown is the only business directory focusing on Fujairah and the East Coast, therefore your company on fujtown.com is expected to gain you customers, be well known on a local level, <br> and be on top of the game. With Fujtown you have more than you could ever want or need.
        <br>
        Supported by His Highness The Crown Prince Shaikh Mohammed Bin Hamad Al Sharqi, fujtown serves to be the connecting hub between companies residing in Fujairah <br> & the East Coast region straight to the customers or who ever is interested in this region.
        </p>
        <h6>Get listed today, be a star with #fujtown.</h6>
            </div>
        </div>
        </div>
        </div>
        </section> 
    </main>

  @endsection
