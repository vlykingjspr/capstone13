document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("editModal");
    var span = document.getElementsByClassName("close")[0];

    document.querySelectorAll('.edit-icon').forEach(function(icon) {
        icon.onclick = function() {
            modal.style.display = "flex";
            modal.classList.add("active");

            document.getElementById("edit-id").value = this.getAttribute("data-id");
            document.getElementById("edit-gender").value = this.getAttribute("data-gender");
            document.getElementById("edit-fname").value = this.getAttribute("data-fname");
            document.getElementById("edit-mname").value = this.getAttribute("data-mname");
            document.getElementById("edit-lname").value = this.getAttribute("data-lname");
            document.getElementById("edit-dob").value = this.getAttribute("data-dob");
            document.getElementById("edit-province").value = this.getAttribute("data-province");
            document.getElementById("edit-municipal").value = this.getAttribute("data-municipal");
            document.getElementById("edit-barangay").value = this.getAttribute("data-barangay");
            document.getElementById("edit-street").value = this.getAttribute("data-street");
            document.getElementById("edit-or").value = this.getAttribute("data-or");
            document.getElementById("edit-type").value = this.getAttribute("data-type");
            document.getElementById("edit-email").value = this.getAttribute("data-email");
        }
    });

    span.onclick = function() {
        modal.style.display = "none";
        modal.classList.remove("active");
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modal.classList.remove("active");
        }
    }
});

