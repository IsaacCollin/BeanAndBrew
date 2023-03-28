navigator.geolocation.getCurrentPosition(function (position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    // Send the location data to the Laravel controller
    $.ajax({
        url: "/weather",
        type: "POST",
        data: {
            lat: lat,
            lng: lng,
            _token: "{{ csrf_token() }}",
        },
        success: function (response) {
            // Display the weather data on the page
            $("#weather").html(response);
        },
    });
});
