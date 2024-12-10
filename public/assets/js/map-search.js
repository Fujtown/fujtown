function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 0, lng: 0 },
        zoom: 8,
    });

    const marker = new google.maps.Marker({
        map: map,
        draggable: true,
    });

    const searchInput = document.getElementById("address-search");
    const searchBox = new google.maps.places.SearchBox(searchInput);

    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length === 0) {
            return;
        }

        const bounds = new google.maps.LatLngBounds();

        places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
            }

            marker.setPosition(place.geometry.location);

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });

        map.fitBounds(bounds);
    });

    marker.addListener("dragend", () => {
        const position = marker.getPosition();
        searchInput.value = `${position.lat()}, ${position.lng()}`;
    });
}
