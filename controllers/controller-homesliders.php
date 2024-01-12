<?php

    ini_set('display_errors', 1);
    include_once __DIR__ . '/../models/model-homesliders.php';

    $homeSliders = new HomeSliders();
    $homeSliders->connect();

    $categories = $homeSliders->getAllCategories();

?>