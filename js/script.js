
function displayThumbnail() {
    var input = document.getElementById('thumbnailInput');
    var preview = document.getElementById('thumbnailPreview');

    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result;
    };

    reader.readAsDataURL(file);
}


function uploadFile() {
    var form = document.getElementById('uploadForm');
    var fileInput = document.getElementById('audio');
    var progressBar = document.getElementById('uploadProgress');
    var statusDiv = document.getElementById('status');

    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();

    // Track progress
    xhr.upload.addEventListener("progress", function(event) {
        if (event.lengthComputable) {
            var percentComplete = (event.loaded / event.total) * 100;
            progressBar.value = percentComplete;
            statusDiv.innerHTML = Math.round(percentComplete) + "% uploaded";
        }
    }, false);

    // Handle completion
    xhr.onload = function() {
        if (xhr.status === 200) {
            statusDiv.innerHTML = xhr.responseText;
        } else {
            statusDiv.innerHTML = 'Error uploading file.';
        }
    };

    // Open and send the request
    xhr.open("POST", "upload.php", true);
    xhr.send(formData);
}

// console.log("script.js is loaded");

const toggle = document.getElementById("modeToggle");

toggle.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark-mode");
    console.log("Dark mode is enabled");
  } else {
    document.body.classList.remove("dark-mode");
    console.log("Dark mode is not enabled");
  }
});

