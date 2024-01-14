<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once __DIR__ . '/../models/model-search.php';
include __DIR__ . '/../_includes/config.php';

$connectionObject = new ConnectionObject(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database']
);

$search = new SearchModel($connectionObject);
$search->selectAudioTitles();
$categories = $search->selectCategory();

?>
