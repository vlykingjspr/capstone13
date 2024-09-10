const inputfile = document.getElementById("input-file");
const imageView1 = document.getElementById("img-prev1");
const imageView2 = document.getElementById("img-prev2");
const dropArea = document.getElementById("drop-area");

inputfile.addEventListener('change', function() {
    const file = inputfile.files[0];
    if (file) {
        const imageUrl = URL.createObjectURL(file);
        imageView1.src = imageUrl;
        imageView2.src = imageUrl;
    }
});

