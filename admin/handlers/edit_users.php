<?php

spl_autoload_register(function ($class_name) {
    include "../../classes/" . $class_name . '.php';
});

    $formArr = json_decode($_POST['formData']);
    $id = $_POST['id'] ?? null;

    $fName = $formArr[0]->value ?? "";
    $lName = $formArr[1]->value ?? "";
    $uName = $formArr[2]->value ?? "";
    $pw = $formArr[3]->value;
    $pWord =  password_hash($pw, PASSWORD_DEFAULT) ?? "";
    $email = $formArr[4]->value ?? "";
    $role_id = $formArr[5]->value ?? "";

    $genreUpdate = 0;
    
  
        $set1 = $fName ? "`fName`='" . $fName . "'" : null;
        $set2 = $lName ?"`lName`='" . $lName . "'" : null;
        $set3 = $uName ? "`userName`='" . $uName . "'" : null; 
        $set4 = $pWord ? "`pWord`='" . $pWord . "'" : null;     
        $set5 = $email ? "`email`='" . $email . "'" : null;    
        $set6 = $role_id ? "`role_id`=" . $role_id : null;

    $setArr = array($set1, $set2, $set3, $set4, $set5, $set6);
    $setArr = array_filter($setArr);
    $udateString = "";

    foreach ($setArr as $set) {
        if ($udateString != "") {
            $udateString .=  ", " . $set;
        } else {
            $udateString .=  $set;
        }
    }

    if (DB::updateItem('users', intval($id), $udateString)) {
        $genreUpdate = 1;
    }
    
    echo $genreUpdate;
?>