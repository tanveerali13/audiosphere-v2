function displayThumbnail() {
  var input = document.getElementById("thumbnailInput");
  var preview = document.getElementById("thumbnailPreview");

  var file = input.files[0];
  var reader = new FileReader();

  reader.onload = function (e) {
    preview.src = e.target.result;
  };

  reader.readAsDataURL(file);
}

// console.log("script.js is loaded");

const toggle = document.getElementById("modeToggle");

toggle.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark-mode");
    logo.src = "../assets/images/audioSphere_logo_dark_mode.png";

    console.log("Dark mode is enabled");
  } else {
    document.body.classList.remove("dark-mode");
    logo.src = "../assets/images/audioSphere_logo_light_mode.png";
    console.log("Dark mode is not enabled");
  }
});
