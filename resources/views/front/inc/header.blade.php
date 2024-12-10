<div class="recite-header" id="reciteHeader">
<div class="container-fluid">
<div class="row recite-row">
    <div class="col-md-11">
     <div class="row">
     <div class="col-md-1">
        <button class="btn-minus"><i class="fas fa-minus"></i></button>
      </div>
     <div class="col-md-1">
        <button class="btn-plus"><i class="fas fa-plus"></i></button>
      </div>
     <div class="col-md-1">
     <button class="btn-cursor" id="openModal"><i class="fas fa-mouse-pointer"></i></button>

      </div>
      <div class="col-md-1">
        <button class="btn-color"><i class="fas fa-palette"></i></button>
      </div>
      <div class="col-md-1">
        <button class="btn-language"><i class="fas fa-language"></i></button>
      </div>
      <div class="col-md-1">
        <button class="btn-reset"><i class="fas fa-refresh "></i></button>
      </div>
     </div>
    </div>
    <div class="col-md-1">
      <div class="close-btn">
      <button onclick="confirmCloseAccessibility()" title="Close Accessibility Tools">
        <i class="fas fa-close"></i>
    </button>
      </div>
    </div>
  </div>
</div>  

<!-- Cursor Options Modal -->
<div id="cursorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Cursor Options</h2>
        
        <div class="cursor-size">
            <h3>Cursor Size</h3>
            <label><input type="radio" name="cursorSize" value="small"> Small</label>
            <label><input type="radio" name="cursorSize" value="medium"> Medium</label>
            <label><input type="radio" name="cursorSize" value="large"> Large</label>
            <label><input type="radio" name="cursorSize" value="xlarge"> X-Large</label>
        </div>
        
        <div class="cursor-color">
            <h3>Cursor Colour</h3>
            <label><input type="radio" checked name="cursorColor" value="white"> White</label>
            <label><input type="radio" name="cursorColor" value="black"> Black</label>
        </div>
        
        <button id="resetCursor">Reset to system default</button>
    </div>
</div>

<!-- CSS for Modal and Cursor Styles -->
 
<!-- Color Theme Modal -->
<div id="colorThemeModal" class="modal">
    <div class="modal-content">
        <span class="close close-modal">&times;</span>
        <h3>Colour Theme</h3>
        
        <!-- Dark Background Section -->
        <h4>Dark Background</h4>
        <div class="dark-background">
            <div class="color-option" data-color="#000000" style="background-color: #000000;"></div>
            <div class="color-option" data-color="#ffff00" style="background-color: #ffff00;"></div>
            <div class="color-option" data-color="#008000" style="background-color: #008000;"></div>
            <div class="color-option" data-color="#0000ff" style="background-color: #0000ff;"></div>
            <div class="color-option" data-color="#ff0000" style="background-color: #ff0000;"></div>
            <!-- Add more color options as needed -->
        </div>

        <!-- Light Background Section -->
        <h4>Light Background</h4>
        <div class="light-background">
            <div class="color-option" data-color="#f5f5dc" style="background-color: #f5f5dc;"></div>
            <div class="color-option" data-color="#d3d3d3" style="background-color: #d3d3d3;"></div>
            <div class="color-option" data-color="#ffff00" style="background-color: #ffff00;"></div>
            <div class="color-option" data-color="#0000ff" style="background-color: #0000ff;"></div>
            <!-- Add more color options as needed -->
        </div>
        
        <!-- Monochrome and Reset Buttons -->
        <button id="enableMonochrome">Enable monochrome</button>
        <button id="resetDefault">Reset to default</button>
    </div>
</div>

<!-- Language Selection Modal -->
<div id="languageModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Select Language</h3>
        <select id="languageSelect">
            <option value="en">English</option>
            <option value="ar">Arabic</option>
            <option value="ur">Urdu</option>
            <option value="hi">Hindi</option>
            <option value="bn">Bangali</option>
          
            <!-- Add more languages as needed -->
        </select>
        <button id="translateButton">Translate</button>
    </div>
</div>

</div>
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
      <ul class="list-inline top-v1-contacts">
                            <li>
                                <i class="fa fa-envelope"></i> <a href="mailto:marketing@fujtown.com">marketing@fujtown.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> (+971)  9 22 44 200
                            </li>
                            <li>
                                <a href="how-it-work" title="missing link title for seo" style="text-transform:none; font-size:13px;">
                                    <span class="fa fa-gear"></span>    How it Works
                                </a>
                            </li>
                            <li>
                            <a href="javascript:void(0);" title="Accessibility Tools" style="text-transform:none; font-size:13px;" onclick="toggleReciteHeader()">
    <span class="fas fa-universal-access"></span> Accessibility Tools
