// Get modal element
var modal = document.getElementById("fishworkerModal");

// Get open modal button
var openModalBtn = document.getElementById("openModalBtn");

// Get close button
var closeBtn = document.getElementsByClassName("close")[0];

// Listen for open click
openModalBtn.onclick = function() {
  modal.style.display = "block";
}

// Listen for close click
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// Listen for outside click
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}