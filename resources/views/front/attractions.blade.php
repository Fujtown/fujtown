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
                    Attractions
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
          <div class="col-12">
          <div class="coverimg">
                <img src="{{asset('assets/imgs/page/homepage3/fujairah_map.jpg')}}" alt="">
                </div>
               <div class="row custom-row">
                <div class="col-md-1"></div>
               <div class="col-md-5">
        <p class="breathe"><span >Come here to breathe!</span></p>
                    <p></p><blockquote>
<p>Fujairah is the seventh emirate of the United Arab Emirates. It is separated from its sister emirates by its geographically unique position.</p>

<p>Nestled in the far east, Fujairah lies divided from the rest of the country by a vast string of Hajr mountains. It is the only emirate that lies along the Gulf of Oman whereas the other emirates lie along the Arabian Gulf.</p>
</blockquote><p></p>
                </div>  

                <div class="col-md-5">
                <div class="video-container"><iframe  height="250" src="https://www.youtube.com/embed/6-yTU1tPKnI" frameborder="0" allowfullscreen=""></iframe></div>
                </div>
               </div>
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-10">
            <div class="custom-div">
            <h3>Attractions and Offers</h3>
                
                <p>Fringed with lush beaches and abundant forts, villages and areas, telling tales of the historical past. Instead of sandy deserts and artificial vegetation, you will find here the magnificent mountain peaks, deep gorges, picturesque valleys and waterfalls. The luxurious and all inclusive hotels provide family-friendly activities and state of the art spa experiences.&nbsp;</p>
               
            </div>
            <div class="row custom-row2">
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/8.jpg')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/9.jpg')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/10.jpg')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/11.jpg')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/12.jpg')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/13.jpg')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3">
                <img src="{{asset('assets/imgs/page/homepage3/14.jpg')}}" class="img-responsive" alt="">
                </div>
            </div>

            <div class="row">
            <div class="col-md-12">
            <img alt="" src="{{asset('assets/imgs/page/homepage3/fujairah_experiences.png')}}" style="width:100%">
            </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/luxury.jpg')}}" width="100%" alt="">
                <div class="description-div">
                <p><b>Millennium Hotel:</b>  Indulge in some well-earned pampering with Bounteous space and modern amenities, such as LED TVs and high-speed Wi-Fi. They are designed with your utmost comfort in mind.</p>
                 <p><b>Clifton Hotel :</b>  Get your sportswear geared up as you set off for hiking with exclusive amenities always at your side.</p>   
                <p><b>Al Diar Siji Hotel : </b> Sandwiched between the Hajjar Mountains and the Indian Ocean, get yourself a mesmerizing panoramic Arabian view through Al Diar Siji’s luxurious rooms and suites.</p>
                </div>
                </div>
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/adventure.jpg')}}" width="100%" alt="">
                <div class="description-div">
                <p><b>Water sports:</b> Get your adrenaline glands pumped up with Fujairah’s range of water sport activities such as paragliding, scuba, snorkeling, yachting, and parasailing on the beaches of the east coast region.</p>
                 <p><b>Bull Fights  :</b> Catch a traditional bloodless bull fight on the sands of the corniche area every Friday.</p>   
                <p><b>The Wadis  : </b> A visit to Fujairah, implies a must visit  to the wadis.  Wadi is Arabic for a dry riverbed or a valley oasis that looks like a water pool [often with waterfalls filling the same].</p>
                <p><b>Fishing   : </b> The picturesque fishing villages that lie in Dibba, Bithnah and the many islands near Gulf of Oman are great key attractions.</p>
                </div>
                </div>
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/family.jpg')}}" width="100%" alt="">
                <div class="description-div">
                <p><b>History and Culture tour:</b> Discover about Fujairah’s rich historic past and the oldest mosques of UAE in this awe-inspiring tour.</p>
                 <p><b>Family brunch outings :</b>Get a boost on your family platter, as you munch away the brunch at the Millennium hotel.</p>   
                <p><b>Dibba Farmhouses : </b> Your kids will grab everything that they have missed so far in the bustling city life with these pretty landscapes and quiet neighborhoods.</p>
                <p><b>Fujairah Museums : </b> Artefacts recovered from local archaeological discoveries and exhibit the traditional way of life of the emirate region dating back to 2500 BC. </p>
                </div>
                </div>
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/couple.jpg')}}" width="100%" alt="">
                <div class="description-div">
                <p><b>Rotana Resort & Spa:</b> Get the best pampered treatment for you and your partner at this beachside luxury resort.</p>
                 <p><b>Fairmont Fujairah Beach Resort :</b>Perfect your stroke in a peaceful, palm-lined environment.</p>   
                <p><b>Le Méridien Al Aqah Beach Resort : </b>Rejuvenate mind, body and soul with one of the best all-inclusive beach resort in the region.</p>
                <p><b>Concorde Hotel  : </b> Relax and let loose that stress with the superbly furnished rooms and suites with views of the sea or mountains looking towards Fujairah International Airport.  </p>
                </div>
                </div>
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/event.jpg')}}" width="100%" alt="">
                <div class="description-div">
                <p>Held in February, the Fujairah International Arts Festival attracts the hottest Emirati and overseas talent across film, photography, painting and more.</p>
                </div>
                </div>
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/weather.jpg')}}" width="100%" alt="">
                <div class="description-div">
                <p>Loaded with sun-kissed beaches and high end mountains, the weather at Fujairah is considerably warm and pleasant throughout the year. October to March are filled with seasonal showers and the temperature during this season is likely to hover around 25 degrees.</p>
                </div>
                </div>
                <div class="col-md-12">
                <img src="{{asset('assets/imgs/page/homepage3/fast-fact.jpg')}}" width="100%" alt="">
                <div class="description-div">
                 <h6>How are men and women expected to dress?</h6>   
                <p>You should aim to dress modestly out of respect for the local culture by keeping knees and shoulders covered while in public places.</p>
                 <h6>Are you allowed to drink alcohol?</h6>   
                <p>Alcohol is served in most hotels, golf clubs, nightclubs and some bars and restaurants. Have fun, but be mindful that you're visiting a Muslim country. </p>
                 <h6>On what days does the weekend fall? </h6>   
                <p>Friday and Saturday</p>

                 <h6>Are there any religious events and festivals to be aware of?</h6>   
                <p>During Ramadan, Muslims fast during the day, so many cafés and restaurants may be closed until later in the evenings. Other businesses and transport may also work to shorter operating hours. Check before you book as the dates of Ramadan change each year. </p>

                <div><i>Eid is marked with public holidays twice a year: at the end of Ramadan and between October and November. It's a time of celebration and feasting, and can be a great time to visit. Transport and businesses may work to different schedules.&nbsp;</i></div>

                <h6>What is the average cost of basic things, such as a meal or a taxi ride? </h6>   
                <p>A three-course meal for two in a mid-range restaurant costs around £29, and minimum starting cost for taxis is £0.85.</p>
  
                <h6>How far is the airport from the main tourist area?  </h6>   
                <p>Fujairah Airport is 6.4 kilometers away. Dubai (DBX) airport is a 45 minute journey to Fujairah.</p>
  
                <h6>What's the best way to get around Fujairah? </h6>   
                <p>By taxi – they're easily available and very affordable</p>
  
                <h6>What currency is used in Fujairah? </h6>   
                <p>United Arab Emirates Dirham (AED)</p>
  
                <h6>What is the time difference?  </h6>   
                <p>Fujairah is four hours ahead of GMT/UK time. </p>

                <h6>How long does it take to fly to Fujairah?</h6>   
                <p>Just about 8 hours and 21 minutes.</p>
  
                <h6>Any other useful things to know? </h6>   
                <p>While Fujairah welcomes many tourists from other countries, you should be aware that its laws and customs are different to those in the UK. </p>
  
                </div>
                </div>
            </div>
            </div>

            </div>
            </div>
           

          </div>
        </div>
      </section>

    </main>

  @endsection
