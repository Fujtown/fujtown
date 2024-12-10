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
                Tourism Services
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
			<h5>About Fujtown Tours</h5>   <br> 
            <p>We are a tourism consultancy company based in Fujairah, United Arab Emirates. We schedule and organize inbound tours to the East Coast region and all of our tours are centered on authentic and unique experiences. We organize different tour packages at the moment: Historical and Cultural Tour; Adventure Tour and Tours for the water-sport enthusiasts. We also offer corporate/incentive tours and educational field trips for local organizations. </p>
            <br>
            <p>If you’re not ready to leave the East Coast after a full day of fun and adventure, we provide overnight packages - accommodation provided can range from city hotels, resorts to private farms (camping sites). </p><br>
            <p>Aside from the planned itineraries, we are open to receiving requests from clients about specific routes they have in mind!  </p><br>
            <p>Some attractive places in Fujairah you must visit.</p><br>
        <ol>
            <li><p>Al-Hayl Castle: A historic fort that dates back to the 16th century and has been restored and turned into a museum.</p></li>
        <li><p>Fujairah Museum: A museum showcasing the history and culture of the region with exhibits of traditional clothing, weapons, and jewelry.</p></li>
        <li><p>Hajar Mountains: A mountain range that offers opportunities for hiking and mountain biking.</p></li>
        <li><p>Fujairah Beaches: There are several beaches in Fujairah, including Sandy Beach and Al Aqah Beach, that offer opportunities for swimming, sunbathing, and water sports.</p></li>
        <li><p>Fujairah Fort: A historic fort that was built in 1670 and offers visitors a glimpse into the region's history.</p></li><li><p>Fujairah Heritage Village: A reconstructed traditional Emirati village that showcases the local culture and heritage.</p></li><li><p>Fujairah Marine Park: A park that is home to a variety of marine life, including turtles, dolphins, and sharks, and offers visitors the opportunity to see them up close on boat tours.</p></li>
        <li><p>Awhlah Fort: A historic fort that was built in the 18th century and offers visitors a glimpse into the region's past.</p>
    </li>
    <li><p>Sheikh Zayed Mosque: A beautiful mosque that is one of the largest in the region and is open to visitors of all faiths.</p></li>
    <li><p>Fujairah Mall: A shopping mall with a variety of stores and restaurants that is popular among locals and tourists alike.</p></li>
    </ol>
    <p>For our international guests, we arrange transportation from the other Emirates (such as Dubai or Abu Dhabi, etc.) and we also have the service of Airport Meet and Greet.</p><br>
    <p>We at Fujtown look forward to welcoming you and your guests to the East Coast region!</p>
    <br>
    <p><a href=" https://www.explorefujairah.com"> https://www.explorefujairah.com</a></p>
    <br>
    <p><b>Our Tourism Services:</b></p>
    <p>-All-inclusive inbound tours to the East Coast region.</p>
    <p>-100% authentic local experiences.</p>
    <p>-Adventure activities – watersports, hiking, camping.</p>
    <p>-History and Culture tours – visit our monuments and exclusive destinations and learn more about the Emirati culture.</p><br>
    <p><b>Additional Services:</b></p>
    <p>-Celebratory event arrangements.</p>
    <p>-Airport Meet and Greet.</p>
    <p>-Accommodation services.</p>
    <p>-Transportation services.</p>
    <br>
    <p><b>Contact us for more information</b></p>
    <p>E-mail: <a href="mail:tourism@fujtown.com">tourism@fujtown.com</a></p>
    <p>Tel. No.: 00971 9 22 44 200</p>
    <p>Mob. No.: 00971 50 201 2877</p><br>
    <address>
            P.O. Box 9060, FEWA Building,<br>
        8th Floor, Office 808,<br>
        Fujairah,<br>
        UAE
    </address>
            </div>
            <div class="col-6">
                <img src="{{asset('assets/imgs/page/homepage3/fujprint.jpg')}}" alt="">
                </div>

          </div>
        </div>
      </section>

    </main>

  @endsection
