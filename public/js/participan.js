document.addEventListener("DOMContentLoaded", function () {
    const checkinBtn = document.getElementById("checkinBtn");
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const snap = document.getElementById("snap");
    const savePhoto = document.getElementById("savePhoto");
    let context = canvas.getContext("2d");
    let localStream = null;
    

    checkinBtn.addEventListener("click", function () {
        $("#cameraModal").modal("show");
        navigator.mediaDevices
            .getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
                localStream = stream;
            })
            .catch(function (err) {
                console.log("An error occurred: " + err);
            });
    });

    snap.addEventListener("click", function () {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        // Show the canvas (optional, for visual confirmation)
        canvas.style.display = "block";
    });

    savePhoto.addEventListener("click", function () {
        const dataURL = canvas.toDataURL("image/png");
        console.log(dataURL); // You can send this to your server using AJAX

        // Example AJAX request (assuming jQuery is available)
        $.ajax({
            type: "POST",
            url: "/save-photo", // Your endpoint to handle the saving of the photo
            data: {
                image: dataURL,
                _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token for Laravel
            },
            success: function (response) {
                console.log("Photo saved successfully:", response);
                $("#cameraModal").modal("hide");
                if (localStream) {
                    localStream.getTracks().forEach((track) => track.stop());
                }
            },
            error: function (error) {
                console.error("Error saving photo:", error);
            },
        });
    });

    $("#cameraModal").on("hidden.bs.modal", function () {
        if (localStream) {
            localStream.getTracks().forEach((track) => track.stop());
        }
    });
});

