<?php

spl_autoload_register(function ($class_name) {
    include "../../classes/" . $class_name . '.php';
});

    $formArr = json_decode($_POST['formData']);
    $id = $_POST['id'] ?? null;

    $title = $formArr[0]->value ?? "";
    $artist = $formArr[1]->value ?? "";
    $text = $formArr[2]->value ?? "";
    $genre_id = $formArr[3]->value ?? "";
    $price = $formArr[4]->value ?? "";
    $year = $formArr[5]->value ?? "";
    //$img = $formArr[6]->value ?? "";
    $amount = $formArr[6]->value ?? "";

     $recordUpdate = 0;
    
        $set1 = $title ? "`title`='" . $title . "'" : null;
        $set2 = $artist ? "`artist`='" . $artist . "'" : null;
        $set3 = $text ? "`text`='" . $text . "'" : null;        
        $set4 = $genre_id ? "`genre_id`=" . $genre_id : null;
        $set5 = $price ? "`price`='" . $price . "'" : null;
        $set6 = $year ?"`year`='" . $year . "'" : null;
       // $set7 = $img ? "`img`='" . $img . "'" : null;        
        $set7 = $amount ? "`amount`=" . $amount : null;

    $setArr = array($set1, $set2, $set3, $set4,$set5, $set6, $set7);
    $udateString = "";

    for ( $i = 0; $i < count($setArr); $i++) {
        if ($udateString != "") {
            $udateString .=  ", " . $setArr[$i];
        } else {
            $udateString .=  $setArr[$i];
        }
    }

     $recordUpdate = DB::updateItem('records', intval($id), $udateString);
    
    
    echo $recordUpdate;

?>