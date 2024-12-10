@extends('layout.customer')
    @section('title', 'Customer Dashboard')

    @section('content')
   <!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Dashboard Banner Start
			*************************************-->
			<div class="listar-dashboardbanner">
				<ol class="listar-breadcrumb">
					<li><a href="javascript:void(0);">Home</a></li>
					<li class="listar-active">Dashboard</li>
				</ol>
				
			</div>
			<!--************************************
					Dashboard Banner End
			*************************************-->
		
			<!--************************************
					Dashboard Content Start
			*************************************-->
			<div id="listar-content" class="listar-content">
				<form class="listar-formtheme listar-formaddlisting listar-formdashboard">
					<div class="row">
						<fieldset class="listar-statisticsarea">
							<ul class="listar-statistics">
								<li class="listar-activelists">
									<div class="listar-couterholder">
										<h3 data-from="0" data-to="1" data-speed="1000" data-refresh-interval="10">1</h3>
										<h4>Active Listings</h4>
										<div class="listar-statisticicon"><i class="icon-map3"></i></div>
									</div>
								</li>
								
								<li class="listar-weeksviews">
									<div class="listar-couterholder">
										<h3 data-from="0" data-to="9563" data-speed="3000" data-refresh-interval="30">9563</h3>
										<h4>Last Week Views</h4>
										<div class="listar-statisticicon"><i class="icon-linegraph"></i></div>
									</div>
								</li>
								<li class="listar-newfeedback">
									<div class="listar-couterholder">
										<h3 data-from="0" data-to="672" data-speed="3000" data-refresh-interval="30">672</h3>
										<h4>New Feedbacks</h4>
										<div class="listar-statisticicon"><i class="icon-bubble3"></i></div>
									</div>
								</li>
							</ul>
						</fieldset>
						
						<fieldset class="listar-postvisits">
							<div class="listar-postvisit">
								<h3>Post Visits</h3>
								<div id="listar-competingchart" class="listar-themechart listar-competingchart"></div>
							</div>
						</fieldset>
					
						<fieldset class="listar-reviewsactivities">
							<div class="listar-peoplereviews">
								<div class="listar-boxtitle">
									<h3>People Reviews</h3>
									<ul class="listar-actionbtns">
										<li><a href="javascript:void(0);">View All Reviews</a></li>
									</ul>
								</div>
								<div class="listar-recentactivities">
									<div class="listar-reviewarea">
										<ul class="listar-reviews listar-themescrollbar">
											<li>
												
												<div class="listar-reviewcontent">
													<div class="listar-reviewhead">
														<div class="listar-reviewheading">
															<h4><a href="javascript:void(0);">Good Service But Not ...</a></h4>
														</div>
													</div>
													<div class="listar-description">
														<p>Labore et dolore magna aliqua enim inim veniam quis nostrud exercitation ullamco...</p>
													</div>
													<span class="listar-stars"><span></span></span>
												</div>
											</li>
											
										</ul>
									</div>
								</div>
							</div>
							<div class="listar-recentactivity">
								<div class="listar-boxtitle">
									<h3>Recent Activities</h3>
								</div>
								<div class="listar-recentactivities">
									<div class="listar-reviewarea">
										<ul class="listar-reviews listar-themescrollbar">
											<li class="listar-starractivity">
												<i class="icon-star3"></i>
												<div class="listar-activitytitle">
													<h4>Peter Parker left a review <span>5.0</span> on<strong>Restaurant</strong></h4>
												</div>
											</li>
											<li class="listar-layers">
												<i class="icon-layers"></i>
												<div class="listar-activitytitle">
													<h4>Your listing <strong>Local Service</strong> has been approved</h4>
												</div>
											</li>
											<li class="listar-heart">
												<i class="icon-heart2"></i>
												<div class="listar-activitytitle">
													<h4>Someone bookmarked your <strong>Restaurant</strong> listing</h4>
												</div>
											</li>
											
										
										</ul>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</form>
			</div>
			<!--************************************
						Dashboard Content End
			*************************************-->
		</main>
		<!--************************************
					Main End
		*************************************-->
    @endsection