</a>

                            </li>
                            
                        </ul>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
      <ul class="list-inline top-v1-data">             
    <li><a href="https://www.facebook.com/fujtown/" target="_blank"><i class="icon-socials icon-facebook"></i></a></li>
    <li><a href="https://twitter.com/fujtown" target="_blank"><i class="icon-socials icon-twitter"></i></a></li>
    <li><a href="https://linkedin.com/company/fujtown" target="_blank"><i class="icon-socials icon-linkedin"></i></a></li>
    <li><a href="https://www.instagram.com/fujtown/" target="_blank"><i class="icon-socials icon-instagram"></i></a></li>
    <li><a href="https://www.youtube.com/channel/UCPSw_V8mXzEMTCTZAUhgoSA" target="_blank"><i class="icon-socials icon-youtube"></i></a></li>
    @if(auth()->check())
    <li><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
@else
    <li><a href="{{route('login')}}">Login</a></li>
    <li><a href="{{route('register')}}">Register</a></li>
@endif

      </ul>
      </div>
    </div>
  </div>
</div>
<header class="header sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class="d-flex" href="/"><img alt="Ecom" src="{{asset('assets/imgs/template/logo.png')}}"></a></div>
            <div class="header-nav">
            <nav class="nav-main-menu d-none d-xl-block">
    <ul class="main-menu">
        <li class="has-children">
            <a class="active" href="/">Home</a>
                <ul class="menu">
             
              @foreach ($menuCategories as $category)
          <li class="has-children">
              <a href="#">{{ $category->parent_category_name }}</a>
              @if ($category->subcategories->isNotEmpty())
                  <ul class="sub-menu">
                      <!-- Display up to 10 subcategories -->
                      @foreach ($category->subcategories->take(10) as $subcategory)
                          <li><a href="{{ route('listing-categories', $subcategory->url) }}">{{ $subcategory->category_name }}</a></li>
                      @endforeach

                      <!-- Add a "See All" link if there are more than 10 subcategories -->
                      @if ($category->subcategories->count() > 10)
                          <li class="seemore"><a href="{{ route('company',$category->parent_url) }}"> All {{$category->parent_category_name}} Categories</a></li>
                      @endif
                  </ul>
              @endif
          </li>
      @endforeach
    </ul>

        </li>
        <li><a href="/submit-listing">Submit Listing</a></li>
        <li><a href="/attractions">Attractions</a></li>
        <li><a href="/events">Events</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="{{route('jobs')}}">Jobs</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
</nav>



              <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
              <div class="d-inline-block box-search-top">
                <div class="form-search-top">
                  <form action="#">
                    <input class="input-search" type="text" placeholder="Search...">
                    <button class="btn btn-search">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                      </svg>
                    </button>
                  </form>
                </div><span class="font-lg icon-list search-post">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg></span>
              </div>
              <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span class="font-lg color-grey-900 arrow-down">EN</span></span>
                <div class="dropdown-account">
                  <ul>
                    <li><a class="font-md" href="#"><img src="{{asset('assets/imgs/template/icons/en.png')}}" alt="iori">
                        English</a></li>
                    <!-- <li><a class="font-md" href="#"><img src="assets/imgs/template/icons/fr.png" alt="iori">
                        French</a></li> -->
               
                  </ul>
                </div>
              </div>
              <div class="d-none d-sm-inline-block"><a class="btn btn-brand-1 hover-up" href="{{route('customer.dashboard')}}"> <svg class="plus-btn" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M16,3c-7.16797,0 -13,5.83203 -13,13c0,7.16797 5.83203,13 13,13c7.16797,0 13,-5.83203 13,-13c0,-7.16797 -5.83203,-13 -13,-13zM16,5c6.08594,0 11,4.91406 11,11c0,6.08594 -4.91406,11 -11,11c-6.08594,0 -11,-4.91406 -11,-11c0,-6.08594 4.91406,-11 11,-11zM15,10v5h-5v2h5v5h2v-5h5v-2h-5v-5z"></path></g></g>
</svg> Add Listing</a></div>
            </div>
          </div>
        </div>
      </div>
    </header>