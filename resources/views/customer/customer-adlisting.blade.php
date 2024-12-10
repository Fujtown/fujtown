@extends('layout.customer')
    @section('title', 'Customer Dashboard')
    @section('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/captcha/slidercaptcha.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/customer-listing.css') }}">
   

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
				<form method="POST" enctype="multipart/form-data" action="{{route('customer.add_listing')}}" class="listar-formtheme listar-formaddlisting">
					@csrf
					<div id="listar-addlistingsteps" class="listar-addlistingsteps">
						<div class="listar-steptitle"><em>Basic Information</em></div>
						<section>
							<fieldset>
								<div class="listar-boxtitle">
									<h3>Basic Information</h3>
								</div>
								<!-- Display all errors under "Basic Information" -->
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group listar-dashboardfield">
											<label>Company Name</label>
											<input type="text" name="listing_name" class="form-control" placeholder="Salt &amp; Pepper Restaurant">
											@error('listing_name')
											<small class="text-danger">{{ $message }}</small>
										@enderror
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group listar-dashboardfield">
											<label>Company Name Arabic <span>Optional</span></label>
											<input type="text" name="listing_name_arabic" class="form-control" placeholder="Salt &amp; Pepper Restaurant">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group listar-dashboardfield">
											<label>Select Region</span></label>
                                            <select class="form-control" name="listing_region">
                                            <option value="">Please select Region</option>
                                            <option {{ old('listing_region') == 'Masafi' ? 'selected' : '' }} value="Masafi">Masafi</option>
                                            <option {{ old('listing_region') == 'Dadna' ? 'selected' : '' }} value="Dadna">Dadna</option>
                                            <option {{ old('listing_region') == 'Dibba' ? 'selected' : '' }} value="Dibba">Dibba</option>
                                            <option {{ old('listing_region') == 'Fujairah City' ? 'selected' : '' }} value="Fujairah City">Fujairah City</option>
                                            <option {{ old('listing_region') == 'Khorfakkah' ? 'selected' : '' }} value="Khorfakkah">Khorfakkah</option>
                                            <option {{ old('listing_region') == 'Murbah' ? 'selected' : '' }} value="Murbah">Murbah</option>
                                            <option {{ old('listing_region') == 'Kalba' ? 'selected' : '' }} value="Kalba">Kalba</option>
                                            <option {{ old('listing_region') == 'Bithnah' ? 'selected' : '' }} value="Bithnah">Bithnah</option>
                                            <option {{ old('listing_region') == 'Al Hayl' ? 'selected' : '' }} value="Al Hayl">Al Hayl</option>
                                            <option {{ old('listing_region') == 'Al Soda' ? 'selected' : '' }} value="Al Soda">Al Soda</option>
                                            <option {{ old('listing_region') == 'other' ? 'selected' : '' }} value="other">other</option>
                                                            </select>
															@error('listing_region')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group listar-dashboardfield">
											<label>Categories</label>
                                            <select class="select2" name="category_id[]" id="category" multiple="multiple" style="width: 100%">
                                            <option value="">Select Category</option>
											@foreach($categories as $category)
                                            <option value="{{ $category->category_id }}" 
											{{ (collect(old('category_id'))->contains($category->category_id)) ? 'selected' : '' }}>
											{{ $category->category_name }}
                                   		 </option>
                                            @endforeach
                                        </select>


										</div>
									</div>
                                    <div class="col-md-12">
                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group listar-dashboardfield">
                                        <label>Email </label>
										<input id="listar-photogallery" class="form-control" value="{{ old('listing_email') }}" placeholder="Enter Your Email Address" type="text" name="listing_email">
										</div>
                                            </div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group listar-dashboardfield">
											<label>Enter additional address information for this listing <span>(optional)</span></label>
											<input type="text" name="listing_additional_info" value="{{ old('listing_additional_info') }}" class="form-control" placeholder="United Arab Emirates">
										</div>
									</div>
                                        </div>
                                    </div>
                                   
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group listar-dashboardfield">
											<label>P.O. Box <span>(optional)</span></label>
											<input type="text" name="listing_pobox" value="{{ old('listing_pobox') }}" class="form-control" placeholder="P.O BOX">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group listar-dashboardfield">
											<label>Website <span>(optional)</span></label>
											<input type="url" name="listing_web_url" value="{{ old('listing_web_url') }}" class="form-control" placeholder="https://">
										</div>
									</div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group listar-dashboardfield">
											<label>Phone</label>
												<input id="listar-photogallery" value="{{ old('listing_landline') }}" class="form-control" type="text" name="listing_landline">
										</div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group listar-dashboardfield">
                                        <label>Phone <span>(Alternate)</span></label>
										<input id="listar-photogallery" alue="{{ old('listing_phone') }}"  class="form-control" type="text" name="listing_phone">
										</div>
                                            </div>
                                           
                                        </div>
									</div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group listar-dashboardfield">
											<label>Cover Image</label>
												<input id="listar-photogallery" class="form-control" type="file" name="file">
										</div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group listar-dashboardfield">
                                        <label>Gallery Image <span>(Maximum 3 Images)</span></label>
										<input id="listar-photogallery" multiple class="form-control" type="file" name="gallery_images[]">
										</div>
                                            </div>
                                        </div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group listar-dashboardfield">
											<label>Description</label>
											<div class="clearfix"></div>
											<textarea id="listar-tinymceeditor" name="listing_desc" class="listar-tinymceeditor">{{ old('listing_desc') }}</textarea>
										</div>
									</div>
									
								</div>
							</fieldset>
						</section>
						<div class="listar-steptitle"><em>Location</em></div>
						<section>
							<fieldset>
								<div class="listar-boxtitle">
									<h3>Location</h3>
								</div>
								<div class="row">
                                <div class="col-lg-12 col-sm-12">
                                <label class="label freezone-label"> <input type="checkbox" name="listing_freezone" value="1"> <span class="freezone">Freezone Company</span> </label>
                            </div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group listar-dashboardfield">
                                        <label class="map-label" for="">Business Location (click on the red pointer on your right to get your exact location!)</label>
                        <input id="address-search" type="text" name="listing_desc" class="form-control mb-3" placeholder="Search for an address">
                        <div id="map"></div>
										</div>
										</div>
								</div>
							</fieldset>
						</section>
						
						<div class="listar-steptitle"><em>Business Hours</em></div>
						<section>
						<fieldset>
    <div class="listar-boxtitle">
        <h3>Business Hours</h3>
    </div>
    <div class="row">
        <ul class="listar-businesshours">
            <li>
                <label>Monday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="monday_open" placeholder="Opening Time" value="{{ old('monday_open') }}">
                    @error('monday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="monday_close" placeholder="Closing Time" value="{{ old('monday_close') }}">
                    @error('monday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
            
            <li>
                <label>Tuesday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="tuesday_open" placeholder="Opening Time" value="{{ old('tuesday_open') }}">
                    @error('tuesday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tuesday_close" placeholder="Closing Time" value="{{ old('tuesday_close') }}">
                    @error('tuesday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
            
            <li>
                <label>Wednesday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="wednesday_open" placeholder="Opening Time" value="{{ old('wednesday_open') }}">
                    @error('wednesday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="wednesday_close" placeholder="Closing Time" value="{{ old('wednesday_close') }}">
                    @error('wednesday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
            
            <li>
                <label>Thursday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="thursday_open" placeholder="Opening Time" value="{{ old('thursday_open') }}">
                    @error('thursday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="thursday_close" placeholder="Closing Time" value="{{ old('thursday_close') }}">
                    @error('thursday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
            
            <li>
                <label>Friday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="friday_open" placeholder="Opening Time" value="{{ old('friday_open') }}">
                    @error('friday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="friday_close" placeholder="Closing Time" value="{{ old('friday_close') }}">
                    @error('friday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
            
            <li>
                <label>Saturday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="saturday_open" placeholder="Opening Time" value="{{ old('saturday_open') }}">
                    @error('saturday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="saturday_close" placeholder="Closing Time" value="{{ old('saturday_close') }}">
                    @error('saturday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
            
            <li>
                <label>Sunday</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="sunday_open" placeholder="Opening Time" value="{{ old('sunday_open') }}">
                    @error('sunday_open')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sunday_close" placeholder="Closing Time" value="{{ old('sunday_close') }}">
                    @error('sunday_close')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </li>
        </ul>
    </div>
</fieldset>

						</section>
						
						<div class="listar-steptitle"><em>Social Media</em></div>
						<section>
						<fieldset>
    <div class="listar-boxtitle">
        <h3>Social Media</h3>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group listar-dashboardfield">
                <label>Facebook <span>(optional)</span><span class="listar-socialurlicon listar-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></span></label>
                <input type="url" name="listing_facebook" class="form-control" placeholder="enter facebook profile url" value="{{ old('listing_facebook') }}">
               
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group listar-dashboardfield">
                <label>Twitter <span>(optional)</span><span class="listar-socialurlicon listar-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></span></label>
                <input type="url" name="listing_twitter" class="form-control" placeholder="enter twitter profile url" value="{{ old('listing_twitter') }}">
              
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group listar-dashboardfield">
                <label>LinkedIn <span>(optional)</span><span class="listar-socialurlicon listar-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></span></label>
                <input type="url" name="listing_linkedin" class="form-control" placeholder="enter linkedin profile url" value="{{ old('listing_linkedin') }}">
               
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group listar-dashboardfield">
                <label>Google <span>(optional)</span><span class="listar-socialurlicon listar-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></span></label>
                <input type="url" name="listing_google" class="form-control" placeholder="enter google profile url" value="{{ old('listing_google') }}">
              
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group listar-dashboardfield">
                <label>Instagram <span>(optional)</span><span class="listar-socialurlicon listar-instagram"><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></span></label>
                <input type="url" name="listing_instagram" class="form-control" placeholder="enter Instagram profile url" value="{{ old('listing_instagram') }}">
             
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="form-group listar-dashboardfield">
                <label>Youtube <span>(optional)</span><span class="listar-socialurlicon listar-youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></span></label>
                <input type="url" name="listing_youtube" class="form-control" placeholder="enter youtube url" value="{{ old('listing_youtube') }}">
              
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn-div">
            <input type="submit" class="btn btn-primary submit-btn">
        </div>
    </div>
</fieldset>

						</section>
					</div>
                    <input type="hidden" name="listing_lat" id="latitude" value="">
                    <input type="hidden" name="listing_long" id="longitude" value=""> 
                    <input type="hidden" name="package" value="{{$package}}">
                    <input type="hidden" id="street" name="street">
                    <input type="hidden" id="area" name="area">
                    <input type="hidden" id="city2" name="city2">
                    <input type="hidden" id="country" name="country">
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
    @section('script')
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    // Store the first jQuery version
    var $jq = jQuery.noConflict();
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.api_key') }}&libraries=places"></script>
<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
<script type="text/javascript" src="{{asset('assets/captcha/longbow.slidercaptcha.min.js')}}"></script>
<script>
    $jq(document).ready(function() {
        $jq('#category').select2({
            width: '100%',
            placeholder: "Select Categories (Max 3)",
            allowClear: true,
            multiple: true,
            maximumSelectionLength: 3, // Set maximum selections to 3
            closeOnSelect: false,
            language: {
                // Custom message when max selections reached
                maximumSelected: function(e) {
                    return "You can only select up to 3 categories";
                }
            }
        });

        // Optional: Add warning when approaching limit
        $jq('#category').on('select2:selecting', function(e) {
            var selectedItems = $(this).val() || [];
            if (selectedItems.length >= 2) { // Show warning when 2 items are selected
               alert('You can select one more category');
                // If you're not using toastr, you can use alert instead:
                // alert('You can select one more category');
            }
        });

        // Optional: Handle attempt to select more than maximum
        $jq('#category').on('select2:select', function(e) {
            var selectedItems = $(this).val() || [];
            if (selectedItems.length > 3) {
                $(this).val(selectedItems.slice(0, 3)).trigger('change');
                alert('Maximum 3 categories allowed');
                // If you're not using toastr, you can use alert instead:
                // alert('Maximum 3 categories allowed');
            }
        });
    });

    function initMap() {
    var map, marker, geocoder, searchBox;
    var $latitude = document.getElementById('latitude');
    var $longitude = document.getElementById('longitude');
    var $street = document.getElementById('street');
    var $area = document.getElementById('area');
    var $city2 = document.getElementById('city2');
    var $country = document.getElementById('country');

    function showPosition(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon);

        var mapOptions = {
            zoom: 10,
            center: latlon,
            scrollwheel: false,
            styles: [
                // Your existing map styles here
            ]
        };

        map = new google.maps.Map(document.getElementById("map"), mapOptions);

        marker = new google.maps.Marker({
            position: latlon,
            map: map,
            title: "You are here!",
            draggable: true
        });

        $latitude.value = lat;
        $longitude.value = lon;

        codeLatLng(lat, lon);

        google.maps.event.addListener(marker, 'dragend', function() {
            var latLng = marker.getPosition();
            $latitude.value = latLng.lat();
            $longitude.value = latLng.lng();
            codeLatLng($latitude.value, $longitude.value);
        });

        // Add search box
        var input = document.getElementById('address-search');
        searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                marker.setPosition(place.geometry.location);
                $latitude.value = place.geometry.location.lat();
                $longitude.value = place.geometry.location.lng();
                codeLatLng($latitude.value, $longitude.value);

                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    function codeLatLng(lat, lon) {
        var latlng = new google.maps.LatLng(lat, lon);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $street.value = results[0].formatted_address;
                }
                if (results[2]) {
                    $area.value = results[2].formatted_address;
                }
                if (results[4]) {
                    $city2.value = results[4].formatted_address;
                }
                if (results[5]) {
                    $country.value = results[5].formatted_address;
                }
            }
        });
    }

    function showError(error) {
        var x = document.getElementById("demo");
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation.";
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out.";
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred.";
                break;
        }
    }

    geocoder = new google.maps.Geocoder();

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";
    }
}

// Call initMap when the page loads
google.maps.event.addDomListener(window, 'load', initMap);

</script>




    @endsection
