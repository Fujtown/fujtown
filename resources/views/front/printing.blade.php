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
                Printing Services
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
          <div class="col-6 details">
			<h5>Passion to Print</h5>   <br> 
            <p>It’s no secret that we LOVE to print: everything from books, catalogues, flyers, business cards and presentations to bags and greetings cards… you name it, we print it! </p>
            <br>
            <p>We also specialize in intricate processes like die-cutting, UV coating and spot UV coating to really set your final printed piece apart. From business cards and invitations to presentations, business plans, brochures and banners, we do them all!</p><br>
            <p>Pop-up displays, vinyl stickers, roll-up banners and flyers are just some of the marketing tools we create. </p><br>
            <p>Call us now to see how we can help you drive traffic and help you hit sales targets. 09-22-44-200 or drop us an email at <a href="mail:hello@fujtown.com">hello@fujtown.com</a></p><br>
            <p>You can also check our what else we can do <a target="_blank" href="https://www.fujprint.com">here</a>.</p>
            </div>
            <div class="col-6">
                <img src="{{asset('assets/imgs/page/homepage3/fujprint.jpg')}}" alt="">
                </div>

          </div>
        </div>
      </section>

    </main>

  @endsection
