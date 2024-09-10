document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("editModal");
    var span = document.getElementsByClassName("close")[0];

    document.querySelectorAll('.edit-icon').forEach(function(icon) {
        icon.onclick = function() {
            modal.style.display = "flex";
            modal.classList.add("active"); // Add active class

            document.getElementById("edit-id").value = this.getAttribute("data-id");
            document.getElementById("edit-gender").value = this.getAttribute("data-gender");
            document.getElementById("edit-fname").value = this.getAttribute("data-fname");
            document.getElementById("edit-mname").value = this.getAttribute("data-mname");
            document.getElementById("edit-lname").value = this.getAttribute("data-lname");
            document.getElementById("edit-dob").value = this.getAttribute("data-dob");
            document.getElementById("edit-contact").value = this.getAttribute("data-contact");
            document.getElementById("edit-postal").value = this.getAttribute("data-postal");
            document.getElementById("edit-province").value = this.getAttribute("data-province");
            document.getElementById("edit-municipal").value = this.getAttribute("data-municipal");
            document.getElementById("edit-barangay").value = this.getAttribute("data-barangay");
            document.getElementById("edit-street").value = this.getAttribute("data-street");
            document.getElementById("edit-or").value = this.getAttribute("data-or");
            document.getElementById("edit-uemail").value = this.getAttribute("data-email");
            document.getElementById("edit-locator").value = this.getAttribute("data-locator");
        }
    });

    span.onclick = function() {
        modal.style.display = "none";
        modal.classList.remove("active"); // Remove active class
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modal.classList.remove("active"); // Remove active class
        }
    }
});
