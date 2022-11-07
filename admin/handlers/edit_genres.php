<?php

spl_autoload_register(function ($class_name) {
    include "../../classes/" . $class_name . '.php';
});

    $formArr = json_decode($_POST['formData']);
    $id = intval($_POST['id']) ?? null;

     $genreUpdate = 0;
     $set1 = "";
     $set2 = "";
    
     if( $formArr[0]->value != "") {
        $set1 = "`name`='" . $formArr[0]->value . "'";
     }
     if( $formArr[1]->value != "") {
        $set2 = "`displayName`='" . $formArr[1]->value . "'";
     }

     if ($set1 != "" || $set2 != ""){
        if ($set1 != "" && $set2 != "") {
            $udateString = $set1 . "," . $set2;
        } elseif ($set1 == "" && $set2 == "") {
            $udateString = "";
        } else {
            $udateString = $set1 . $set2;
        }

        $genreUpdate = DB::updateItem('genres', $id, $udateString);
    }
    
    echo $genreUpdate;

?>