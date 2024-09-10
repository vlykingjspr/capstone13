document.addEventListener('DOMContentLoaded', function() {
    var viewmodal = document.getElementById("viewModal");
    var span = document.getElementsByClassName("viewclose")[0];

    document.querySelectorAll('.view-icon').forEach(function(icon) {
        icon.onclick = function() {
            viewmodal.style.display = "flex";
            viewmodal.classList.add("active"); // Add active class

            document.getElementById("view-id").value = this.getAttribute("data-id");
            document.getElementById("view-gender").value = this.getAttribute("data-gender");
            document.getElementById("view-fname").value = this.getAttribute("data-fname");
            document.getElementById("view-mname").value = this.getAttribute("data-mname");
            document.getElementById("view-lname").value = this.getAttribute("data-lname");
            document.getElementById("view-dob").value = this.getAttribute("data-dob");
            document.getElementById("view-contact").value = this.getAttribute("data-contact");
            document.getElementById("view-postal").value = this.getAttribute("data-postal");
            document.getElementById("view-province").value = this.getAttribute("data-province");
            document.getElementById("view-municipal").value = this.getAttribute("data-municipal");
            document.getElementById("view-barangay").value = this.getAttribute("data-barangay");
            document.getElementById("view-street").value = this.getAttribute("data-street");
            document.getElementById("view-or").value = this.getAttribute("data-or");
            document.getElementById("edit-locator").value = this.getAttribute("data-locator");
        }
    });

    span.onclick = function() {
        viewmodal.style.display = "none";
        viewmodal.classList.remove("active"); // Remove active class
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            viewmodal.style.display = "none";
            viewmodal.classList.remove("active"); // Remove active class
        }
    }
});
