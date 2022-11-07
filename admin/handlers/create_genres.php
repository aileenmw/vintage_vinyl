    
<?php
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });

    $formArr = json_decode($_POST['formData']);

    $res = 0;
    
    $name = $formArr[0]->value ?? "";
    $display_name = $formArr[1]->value ?? "";

    $pdo = DB::pdo_connect();
    $stmt = $pdo->prepare("INSERT INTO `genres`( `name`, `displayName`) VALUES (?, ?)");

    if ($stmt->execute([$name, $display_name])) {
        $pdo = null;
        $_POST = [];
        $res = 1;
    } 
    
    echo $res;

?>