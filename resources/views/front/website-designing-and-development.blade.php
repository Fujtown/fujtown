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
                Web Design & Development
                </h1>
               <p class="font-md color-grey-400 mb-30">
               Software and solutions built in Fujairah for global companies with a local team for consulting, development and maintenance since 2015.
               </p>
              
              
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
          <div class="row software">
            <h2>What we do</h2>
          <div class="col-5 card">
			<h5>Custom Software Development</h5>   <br> 
            <p>Bespoke software development for business automation, workflows, e-commerce, human resource, and financial reporting built on Microsoft technologies for web, mobile, desktop and kiosk. </p>
          </div>
          <div class="col-2"></div>
          <div class="col-5 card">
			<h5>E-Commerce Development</h5>   <br> 
            <p>Online shopping portals on open-source platforms by Magento, WooCommerce, OpenCart, complemented with our consulting services for sustainable success across B2C and B2B solutions.</p>
          </div>
        </div>
        <div class="row software-intro mt-50">
            <div class="col-6">
                <h3>Website Design & Development</h3>
                <p>Professional quality website design is absolutely integral to the legitimacy and effectiveness of your online presence. Our website designers boast technical know–how as well as marketing expertise—they have completed over 350 projects, giving them plenty of experience in designing attractive, customized websites while keeping your business interests in mind, with a cost-effective plan that suits you.</p>
                <br>
                <p>We offer conversion oriented business themes, as well as fully integrated e–commerce solutions varying in complexity for those looking to use their online presence to promote and sell their service or product to interested customers.</p>
                <br>
                <p>Fujtown.com is focused on quality, not quantity; we aim to provide a responsive and personal approach to each project to ensure that our clients can benefit from their investment. Finally, we see each web development project as an opportunity to grow your business—we aim to help you increase sales and improve retention, while offering leading, aesthetically pleasing and functional designs that suit your needs perfectly.</p><br>
                <p>At Fujtown, we've made that transition from vision to reality something of an art form, having worked with large government entities to small businesses and start-ups – and we've been successfully achieving great results for our clients since 2014.</p>
                <br>
                <h3>Website tailored to your business requirements.</h3>
                <br>
                <p>The most important question to ask yourself when building a website is 'What do I want to get out of my website?'  Based on what you are looking for, with your website you can:</p>
                <ul class="">
                    <li>build awareness</li>
                    <li>create a shop front for your business</li>
                    <li>showcase your work</li>
                    <li>build your credibility as a business</li>
                    <li>generate traffic</li>
                    <li>generate new leads and sales</li>
                    <li>sell your products online</li>
                </ul>
                <br>
                <p>For more information, you can visit <a href="www.fujtek.com" target="_blank">www.fujtek.com</a> to know more about our web services. </p>
                <br>
                <p>You can also simply call us for a quote on 09-22-44-200, 050-370-2600</p>
                <br>
                <p>Fujtech is the confluence of the science and art of software development. It is an innovative, trusted and competent software company serving the higher purpose of harnessing the power of the net for business entities. Since 2015, we have been serving clients for bespoke and packaged software solutions in multiple domains across different software platforms.</p>
            </div>
            <div class="col-6">
            <img src="{{asset('assets/imgs/page/homepage3/web.jpg')}}" alt="">
            </div>
        </div>
      </section>

    </main>

  @endsection
