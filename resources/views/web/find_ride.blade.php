@extends('web.layout.master')
@section('title')
Find Ride
@endsection
@section('headExtraJs')
<script>
    let markerOptionsFindRide;
    let markerShowFindRide;
    let addressFindRide = '';

    function initMap() {
        let $lat = 0;
        let $lng = 0;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            $lat = position.coords.latitude;
            $lng = position.coords.longitude;

            const map = new google.maps.Map(document.getElementById("map"), {
                mapTypeControl: false,
                center: {lat: $lat, lng: $lng},
                zoom: 18,
            });

            new google.maps.Geocoder().geocode({location: {lat: $lat, lng: $lng}}, (results, status) => {
                if (status === "OK") {
                    if (results[0]) {
                        for (let i = 0; i < results[0]['address_components'].length; i++) {
                            if (i === results[0]['address_components'].length - 1) {
                                addressFindRide += results[0]['address_components'][i]['long_name']
                            } else {
                                addressFindRide += results[0]['address_components'][i]['long_name'] + ', '
                            }
                        }
                        let origin = $('#originInputFindRide')
                        origin.val(addressFindRide)
                    } else {
                        window.alert("No results found");
                    }
                } else {
                    window.alert("Geocoder failed due to: " + status);
                }
            });

            markerOptionsFindRide = {
                position: {lat: $lat, lng: $lng},
                map: map,
                animation: google.maps.Animation.BOUNCE,
                id: 1
            };
            markerShowFindRide = new google.maps.Marker(markerOptionsFindRide);
            new AutocompleteDirectionsHandler(map);
        }
    }

    class AutocompleteDirectionsHandler {
        constructor(map) {
            this.map = map;
            this.originPlaceId = "";
            this.destinationPlaceId = "";
            this.travelMode = google.maps.TravelMode.WALKING;
            this.directionsService = new google.maps.DirectionsService();
            this.directionsRenderer = new google.maps.DirectionsRenderer();
            this.directionsRenderer.setMap(map);
            const originInput = document.getElementById("originInputFindRide");
            const destinationInput = document.getElementById("destinationInputFindRide");
            const modeSelector = document.getElementById("mode-selector");
            const originAutocomplete = new google.maps.places.Autocomplete(
                originInput
            );
            // Specify just the place data fields that you need.
            originAutocomplete.setFields(["place_id"]);
            const destinationAutocomplete = new google.maps.places.Autocomplete(
                destinationInput
            );
            // Specify just the place data fields that you need.
            destinationAutocomplete.setFields(["place_id"]);

            this.setupPlaceChangedListener(originAutocomplete, "ORIG");
            this.setupPlaceChangedListener(destinationAutocomplete, "DEST");

            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                modeSelector
            );
        }

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.


        setupPlaceChangedListener(autocomplete, mode) {
            autocomplete.bindTo("bounds", this.map);
            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();
                if (!place.place_id) {
                    window.alert("Please select an option from the dropdown list.");
                    return;
                }

                if (mode === "ORIG") {
                    this.originPlaceId = place.place_id;
                } else {
                    this.destinationPlaceId = place.place_id;
                }
                this.route();
            });
        }

        route() {
            console.log(this.map.getBounds().contains(markerOptionsFindRide['position']))
            if (this.map.getBounds().contains(markerOptionsFindRide['position'])) {
                markerShowFindRide.visible = false;
            }
            if (!this.originPlaceId || !this.destinationPlaceId) {
                return;
            }
            const me = this;
            this.directionsService.route(
                {
                    origin: {placeId: this.originPlaceId},
                    destination: {placeId: this.destinationPlaceId},
                    travelMode: this.travelMode,
                },
                (response, status) => {
                    if (status === "OK") {
                        me.directionsRenderer.setDirections(response);
                    } else {
                        window.alert("Directions request failed due to " + status);
                    }
                }
            );
        }
    }
