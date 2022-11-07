<?php
spl_autoload_register(function ($class_name) {
    include "classes/" . $class_name . '.php';
  });

require_once "includes/partials/header.php";
$default_page = 'pages/front.php';
$page = (isset($_GET['page'])) ? "pages/" . $_GET['page'] . '.php' : $default_page;

if (file_exists($page)) {
    include_once( $page );
} else {
    // not found page
    include_once 'pages/404.php';
}

include "includes/partials/footer.php";

?>