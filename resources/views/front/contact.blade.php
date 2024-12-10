@extends('layout.app')
    @section('title', 'Home Page')
    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/slidercaptcha.min.css') }}">
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
          @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
       
            <div class="row align-items-center">
              <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span>
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">We’d love to hear<br class="d-none d-lg-block">from you.</h1>

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
            <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
              <div class="card-small card-small-2">
                <div class="card-image">
                  <div class="box-image"><img src="assets/imgs/page/contact/headphone.png" alt="iori"></div>
                </div>
                <div class="card-info">
                  <h6 class="color-brand-1 mb-10">Help &amp; support</h6>
                  <p class="font-xs color-grey-500">Email<a class="color-success" href="mailto:support@alithemes.com">support@alithemes.com</a><br>For help with a current product or service or refer to FAQs and developer tools</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
              <div class="card-small card-small-2">
                <div class="card-image">
                  <div class="box-image"><img src="assets/imgs/page/contact/phone.png" alt="iori"></div>
                </div>
                <div class="card-info">
                  <h6 class="color-brand-1 mb-10">Call Us</h6>
                  <p class="font-xs color-grey-500">Call us to speak to a member of our team.<br>(+01) 234 567 89<br>(+01) 456 789 21</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
              <div class="card-small card-small-2">
                <div class="card-image">
                  <div class="box-image"><img src="assets/imgs/page/contact/chart.png" alt="iori"></div>
                </div>
                <div class="card-info">
                  <h6 class="color-brand-1 mb-10">Bussiness Department</h6>
                  <p class="font-xs color-grey-500">Contact the sales department about cooperation projects<br>(+01) 789 456 23</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
              <div class="card-small card-small-2">
                <div class="card-image">
                  <div class="box-image"><img src="assets/imgs/page/contact/earth.png" alt="iori"></div>
                </div>
                <div class="card-info">
                  <h6 class="color-brand-1 mb-10">Global branch</h6>
                  <p class="font-xs color-grey-500">Contact us to open our branches globally.<br>(+01) 234 567 89<br>(+01) 456 789 23</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-70">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <h2 class="color-brand-1 mb-15">Get in touch</h2>
              <!-- <p class="font-sm color-grey-500">Do you want to know more or contact our sales department?</p> -->
              <div class="mt-20">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.4159016297363!2d56.322844625379325!3d25.12162627775972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef4f893d64b21d3%3A0xc860ab9f9930206d!2sFujtown!5e0!3m2!1sen!2sae!4v1729155701672!5m2!1sen!2sae" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div class="col-lg-7">
              <form action="{{route('send-feedback')}}" method="POST">
                @csrf
              <div class="box-form-contact wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-user" name="name" type="text" placeholder="Your name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-email" name="email" type="text" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-phone" name="phone" type="text" placeholder="Phone">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-company" name="company" type="text" placeholder="Company">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group mb-25">
                      <input class="form-control" name="subject" type="text" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group mb-25">
                      <textarea class="form-control textarea-control" name="message" placeholder="Write something"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                  <div id="captcha"></div>

                  </div>
                  <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-9">
                    <div class="form-group">
                      <button class="btn btn-brand-1-full font-sm"  id="contact-btn" disabled type="submit">Send message
                        <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <div class="no-bg-faqs">
        <section class="section pt-80 mb-30 bg-faqs" id="faq">
          <div class="container">
            <div class="row align-items-end">
              <div class="col-lg-8 col-md-8">
                <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">Frequently asked questions</h2>
                <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">Feeling inquisitive? Have a read through some of our FAQs or<br class="d-none d-lg-block"> contact our supporters for help</p>
              </div>
              <div class="col-lg-4 col-md-4 text-md-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".4s"><a class="btn btn-default font-sm-bold pl-0">Contact Us
                  <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                  </svg></a></div>
            </div>
            <div class="row mt-50 mb-100">
    <div class="col-xl-3 col-lg-4">
        <ul class="list-faqs nav nav-tabs" role="tablist">
            @foreach($categories as $index => $category)
                <li class="wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $index }}s">
                    <a class="{{ $index == 0 ? 'active' : '' }}" href="#tab-{{ $category->id }}" data-bs-toggle="tab" role="tab" aria-controls="tab-{{ $category->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                        <span>{{ $category->name }}</span>
                        <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content tab-content-slider">
            @foreach($categories as $index => $category)
                <div class="tab-pane fade {{ $index == 0 ? 'active show' : '' }}" id="tab-{{ $category->id }}" role="tabpanel" aria-labelledby="tab-{{ $category->id }}">
                    <div class="accordion" id="accordionFAQ{{ $category->id }}">
                        @foreach($category->faqs as $faq)
                            <div class="accordion-item wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                                <h5 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button text-heading-5 {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->title }}
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" id="collapse{{ $faq->id }}" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionFAQ{{ $category->id }}">
                                    <div class="accordion-body">
                                        {!! $faq->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

          </div>
          <div class="border-bottom"></div>
        </section>
      </div>
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
<script src="{{asset('assets/js/longbow.slidercaptcha.min.js')}}"></script>

<script>
  setTimeout(function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(function() {
                alert.remove();
            }, 500);
        }
    }, 3000); // Adjust time (in milliseconds) as needed

    sliderCaptcha({
        id: 'captcha',
        loadingText: 'Loading...',
        failedText: 'Try again',
        barText: 'Slide right to fill',
        onSuccess: function () {
              // Select the button
    const button = document.getElementById('contact-btn');

      // Remove the 'disabled' attribute
      button.removeAttribute('disabled');
          },
    });
</script>  
@endsection