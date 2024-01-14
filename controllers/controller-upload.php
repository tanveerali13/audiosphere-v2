<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once __DIR__ . '/../models/model-upload.php';
include __DIR__ . '/../_includes/config.php';

$connectionObject = new ConnectionObject(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database']
);

$audios = new AudioModel($connectionObject);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $audios->uploadAudio(
        $_FILES["audio"],
        $_POST["audioTitle"],
        $_POST["audioDesc"],
        $_FILES["audioThumb"],
        $_POST["audioUserID"],
        $_POST["audioCategoryID"]
    );

    if ($result) {
        include __DIR__ . '/../views/view-success.php';
    } else {
        include __DIR__ . '/../views/view-failed.php';
    }
}

$categories = $audios->showCategories();

?>
