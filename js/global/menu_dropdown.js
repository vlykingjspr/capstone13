document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector('.dropdown');
    dropdown.addEventListener('mouseover', function() {
        var content = this.querySelector('.dropdown-content');
        content.style.display = 'block';
    });

    dropdown.addEventListener('mouseout', function() {
        var content = this.querySelector('.dropdown-content');
        content.style.display = 'none';
    });
});