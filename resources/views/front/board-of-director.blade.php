@extends('layout.app')
    @section('title', 'Home Page')

    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn page-title" data-wow-delay=".2s">
                Board Of Directors
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
         
        <div class="row software-intro mt-50">
        <div class="col-6">
            <img src="{{asset('assets/imgs/page/homepage3/sindiya.jpeg')}}" alt="">
            </div>
            <div class="col-6">
                <h3>SENDEYAH IBRAHIM YAAQIB</h3>
                <h3>CEO</h3>
               <br>
               <p>This is to confirm my affiliation with the website</p><br>
               <ul class="bod">
                <li>Serial Entrepreneur.</li>
                <li>Multiple award winner in business.</li>
                <li>Doctorate in Business.</li>
                <li>Member of the Emirates Youth Council.</li>
                <li>Senior Project Manager, Emiratization Relations.</li>
                <li>Crisis Communications, Abu Dhabi Government Entity.</li>
                <li>Head of Entrepreneur Support, Abu Dhabi Government Entity.</li>
                </ul>
                <br>
               <p>Director General: Launched www.fujtown.com - the first and only business directory website & tourism agency focusing on Fujairah and the East Coast region, This initiative is supported by the Crown Prince of Fujairah, H.H Shaikh Mohammed Bin Hamad Al Sharqi.</p> 
               <br>
               <p>Fujtown has since evolved into many different clusters of trading services</p>
            </div>
           
        </div>
      </section>

    </main>

  @endsection
