function toggleDropdown() {
    var dropdown = document.getElementById("dropdown-prof");
    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.closest('.profile-menu')) {
        var dropdown = document.getElementById("dropdown-prof");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
}