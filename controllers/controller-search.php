<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/../models/model-search.php';

$search = new SearchModel();
$search->selectAudioTitles();
$categories = $search->selectCategory();


?>