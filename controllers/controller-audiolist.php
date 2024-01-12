<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/../models/model-audiolist.php';

$lists = new AudioListModel();

if(isset($_GET['category'])){
    $categoryID = $_GET['category'];
    $audioList = $lists->selectAudios($categoryID);
    // Check if $audioList is empty and handle accordingly
    if ($audioList === false) {
        // Handle database connection error
        echo "Error connecting to the database.";
    } elseif (empty($audioList)) {
        // Handle case when no audio is found for the given category
        echo "No audio found for the selected category.";
    } else {
        // Include the view file with $audioList
        include __DIR__ . '/../views/view-audiolist.php';
    }
}

?>