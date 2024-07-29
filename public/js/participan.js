document.addEventListener("DOMContentLoaded", function () {
    const userName = document.getElementById("userData").dataset.username;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    function showPosition(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        const map = L.map("map").setView([lat, lon], 13);
        var marker = L.marker([lat, lon]).addTo(map);
        document.getElementById(
            "location"
        ).value = `Latitude: ${lat}, Longitude: ${lon}`;
        var googleStreets = L.tileLayer(
            "http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}",
            {
                maxZoom: 20,
                subdomains: ["mt0", "mt1", "mt2", "mt3"],
            }
        ).addTo(map);
        var popup = L.popup();

        function onMapClick(e) {
            popup.setLatLng(e.latlng).setContent(userName).openOn(map);
        }

        map.on("click", onMapClick);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }

    $(document).ready(function () {
        Webcam.set({
            width: 400,
            height: 300,
            image_format: "jpeg",
            jpeg_quality: 90,
        });

        Webcam.attach("#webcam");

        // Event handler to ensure Webcam.js is ready
        Webcam.on("load", function () {
            console.log("Webcam is ready!");

            // Set up click handler for capture button
            $("#takecapture").click(function (e) {
                Webcam.snap(function (uri) {
                    image = uri;
                });
                var location = $("#location").val();
                var csrfToken = $('meta[name="csrf-token"]').attr("content");
                $.ajax({
                    type: "POST",
                    url: "/dashboard/store",
                    data: {
                        _token: csrfToken,
                        image: image,
                        location: location,
                    },
                    cache: false,
                    success: function (response) {
                      var statusPopup= response.split("|");
                        if (statusPopup[0] == "success") {
                            Swal.fire({
                                title: "ABSEN SUCCESS",
                                text:statusPopup[1],
                                icon: "success",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/dashboard/";
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Maaf Gagal Absen, Silahkan Hubungi Admin",
                                icon: "error",
                            });
                        }
                    },
                });
            });
        });

        Webcam.on("error", function (err) {
            console.log("Webcam error:", err);
        });
    });
});