</script>
@endsection
@section('content')
<section id="content">

    <div class="content-wrap">
        <input type="hidden" value="FINDARIDE" id="page_active">
        <div class="container clearfix">

            <!-- Contact Form-->
            <div class="col_half">
                <div class="fancy-title title-dotted-border">
                    <h3>Create a find request</h3>
                </div>

                <div class="contact-widget">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong> {{ implode('', $errors->all(':message')) }}</strong>
                    </div>
                    @endif
                    <div class="contact-form-result"></div>

                    <form class="nobottommargin" id="template-contactform" name="template-contactform"
                          action="{{route('storeRequest')}}"
                          method="POST">
                        @csrf

                        <div class="form-process"></div>
                        <div class="col_two_third">
                            <label for="originInputFindRide">Origin</label>
                            <input type="text" id="originInputFindRide" name="pickup_address" value=""
                                   class="controls pac-target-input valid sm-form-control" required/>
                        </div>

                        <div class="col_two_third">
                            <label for="destinationInputFindRide">Destination</label>
                            <input type="text" id="destinationInputFindRide" name="destination_address"
                                   class="controls pac-target-input valid  sm-form-control"
                                   placeholder="Enter a destination location" autocomplete="off"
                                   aria-invalid="false" required/>
                        </div>

                        <div class="col_two_third">
                            <label>Start time</label>
                            <div class="form-group">
                                <div class="input-group tleft" data-target-input="nearest"
                                     data-target=".datetimepicker">
                                    <input type="datetime-local" name="desired_pickup_time"
                                           class="form-control datetimepickerInputFindRide datetimepicker"
                                           data-target=".datetimepicker" required/>
                                </div>
                            </div>
                        </div>

                        <div class="col_one_third">
                            <label for="number_of_seats">Amount of people</label>
                            <input type="number" id="number_of_seats" name="seats_occupy"
                                   onchange="if (this.value < 1){this.value=1}" class="controls sm-form-control"
                                   placeholder="Enter the number of people" required/>
                        </div>
                        <div class="clear"></div>
                        <div class="col_full">
                            <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                    class="button button-3d m-0">Submit
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Contact Form End -->

            </div><!-- Contact Form End -->

            <!-- Google Map
            ============================================= -->

            <!-- Google Map
            ============================================= -->
            <div class="col_half col_last pt-3" style="padding-top: 35px">

                <section id="google-map" class="gmap">
                    <div class="col-md-12 col-12 container_map">
                        <div id="map"></div>
                    </div>
                </section>

            </div><!-- Google Map End -->

        </div>

        <div class="clear"></div>
    </div>

    </div>

</section><!-- #content end -->
@endsection
@section('botExtraJs')
<script src="{{Url('https://maps.googleapis.com/maps/api/js?key=AIzaSyARQDGY6bvtZHavFPoCWEgmzxk7DLSbmoI&callback=initMap&libraries=places&v=weekly')}}" async></script>
<script src="{{lib_assets('web/js/jquery.gmap.js')}}"></script>
<script>
    jQuery('#google-map').gMap({
        address: 'Melbourne, Australia',
        maptype: 'ROADMAP',
        zoom: 14,
        markers: [
            {
                address: "Melbourne, Australia",
                html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
                icon: {
                    image: "images/icons/map-icon-red.png",
                    iconsize: [32, 39],
                    iconanchor: [32,39]
                }
            }
        ],
        doubleclickzoom: false,
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
        }
    });
    //show_distance
    $('#originInputFindRide').change(function () {
        if ($('#originInputFindRide').val().length > 1 && $('#destinationInputFindRide').val().length > 1) {
            $value = {
                "start": $('#originInputFindRide').val(),
                "end": $('#destinationInputFindRide').val()
            }

            $.ajax({
                url: "/api/location",
                type: "post",
                data: $value,
                success: function (response) {
                    console.log(response);
                    $Json = JSON.parse(response)
                    $('#range').val($Json.rows[0].elements[0].distance.text)
                    $('#intend_time').val($Json.rows[0].elements[0].duration.text)
                    $('#show_distance').text('Estimate : ' + $Json.rows[0].elements[0].distance.text)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            })
        }
    })
    $('#destinationInputFindRide').change(function () {
        if ($('#originInputFindRide').val().length > 1 && $('#destinationInputFindRide').val().length > 1) {
            $value = {
                "start": $('#originInputFindRide').val(),
                "end": $('#destinationInputFindRide').val()
            }

            $.ajax({
                url: "/api/location",
                type: "post",
                data: $value,
                success: function (response) {
                    console.log(response);
                    $Json = JSON.parse(response)
                    $('#range').val($Json.rows[0].elements[0].distance.text)
                    $('#intend_time').val($Json.rows[0].elements[0].duration.text)
                    $('#show_distance').text('estimate : ' + $Json.rows[0].elements[0].distance.text)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            })
        }
    })
    $('#submit').click(function () {
        if ($('#originInputFindRide').val().length > 1 && $('#destinationInputFindRide').val().length > 1) {
            $value = {
                "start": $('#originInputFindRide').val(),
                "end": $('#destinationInputFindRide').val()
            }
            $.ajax({
                url: "/api/location",
                type: "post",
                data: $value,
                success: function (response) {
                    console.log(response);
                    $Json = JSON.parse(response)
                    $('#range').val($Json.rows[0].elements[0].distance.text)
                    $('#intend_time').val($Json.rows[0].elements[0].duration.text)
                    console.log($Json.rows[0].elements[0].distance.text);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            })
        }
    })
    $("#register_create_trip").validate({
        rules: {
            origin_input: {
                required: true
            },
            destination_input: {
                required: true
            },
            start_time: {
                required: true
            },
            number_of_seats: {
                required: true
            }
        }, messages: {
            origin_input: {
                required: 'you cannot skip this field'
            },
            destination_input: {
                required: 'you cannot skip this field'
            },
            start_time: {
                required: 'you cannot skip this field',
            },
            number_of_seats: {
                required: 'you cannot skip this field'
            }
        }
    })
    $(function () {
        $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
    });
</script>
@endsection
