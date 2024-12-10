@extends('layout.app')
    @section('title', 'Home Page')

    @section('content')
   
    <main class="main">
      <section class="section pt-90 banner-about">
        <div class="container text-center">
          <h6 class="color-grey-400 mb-15">Who we are</h6>
          <h2 class="color-brand-1 mb-15">Discover Fujtown: Your Gateway to<br class="d-none d-lg-block">UAE Fujairah Culture and Adventure</h2>
          <p class="font-md color-grey-400 mb-30">Fujtown is your ultimate guide to exploring the rich tapestry of UAE Fujairah experiences,<br class="d-none d-lg-block">from traditional customs to modern attractions, all in one vibrant community.</p>
          <p class="font-md color-grey-400 mb-30">Fujtown is the first and only platform for Fujairah city where companies no matter how big or small can create a profile viewing to get more customers and gain credibility in their respective markets. From packages starting as low as 15 AED per month, it is the best place to connect both business owners and customers. To view Fujtown’s packages, <a class="link" href="{{route('submit-listing')}}">click here</a>. <br class="d-none d-lg-block"><br>

Fujtown also has a tourist attraction page where tourists or anyone interested can book hotels, restaurants, or even exclusive tours around the city of Fujairah. Let Fujtown take you to places you never imagined to go to. Let us be the ones to plan your trip for maximum fun! Discover Fujairah through the eyes of its people.
<br class="d-none d-lg-block"><br>
On the side, Fujtown also does outstanding media productions ranging from animations, logo & corporate identity design, website & app design and development, and other related services.</p>
          
             <div class="box-radius-border mt-50">
            <div class="box-list-numbers">
              <div class="item-list-number">
                <div class="box-image-bg"><img src="assets/imgs/page/homepage3/dispersal.png" alt="iori"></div>
                <h2 class="color-brand-1"><span class="count">50</span><span>K+</span></h2>
                <p class="color-brand-1 font-lg">Social followers</p>
              </div>
              <div class="item-list-number">
                <div class="box-image-bg"><img src="assets/imgs/page/homepage3/certification.png" alt="iori"></div>
                <h2 class="color-brand-1"><span class="count">200</span><span>+</span></h2>
                <p class="color-brand-1 font-lg">Happy Clients</p>
              </div>
              <div class="item-list-number">
                <div class="box-image-bg"><img src="assets/imgs/page/homepage1/cross2.png" alt="iori"></div>
                <h2 class="color-brand-1"><span class="count">200</span><span>+</span></h2>
                <p class="color-brand-1 font-lg">Project Done</p>
              </div>
              
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-90 pb-50 bg-core-value">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="item-core mb-30">
                <div class="item-image"><img src="assets/imgs/page/homepage3/sindiya.webp" alt="iori"></div>
                <div class="item-desc">
                <p class="font-md color-grey-400 mb-15">"Discover the heart of Fujairah with Fujtown. Whether you're exploring our rich heritage, enjoying our pristine beaches, or engaging in our vibrant business community, we provide comprehensive information and services to enhance your experience in our beautiful emirate."</p>

                  <h6 class="color-brand-1">Sindiya Ibrahim Saad</h6><span class="color-grey-500 font-xs">CEO</span>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-6">
              <div class="item-core mb-30">
                <div class="item-image"><img src="assets/imgs/page/homepage3/hijab.png" alt="iori"></div>
                <div class="item-desc">
                  <p class="font-md color-grey-400 mb-15">“We created a revolutionary online knowledge and competencies assessment solution. It empowers thousands of organizations worldwide to grow by allowing them to get a broader picture and draw better conclusions”</p>
                  <h6 class="color-brand-1">Emaan</h6><span class="color-grey-500 font-xs">Co CEO</span>
                </div>
              </div>
            </div> -->
          </div>
          <div class="row box-list-core-value">
            <div class="col-lg-4 mb-70">
              <div class="box-core-value">
                <div class="shape-left shape-1"></div>
                <h3 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Core values</h3>
                <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">We break down barriers so teams can focus on what matters – working together to create products their customers love.</p>
              </div>
            </div>
            <div class="col-lg-4">
            <ul class="list-core-value">
                <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s"><span class="ticked"></span>
                  <h5 class="color-brand-1 mb-5">Community First</h5>
                  <div class="box-border-dashed">
                    <p class="font-md color-grey-500 mb-20">Our town thrives on community spirit. We make every decision and measure every outcome based on how well it serves our residents and visitors, ensuring Fujtown remains a welcoming place for all.</p>
                  </div>
                </li>
                <li class="wow animate__animated animate__fadeIn" data-wow-delay=".2s"><span class="ticked"></span>
                  <h5 class="color-brand-1 mb-5">Preserve and Progress</h5>
                  <div class="box-border-dashed">
                    <p class="font-md color-grey-500 mb-20">We're committed to preserving our rich heritage while embracing progress. We collaborate openly to find innovative solutions that respect our past and build a sustainable future for Fujtown.</p>
                  </div>
                </li>
                <li class="wow animate__animated animate__fadeIn" data-wow-delay=".4s"><span class="ticked"></span>
                  <h5 class="color-brand-1 mb-5">Enrich Local Experiences</h5>
                  <div class="box-border-dashed">
                    <p class="font-md color-grey-500 mb-20">We strive to create meaningful experiences for both residents and visitors. From our vibrant culture to our natural beauty, we aim to showcase the best of Fujtown and make every day special for everyone in our community.</p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-lg-4">
            <ul class="list-core-value">
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s"><span class="ticked"></span>
                        <h5 class="color-brand-1 mb-5">Embrace Innovation</h5>
                        <div class="box-border-dashed">
                        <p class="font-md color-grey-500 mb-20">At FujTown, we constantly push the boundaries of what's possible. We embrace cutting-edge technologies and creative solutions to enhance the urban experience and meet the evolving needs of our residents and visitors.</p>
                        </div>
                    </li>
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".2s"><span class="ticked"></span>
                        <h5 class="color-brand-1 mb-5">Promote Sustainability</h5>
                        <div class="box-border-dashed">
                        <p class="font-md color-grey-500 mb-20">We are committed to building a sustainable future. Our initiatives focus on environmental conservation, green energy, and eco-friendly practices, ensuring FujTown remains a model for sustainable urban development.</p>
                        </div>
                    </li>
                    <li class="wow animate__animated animate__fadeIn" data-wow-delay=".4s"><span class="ticked"></span>
                        <h5 class="color-brand-1 mb-5">Foster Community</h5>
                        <div class="box-border-dashed">
                        <p class="font-md color-grey-500 mb-20">We believe in the power of community. FujTown is dedicated to creating inclusive spaces and events that bring people together, celebrating diversity and promoting a strong sense of belonging among all residents.</p>
                        </div>
                    </li>
                    </ul>

            </div>
          </div>
        </div>
      </section>
      
     
      
      
    
    </main>

  @endsection
