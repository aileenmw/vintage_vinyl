<?php
    spl_autoload_register(function ($class_name) {
        include "../classes/" . $class_name . '.php';
    });
  
    $table = $_POST["table"] ?? null;
    $id = $_POST["id"] ?? null;

    // if ( DB::deleteItem($table, "id", $id)) {
    //     $res = 1;
    // } else {
    //     $res = 0;
    // }

    echo DB::deleteItem($table, "id", $id);
    // echo $res;
?>