<header id="listar-dashboardheader" class="listar-dashboardheader listar-haslayout">
			<div class="cd-auto-hide-header listar-haslayout">
				<div class="container-fluid">
					<div class="row">
						<strong class="listar-logo"><a href="#"><img src="{{asset('assets/customer/img/logo.png')}}" alt="company logo here"></a></strong>
						<nav class="listar-addnav">
							<ul>
								<li>
									<div class="dropdown listar-dropdown">
										<a class="listar-userlogin listar-btnuserlogin" href="javascript:void(0);" id="listar-dropdownuser" data-toggle="dropdown">
											<span><img src="{{asset('assets/customer/img/user.png')}}" alt="image description"></span>
											<em>John Parker</em>
											<i class="fa fa-angle-down"></i>
										</a>
										<div class="dropdown-menu listar-dropdownmen" aria-labelledby="listar-dropdownuser">
											<ul>
												<li>
													<a href="{{route('customer.dashboard')}}">
														<i class="icon-speedometer2"></i>
														<span>Dashboard</span>
													</a>
												</li>
												<li>
													<a href="{{route('customer.customer-act-listing')}}">
														<i class="icon-layers"></i>
														<span>Active Listings</span>
													</a>
												</li>
												<li>
													<a href="{{route('customer.customer-listing')}}">
														<i class="icon-layers"></i>
														<span>Pending Listings</span>
													</a>
												</li>
												<li>
													<a href="{{route('customer.customer-profile')}}">
														<i class="icon-user2"></i>
														<span>My Profile</span>
													</a>
												</li>
												<li>
													<a href="{{route('customer.logout')}}">
														<i class="icon-lock6"></i>
														<span>Logout</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a class="listar-btn listar-btngreen" href="{{route('submit-listing')}}">
										<i class="icon-plus"></i>
										<span>Add Listing</span>
									</a>
								</li>
							</ul>
						</nav>
						<nav id="listar-nav" class="listar-nav">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#listar-navigation" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
						</nav>
					</div>
				</div>
			</div>
			<div id="listar-sidebarwrapper" class="listar-sidebarwrapper">
				<strong class="listar-logo"><a href="index.html"><img src="{{asset('assets/customer/img/logo.png')}}" alt="company logo here"></a></strong>
				<span id="listar-btnmenutoggle" class="listar-btnmenutoggle"><i class="fa fa-angle-left"></i></span>
				<div id="listar-verticalscrollbar" class="listar-verticalscrollbar">
					<nav id="listar-navdashboard" class="listar-navdashboard">
						<div class="listar-menutitle"><span>Main</span></div>
						<ul>
							<li class="{{ Route::currentRouteName() == 'customer.dashboard' ? 'listar-active' : '' }}">
								<a href="dashboard.html">
									<i class="icon-speedometer2"></i>
									<span>Dashboard</span>
								</a>
							</li>
							
							<li class="{{ Route::currentRouteName() == 'customer.customer-act-listing' ? 'listar-active' : '' }}">
								<a href="{{route('customer.customer-act-listing')}}">
									<i class="icon-layers"></i>
									<span>Active Listings</span>
								</a>
							</li>
							<li class="{{ Route::currentRouteName() == 'customer.customer-listing' ? 'listar-active' : '' }}">
								<a href="{{route('customer.customer-listing')}}">
									<i class="icon-layers"></i>
									<span>Pending Listings</span>
								</a>
							</li>
							<li class="{{ Route::currentRouteName() == 'customer.customer-review' ? 'listar-active' : '' }}">
								<a href="{{route('customer.customer-review')}}">
									<i class="icon-star4"></i>
									<span>Reviews</span>
								</a>
							</li>
							
							<li class="{{ Route::currentRouteName() == 'customer.customer-adlisting' ? 'listar-active' : '' }}">
								<a href="{{route('submit-listing')}}">
									<i class="icon-pencil3"></i>
									<span>Add Listing</span>
								</a>
							</li>
						</ul>

						<div class="listar-menutitle listar-menutitleaccount"><span>Account</span></div>
						<ul>
							<li>
								<a href="{{route('customer.customer-profile')}}">
									<i class="icon-lock6"></i>
									<span>My Profile</span>
								</a>
							</li>
							<li>
								<a href="{{route('customer.logout')}}">
									<i class="icon-user4"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>