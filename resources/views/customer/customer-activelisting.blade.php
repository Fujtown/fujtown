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
				<form class="listar-formtheme listar-formaddlisting listar-formwishlist">
					<fieldset>
						<div class="listar-boxtitle">
							<h3>Active Listings</h3>
							
						</div>
						<div class="listar-dashboardwishlists tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
                                @foreach($listings as $listing)

								<div class="listar-themepost listar-placespost">
									<a class="listar-btnedite" href="javascript:void(0);"><i class="icon-pencil4"></i></a>
									<!-- <a class="listar-btndelpost" href="javascript:void(0);">x</a> -->
									<figure class="listar-featuredimg"><a href="javascript:void(0);"><img style="width: 350px;height: 200px;" src="{{asset('storage/'.$listing->listing_cover_image)}}" alt="image description" class="mCS_img_loaded"></a></figure>
									<div class="listar-postcontent">
										<h3><a href="javascript:void(0);">{{$listing->listing_name}}</a></h3>
										<span class="listar-catagory">{{$listing->single_category->category_name}}, {{$listing->listing_region}}, UAE</span>
										<div class="listar-reviewcategory">
											<div class="listar-review">
												<em>({{$listing->reviews_count}} Review)</em>
											</div>
										</div>
									</div>
								</div>

								@endforeach
							
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
