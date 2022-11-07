<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . "/vintage_vinyl";
// parent dir : dirname(__DIR__);
// file die:  dirname(__FILE__);

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/vintage_vinyl/classes/" . $class_name . '.php';
  });

$action = $_GET['action'] ?? null;

$title = $_POST['title']  ?? "";
$artist = $_POST['artist']  ?? "";
$text = $_POST['text']  ?? "";
$genre_id = $_POST['genre_id']  ?? 1;
$price = $_POST['price']  ?? 0.0;
$year = $_POST['year']  ?? 0000;
$img = $_POST['img']  ?? "";
$amount = $_POST['amount']  ?? 0;

$ok = $_SERVER['SERVER_NAME'] . "/vintage_vinyl/index.php?page=admin&return=1";
$notOk = $_SERVER['SERVER_NAME'] . "/vintage_vinyl/index.php?page=admin&return=1";

if($action && $action == "create") {
    if (Record::createRecord( $title, $artist, $text, $genre_id, $price, $year, $img, $amount)) {
        echo "yay";
        header("Location: ../../index.php?page=admin&return=1");
    } else {
        header("Location: ../../index.php?page=admin&return=0");
    }
}


