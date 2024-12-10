@extends('layout.app')
    @section('title', 'Home Page')
    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/listing.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/captcha/slidercaptcha.min.css') }}">
    @section('content')
   
    <main class="main">
      <section class="section banner-contact">
        <div class="container">
          <div class="banner-1">
            <div class="row align-items-center">
              <!-- <div class="col-lg-7"><span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span> -->
                <h1 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                Submit Listing
                </h1>
               
              </div>
            
            </div>
          </div>
        </div>
      </section>
      <section class="section mt-50">
        <div class="container">
        <div class="row align-items-center">
           
              <div class="col-md-12">
                <div class="box-register">
                  <h2 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s"> Add Your Business Details</h2>
                  <!-- <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s"> Create an account today and start using our business directory.</p> -->
                  <div class="line-register mt-5 mb-50"></div>
                  <div class="row wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <input class="form-control icon-name" type="text" placeholder="Company Name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <select  name="region">
                <option value="">Please select Region</option>
                <option value="Masafi">Masafi</option>
                <option value="Dadna">Dadna</option>
                <option value="Dibba">Dibba</option>
                <option value="Fujairah City">Fujairah City</option>
                <option value="Khorfakkah">Khorfakkah</option>
                <option value="Murbah">Murbah</option>
                <option value="Kalba">Kalba</option>
                <option value="Bithnah">Bithnah</option>
                <option value="Al Hayl">Al Hayl</option>
                <option value="Al Soda">Al Soda</option>
                <option value="other">other</option>
                                </select>
                    </div>
                  </div>
                
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group mb-25">
                        <label class="map-label" for="">Business Location (click on the red pointer on your right to get your exact location!)</label>
                        <input id="address-search" type="text" class="form-control mb-3" placeholder="Search for an address">
                        <div id="map"></div>
                    </div>
                </div>

                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                        <label class="map-label" for="">Enter additional address information for this listing (optional)</label>
                      <input class="form-control icon-map" type="text" placeholder="Enter additional addres">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">P.O. Box (optional)</label>
                      <input class="form-control icon-email" type="text" placeholder="P.O. Box">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                      <select class="form-control select2" name="category" id="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                 
                          <div class="col-lg-12 col-sm-12 mb-30">
            <div class="panel-group acc-v1" id="accordion-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse-One">
                                <i class="fa fa-plus" aria-hidden="true"></i>Hours of Operation (click + to open)
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-One" class="panel-collapse collapse">
                    <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table width="100%"  class="table table-striped" >
                                                                <tr>
                                                                    <td>&nbsp; </td>
                                                                    <td align="">Open - closed</td>
                                                                    <td align="">Open - closed</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sunday </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="sundayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="sundayClose"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Monday</td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="mondayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="mondayClose"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tuesday</td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="tuesdayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="tuesdayClose"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Wednesday</td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="wednesdayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="wednesdayClose"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Thursday</td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="thursdayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="thursdayClose"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Friday</td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="fridayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="fridayClose"></label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Saturday</td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="saturdayOpen"></label>
                                                                    </td>
                                                                    <td><label class="input">
                                                                            <input type="text" class="form-control" name="saturdayClose"></label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Cover Image</label>
                      <input class="form-control" type="file" >
                    </div>
                  </div>
             <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Gallery Images</label>
                      <input class="form-control " type="file" >
                    </div>
                  </div>                
         <div class="col-lg-12 col-sm-12">
        <label class="label"> <input type="checkbox" name="checkbox-inline" value="1"> <span>Freezone Company</span> </label>
    </div>
         <div class="col-lg-12 col-sm-12">
         <div id="editor-container">    </div>
    </div>

    <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Facebook</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div>     
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Youtube</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div>     
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Facebook</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div>     
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Twitter (X)</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div> 
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Website</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div> 
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Email</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div> 
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Phone</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div> 
                  <div class="col-lg-6 col-sm-6">
                    <div class="form-group mb-25">
                    <label class="map-label" for="">Alternate(Phone)</label>
                      <input class="form-control " type="text" >
                    </div>
                  </div> 
                  <div class="col-lg-12 col-sm-12">
                  <div class="slidercaptcha card">
                    <div class="card-header">
                        <span>Drag To Verify</span>
                    </div>
                    <div class="card-body">
                        <div id="captcha"></div>
                    </div>
                    </div>
                  </div>
                 
                  
                 
                </div>
                <div class="row align-items-center mt-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-6">
                    <div class="form-group">
                    <input type="hidden" name="latitude" id="latitude" value="">
                    <input type="hidden" name="longitude" id="longitude" value=""> 
                    <input type="hidden" id="street" name="street">
                    <input type="hidden" id="area" name="area">
                    <input type="hidden" id="city2" name="city2">
                    <input type="hidden" id="country" name="country">
                      <button class="btn btn-brand-lg btn-full font-md-bold" type="submit">Proceed to checkout</button>
                    </div>
                  </div>
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-6">
                    <div class="form-group">
                      <a href="#" class="btn btn-warning btn-full font-md-bold">Back</a>
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
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.api_key') }}&libraries=places"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript" src="{{asset('assets/captcha/longbow.slidercaptcha.min.js')}}"></script>
  <script>
    var captcha = sliderCaptcha({
    id: 'captcha',
    onSuccess: function () {
      // do something
    }
});
  </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean'],
                    ['link', 'video']
                ]
            }
        });

        // When the form is submitted, update the hidden input with the editor content
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('content-input').value = quill.root.innerHTML;
        });
    });
</script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Select Category",
      allowClear: true
    });
  });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const accordionToggle = document.querySelector('.accordion-toggle');
    const collapseOne = document.getElementById('collapse-One');
    const icon = accordionToggle.querySelector('i');

    accordionToggle.addEventListener('click', function(e) {
        e.preventDefault();
        collapseOne.classList.toggle('show');
        icon.classList.toggle('fa-plus');
        icon.classList.toggle('fa-minus');
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