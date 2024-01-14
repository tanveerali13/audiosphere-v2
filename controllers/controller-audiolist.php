<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/../models/model-audiolist.php';
include __DIR__ . '/../_includes/config.php';

$connectionObject = new ConnectionObject(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database']
);

$lists = new AudioListModel($connectionObject);

if (isset($_GET['category'])) {
    $categoryID = $_GET['category'];
    $audioList = $lists->selectAudios($categoryID);

    if ($audioList === false) {
        echo "Error connecting to the database.";
    } elseif (empty($audioList)) {
        echo "No audio found for the selected category.";
    } else {
        include __DIR__ . '/../views/view-audiolist.php';
    }
}

if (isset($_GET['audioID'])) {
    $audioID = $_GET['audioID'];
    $audio = $lists->selectToPlay($audioID);

    if ($audio === false) {
        echo "Error connecting to the database.";
    } elseif (empty($audio)) {
        echo "No audio found for the selected ID.";
    } else {
        include __DIR__ . '/../views/view-player.php';
    }
}

?>
