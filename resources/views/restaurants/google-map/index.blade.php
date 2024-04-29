<html>
  <head>
    <title>Place Autocomplete Restricted to Multiple Countries</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    

    
    <link rel="stylesheet" href="{{ asset('/css/restaurant/google-map.css')  }}" >
  </head>
  <body>
    
    
    {{-- <div class="pac-card" id="pac-card"> --}}
      {{-- <div>
        <div id="title">Countries</div>
        <div id="country-selector" class="pac-controls">
          <input type="radio" name="type" id="changecountry-usa" />
          <label for="changecountry-usa">USA</label>
          <input
            type="radio"
            name="type"
            id="changecountry-usa-and-uot"
            checked="checked"
          />
          <label for="changecountry-usa-and-uot"
            >USA and unincorporated organized territories</label
          >
        </div>
      </div> --}}
      {{-- <div id="pac-container"> --}}
        <input id="pac-input" type="text" placeholder="Enter a location" />
      {{-- </div> --}}
    {{-- </div> --}}
    <div id="map"></div>
    {{-- <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon" />
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
    </div> --}}

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbtmHh4zHJMzxxH7893O9DmuaNWZQewy0&callback=initMap&libraries=places&v=weekly"
      defer
    ></script>
    <script>
      // This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    // center: { lat: 50.064192, lng: -130.605469 },
    center: { lat: 35.6895, lng: 139.6917 }, // 東京の座標を設定
    // zoom: 3,
    zoom: 6, // 適切なズームレベルを設定
  });

  const card = document.getElementById("pac-card");

  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

  const center = { lat: 50.064192, lng: -130.605469 };
  // Create a bounding box with sides ~10km away from the center point
  const defaultBounds = {
    north: center.lat + 0.1,
    south: center.lat - 0.1,
    east: center.lng + 0.1,
    west: center.lng - 0.1,
  };
  const input = document.getElementById("pac-input");
  const options = {
    bounds: defaultBounds,
    // componentRestrictions: { country: "us" },
    componentRestrictions: { country: "jp" },
    fields: ["address_components", "geometry", "icon", "name"],
    strictBounds: false,
  };
  const autocomplete = new google.maps.places.Autocomplete(input, options);

  // Set initial restriction to the greater list of countries.
  autocomplete.setComponentRestrictions({
    // country: ["us", "pr", "vi", "gu", "mp"],
    country: ["jp"],
  });

  const southwest = { lat: 5.6108, lng: 136.589326 };
  const northeast = { lat: 61.179287, lng: 2.64325 };
  const newBounds = new google.maps.LatLngBounds(southwest, northeast);

  autocomplete.setBounds(newBounds);

  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");

  infowindow.setContent(infowindowContent);

  const marker = new google.maps.Marker({
    map,
    anchorPoint: new google.maps.Point(0, -29),
  });

  autocomplete.addListener("place_changed", () => {
    infowindow.close();
    marker.setVisible(false);

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }

    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    let address = "";

    if (place.address_components) {
      address = [
        (place.address_components[0] &&
          place.address_components[0].short_name) ||
          "",
        (place.address_components[1] &&
          place.address_components[1].short_name) ||
          "",
        (place.address_components[2] &&
          place.address_components[2].short_name) ||
          "",
      ].join(" ");
    }

    infowindowContent.children["place-icon"].src = place.icon;
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent = address;
    infowindow.open(map, marker);
  });

  // Sets a listener on a given radio button. The radio buttons specify
  // the countries used to restrict the autocomplete search.
  function setupClickListener(id, countries) {
    const radioButton = document.getElementById(id);

    radioButton.addEventListener("click", () => {
      autocomplete.setComponentRestrictions({ country: countries });
    });
  }

  setupClickListener("changecountry-usa", "us");
  setupClickListener("changecountry-usa-and-uot", [
    "us",
    "pr",
    "vi",
    "gu",
    "mp",
  ]);
}

window.initMap = initMap;
    </script>
  </body>
</html>