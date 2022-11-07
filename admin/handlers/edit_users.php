<?php

spl_autoload_register(function ($class_name) {
    include "../../classes/" . $class_name . '.php';
});

    $formArr = json_decode($_POST['formData']);
    $id = $_POST['id'] ?? null;

    $fName = $formArr[0]->value ?? "";
    $lName = $formArr[1]->value ?? "";
    $email = $formArr[2]->value ?? "";
    $role_id = $formArr[3]->value ?? "";

     $genreUpdate = 0;
    
  
        $set1 = $fName ? "`fName`='" . $fName . "'" : null;
        $set2 = $lName ?"`lName`='" . $lName . "'" : null;
        $set3 = $email ? "`email`='" . $email . "'" : null;        
        $set4 = $role_id ? "`role_id`=" . $role_id : "`role_id`=" . 3;

    $setArr = array($set1, $set2, $set3, $set4);
    $udateString = "";

    for ( $i = 0; $i < count($setArr); $i++) {
        if ($udateString != "") {
            $udateString .=  ", " . $setArr[$i];
        } else {
            $udateString .=  $setArr[$i];
        }
    }

     $genreUpdate = DB::updateItem('users', intval($id), $udateString);
    
    
    echo $genreUpdate;

?>