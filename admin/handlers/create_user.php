    
<?php
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });

    $formArr = json_decode($_POST['formData']);


    $fName = $formArr[0]->value ?? "";
    $lName = $formArr[1]->value ?? "";
    $userName = $formArr[2]->value ?? "";
    $pWord = $formArr[3]->value ?? "";
    $email = $formArr[4]->value ?? "";
    $role_id = $formArr[5]->value ?? "";

    $resUser = User::createUser($fName,$lName, $userName, $pWord, $email, $role_id) ?? null;

    echo $resUser;
    
?>