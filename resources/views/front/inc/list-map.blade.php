<div id="googleMap" style="width:auto;height:270px;"></div>
<ul class="list-unstyled save-job">
                    <script>
                var x = document.getElementById("demo");
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition, showError);
                    }
                }
                function showPosition(position) {
                    lat = position.coords.latitude;
                    lon = position.coords.longitude;
                    latlon = new google.maps.LatLng(lat, lon)
                    map = document.getElementById('map')
                    var $latitude = document.getElementById('latitude');
                    var $longitude = document.getElementById('longitude');
                    document.getElementById('latitude').value=lat;
                    document.getElementById('longitude').value=lon;
                    document.getElementById('join').value =
                        document.getElementById('latitude').value +','+
                        document.getElementById('longitude').value;
                    codeLatLng(lat,lon)
                    var myOptions = {
                        center:latlon,zoom:12,
                        mapTypeId:google.maps.MapTypeId.ROADMAP,
                        navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
                    }
                    var map = new google.maps.Map(document.getElementById("map"), myOptions);
                    var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!",draggable: true});
                    google.maps.event.addListener(marker, 'dragend', function(marker) {
                        var latLng = marker.latLng;
                        $latitude.value = latLng.lat()
                        $longitude.value = latLng.lng();
                        codeLatLng($latitude.value,$longitude.value)
                    });
                }
                function city() {
                    geocoder = new google.maps.Geocoder();
                }
                function codeLatLng(lat,lon) {
                    var latlng = new google.maps.LatLng(lat,lon);
                    geocoder.geocode({'latLng': latlng}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results)
                            if (results[1]) {
                                document.getElementById('city2').value=results[4].formatted_address;
                                document.getElementById('country').value=results[5].formatted_address;
                                document.getElementById('street').value=results[1].formatted_address;
                                document.getElementById('area').value=results[2].formatted_address;
                            }
                        }
                    });
                }
                function showError(error) {
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            x.innerHTML = "User denied the request for Geolocation."
                            break;
                        case error.POSITION_UNAVAILABLE:
                            x.innerHTML = "Location information is unavailable."
                            break;
                        case error.TIMEOUT:
                            x.innerHTML = "The request to get user location timed out."
                            break;
                        case error.UNKNOWN_ERROR:
                            x.innerHTML = "An unknown error occurred."
                            break;
                    }
                }
                </script>
                <form action="https://maps.google.com/maps" method="get" target="_blank">
                    <input type="hidden" id="latitude" value="{{$listing_lat}}">
                    <input type="hidden" id="longitude" value="{{$listing_long}}">
                    <input type="hidden" name="saddr" id="join" value="{{$listing_lat}},{{$listing_long}}">
                    <input type="hidden" name="daddr" value="{{$listing_lat}},{{$listing_long}}">
                    <input type="submit" value="Get Directions" class="btn-u btn" >
                </form>
                </ul>

                @php
    $currentDay = strtolower(date('l')); // Get current day in lowercase
@endphp

<table id="listing-timings" class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th colspan="3">Business Hours</th>
    </tr>
    </thead>
    <tbody>
   
    @if(is_null($business_hour))

      <tr class="{{ $currentDay === 'sunday' ? 'current-day' : '' }}">
        <td colspan="3" class="text-center">No Business Hour Details Added</td>
        
    @else
    <tr class="{{ $currentDay === 'sunday' ? 'current-day' : '' }}">
        <td>Sunday</td>
        <td>{{$business_hour->sunday_open}}</td>
        <td>{{$business_hour->sunday_close}}</td>
    </tr>
    <tr class="{{ $currentDay === 'monday' ? 'current-day' : '' }}">
        <td>Monday</td>
         <td>{{$business_hour->monday_open}}</td>
        <td>{{$business_hour->monday_close}}</td>
    </tr>
    <tr class="{{ $currentDay === 'tuesday' ? 'current-day' : '' }}">
        <td>Tuesday</td>
         <td>{{$business_hour->tuesday_open}}</td>
        <td>{{$business_hour->tuesday_close}}</td>
    </tr>
    <tr class="{{ $currentDay === 'wednesday' ? 'current-day' : '' }}">
        <td>Wednesday</td>
         <td>{{$business_hour->wednesday_open}}</td>
        <td>{{$business_hour->wednesday_close}}</td>
    </tr>
    <tr class="{{ $currentDay === 'thursday' ? 'current-day' : '' }}">
        <td>Thursday</td>
         <td>{{$business_hour->thursday_open}}</td>
        <td>{{$business_hour->thursday_close}}</td>
    </tr>
    <tr class="{{ $currentDay === 'friday' ? 'current-day' : '' }}">
        <td>Friday</td>
        <td>{{$business_hour->friday_open}}</td>
        <td>{{$business_hour->friday_close}}</td>
    </tr>
    <tr class="{{ $currentDay === 'saturday' ? 'current-day' : '' }}">
        <td>Saturday</td>
         <td>{{$business_hour->saturday_open}}</td>
        <td>{{$business_hour->saturday_close}}</td>
    </tr>
    @endif
    </tbody>
</table>
