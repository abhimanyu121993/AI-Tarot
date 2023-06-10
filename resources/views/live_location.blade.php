<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Location</title>
    <style>
        .container {
            width: 50%;
        }

        #map {
            height: 50vh;
            margin-bottom: 10px;
            display: none;
        }

        #locationList .card {
            padding: 10px;
        }

        #toast-container {
            top: 50%;
            bottom: unset;
        }

        .toast {
            background-color: rgba(0, 0, 0, .8);
        }

        .btn i {
            font-size: 1rem;
            margin-right: 2px;
        }

        @media only screen and (min-width: 768px) {
            .container {
                width: 80%;
                max-width: 800px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Shipping Address</h3>
        <p>You can click the button below to use your current location as your shipping address</p>
        <div id="map">
        </div>
        <button id="showMe" class="btn">Use My Location</button>
        <form id="shippingAddress">
          <div id="locationList"></div>
          <br>
          <div class="input-field">
            <textarea class="input_fields materialize-textarea" id="address" type="text"></textarea>
            <label class="active" for="address">Address (Area and Street)</label>
          </div>
          <div class="input-field">
            <input class="input_fields" id="locality" type="text">
            <label class="active" for="locality">Locality</label>
          </div>
          <div class="input-field">
            <input class="input_fields" id="city" type="text">
            <label class="active" for="city">City/District/Town</label>
          </div>
          <div class="input-field">
            <input class="input_fields" id="postal_code" type="text">
            <label class="active" for="pin_code">Pin Code</label>
          </div>
          <div class="input-field">
            <input class="input_fields" id="landmark" type="text">
            <label class="active" for="landmark">Landmark</label>
          </div>
          <div class="input-field">
            <input class="input_fields" id="state" type="text">
            <label class="active" for="State">State</label>
          </div>
        </form>
        <!-- You could add a fallback address gathering form here -->
      </div>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmvBDtwdEVLVjZwy8lTs8ZszT"></script> --}}

      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGCql0HlN4C_D7B2BcIIhtuFvjrdfvoew"></script>
      <script src="js/main.js"></script>

    <script>
        const actionBtn = document.getElementById('showMe');
        const locationsAvailable = document.getElementById('locationList');
        let Gmap, Gmarker;

        const __KEY = "AIzaSyDmvBDtwdEVLVjZwy8lTs8ZszT-zke4sDA";

        actionBtn.addEventListener('click', e => {
            // hide the button
            actionBtn.style.display = "none";

            // call Materialize toast to update user
            M.toast({
                html: 'I am fetching your current location',
                classes: 'rounded'
            });

            // get the user's position
            getLocation();

        });

        getLocation = () => {
            if (navigator.geolocation) {
                var cur_l = navigator.geolocation.getCurrentPosition(displayLocation, showError, options)
                alert(cur_l);
            } else {
                M.toast({
                    html: 'Sorry, your browser does not support this feature... Please Update your Browser to enjoy it',
                    classes: 'rounded'
                });
            }
        }

        // displayLocation
        displayLocation = (position) => {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            const latlng = {
                lat,
                lng
            }

            showMap(latlng, lat, lng);
            createMarker(latlng);
            mapArea.style.display = "block";
            getGeolocation(lat, lng);

        }

        // Recreates the map
        showMap = (latlng, lat, lng) => {
            let mapOptions = {
                center: latlng,
                zoom: 17
            };

            Gmap = new google.maps.Map(mapArea, mapOptions);

            Gmap.addListener('drag', function() {
                Gmarker.setPosition(this.getCenter()); // set marker position to map center
            });

            Gmap.addListener('dragend', function() {
                Gmarker.setPosition(this.getCenter()); // set marker position to map center
            });

            Gmap.addListener('idle', function() {

                Gmarker.setPosition(this.getCenter()); // set marker position to map center

                if (Gmarker.getPosition().lat() !== lat || Gmarker.getPosition().lng() !== lng) {
                    setTimeout(() => {
                        // console.log("I have to get new geocode here!")
                        updatePosition(this.getCenter().lat(), this.getCenter()
                    .lng()); // update position display
                    }, 2000);
                }
            });

        }

        // Creates marker on the screen
        createMarker = (latlng) => {
            let markerOptions = {
                position: latlng,
                map: Gmap,
                animation: google.maps.Animation.BOUNCE,
                clickable: true
                // draggable: true
            };
            Gmarker = new google.maps.Marker(markerOptions);

        }

        // updatePosition on
        updatePosition = (lat, lng) => {

            getGeolocation(lat, lng);
        }

        // Displays the different error messages
        showError = (error) => {
            mapArea.style.display = "block"
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    mapArea.innerHTML = "You denied the request for your location."
                    break;
                case error.POSITION_UNAVAILABLE:
                    mapArea.innerHTML = "Your Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    mapArea.innerHTML = "Your request timed out. Please try again"
                    break;
                case error.UNKNOWN_ERROR:
                    mapArea.innerHTML = "An unknown error occurred please try again after some time."
                    break;
            }
        }

        const options = {
            enableHighAccuracy: true
        }

        getGeolocation = (lat, lng) => {

            const latlng = lat + "," + lng;

            fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${latlng}&key=${__KEY}`)

                .then(res => res.json())
                .then(data => populateCard(data.results));

        }

        function removeAddressCards() {
            if (locationsAvailable.hasChildNodes()) {
                while (locationsAvailable.firstChild) {
                    locationsAvailable.removeChild(locationsAvailable.firstChild);
                }
            }
        }

        populateCard = (geoResults) => {
            // check if a the container has a child node to force re-render of dom
            removeAddressCards();

            geoResults.map(geoResult => {

                // first create the input div container
                const addressCard = document.createElement('div');

                // then create the input and label elements
                const input = document.createElement('input');
                const label = document.createElement('label');

                // then add materialize classes to the div and input
                addressCard.classList.add("card");
                input.classList.add("with-gap");

                // add attributes to them
                label.setAttribute("for", geoResult.place_id);
                label.innerHTML = geoResult.formatted_address;

                input.setAttribute("name", "address");
                input.setAttribute("type", "radio");
                input.setAttribute("value", geoResult.formatted_address);
                input.setAttribute("id", geoResult.place_id);
                // input.addEventListener('click', e => console.log(123));
                input.addEventListener('click', () => inputClicked(geoResult));
                // finalResult = input.value;
                finalResult = geoResult.formatted_address;


                addressCard.appendChild(input);
                addressCard.appendChild(label);

                // console.log(geoResult.formatted_address)

                return (
                    locationsAvailable.appendChild(addressCard)
                );
            })
        }

        inputClicked = (result) => {

            result.address_components.map(component => {
                const types = component.types

                if (types.includes('postal_code')) {
                    $('postal_code').value = component.long_name
                }

                if (types.includes('locality')) {
                    $('locality').value = component.long_name
                }

                if (types.includes('administrative_area_level_2')) {
                    $('city').value = component.long_name
                }

                if (types.includes('administrative_area_level_1')) {
                    $('state').value = component.long_name
                }

                if (types.includes('point_of_interest')) {
                    $('landmark').value = component.long_name
                }
            });

            $('address').value = result.formatted_address;

            // to avoid labels overlapping prefilled contents
            M.updateTextFields();
            removeAddressCards();
        }
    </script>
@include('sweetalert::alert')


</body>

</html>
