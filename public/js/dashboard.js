const body = document.querySelector("body"),
    sidebar = body.querySelector("nav"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
mainContent = document.querySelector(".main-content");

toggle.addEventListener("click", function () {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
        mainContent.style.marginLeft = "90px"; // 88px for sidebar + 5px gap
    } else {
        mainContent.style.marginLeft = "255px"; // 250px for sidebar + 5px gap
    }
});

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
    } else {
        modeText.innerText = "Dark mode";
    }
    $(".sidebar").fadeOut(400, function () {
        $("#container").width("98%");
    });

    $(".sidebar").fadeIn(400, function () {
        $("#container").width("76%");
    });
});
