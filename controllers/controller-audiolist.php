<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/../models/model-audiolist.php';

$lists = new AudioListModel();

if(isset($_GET['category'])){
    $categoryID = $_GET['category'];
    $lists->selectAudios($categoryID);
    include __DIR__ . '/../views/view-audiolist.php';
}

?>