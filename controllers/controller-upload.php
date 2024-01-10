<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/../models/model-upload.php';


$audios = new AudioModel();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $result = $audios->uploadAudio(

        $_FILES["audio"],
        $_POST["audioTitle"],
        $_POST["audioDesc"],
        $_FILES["audioThumb"],
        $_POST["audioCategoryID"]
    );

    if ($result) {
        //echo "File uploaded successfully!";
        include __DIR__ . '/../views/view-success.php';

    } else {
        //echo "Error uploading file.";
        include __DIR__ . '/../views/view-failed.php';
    }
}

$categories = $audios->selectCategory();

        
?>



