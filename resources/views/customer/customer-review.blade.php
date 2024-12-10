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
				<form class="listar-formtheme listar-formaddlisting">
					<fieldset>
						<div class="listar-dashboardreviews">
							<div class="listar-boxtitle">
								<h3>Reviews</h3>
								<ul class="listar-actionbtns" role="tablist">
									<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Visitor Reviews</a></li>
									<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Your Reviews</a></li>
								</ul>
							</div>
							<div class="listar-dashboardreviewstabcontent tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<ul class="listar-comments">
										@foreach($reviews as $review)
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<div class="listar-authorinfo">
														<h3> 
															@if(empty($review->name))
															Anonymous
															@else
															$review->name
															@endif		
													</h3>
													</div>
												</div>
												
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>{{ \Carbon\Carbon::parse($review->date_created)->format('F j, Y') }}</span>
													</time>
													<div class="listar-description">
														<p>{{$review->message}}</p>
														
													</div>
												</div>
											</div>
										</li>
										@endforeach
									
									</ul>
								</div>
							</div>
						</div>
					</fieldset>
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
