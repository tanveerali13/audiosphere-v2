<?php

ini_set('display_errors', 1);
include_once __DIR__ . '/../models/model-homesliders.php';
include __DIR__ . '/../_includes/config.php';

$connectionObject = new ConnectionObject(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database']
);

$homeSliders = new HomeSliders($connectionObject);
$homeSliders->connect();

$categories = $homeSliders->getAllCategories();

?>
