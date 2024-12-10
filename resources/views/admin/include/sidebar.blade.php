<div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center bg-logo">
                        <a href="index.html" class="logo"><i class="mdi mdi-bowling text-success"></i> Fujtown</a>
                        <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
                    </div>
                </div>
               

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{route('coffee.dashboard')}}" class="waves-effect">
                                    <i class="dripicons-device-desktop"></i>
                                    <span> Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="dripicons-copy"></i><span> Pages </span></a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="dripicons-to-do"></i><span> Tourism </span></a>
                            </li>
                            <li>
                                <a href="{{route('coffee.news')}}" class="waves-effect"><i class="dripicons-to-do"></i><span> News & Updates </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Listing Categories </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('coffee.category')}}">Add Category</a></li>                                 
                                    <li><a href="{{route('coffee.category-list')}}">Categories List</a></li>                                 
                                    <li><a href="{{route('coffee.parent-category-list')}}">Parent Category</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Listing </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Add Listing</a></li>                                 
                                    <li><a href="#">View All Listing</a></li>                                 
                                    <li><a href="#">Orders</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Attractions Categories </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Add Category</a></li>                                 
                                    <li><a href="#">Categories List</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Attractions </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Add Attractions</a></li>                                 
                                    <li><a href="#">View All Attractions</a></li>                                 
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('coffee.advertisment')}}" class="waves-effect"><i class="dripicons-to-do"></i><span>Advertisment </span></a>
                            </li>
                            <li>
                                <a href="{{route('coffee.packages')}}" class="waves-effect"><i class="dripicons-to-do"></i><span>Packages </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Deals & Promotions </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('coffee.promotion')}}">View Promotions</a></li>                                 
                                    <li><a href="#">View Orders</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Trips & Events </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('coffee.events')}}">Trips & Events</a></li>                                 
                                    <li><a href="#">Orders</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Blogs </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('coffee.blogs')}}">Blogs</a></li>                                 
                                    <li><a href="{{route('coffee.blog-category')}}">Blog Categories</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> FAQ </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('coffee.faqs')}}">FAQs</a></li>                                 
                                    <li><a href="{{route('coffee.faq-cat')}}">FAQ Categories</a></li>                                 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-list"></i> <span> Jobs </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('coffee.jobs')}}">View Jobs</a></li>                                 
                                    <li><a href="{{route('coffee.add-job')}}">Add Job</a></li>      
                                    <li><a href="{{route('coffee.job-categories')}}">View Job Categories</a></li>                             
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('coffee.customer')}}" class="waves-effect"><i class="dripicons-user"></i><span>Customers </span></a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="dripicons-blog"></i><span>Reviews </span></a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="dripicons-user"></i><span>Deals Subscriber </span></a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect"><i class="dripicons-user"></i><span>Emails Listing </span></a>
                            </li>
                            <li>
                                <a href="{{route('coffee.feedback')}}" class="waves-effect"><i class="dripicons-user"></i><span>Messages </span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>