<?php
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });
 
    $imgErr = "";
    $res = 0;

    if(count($_POST) > 0) {

        $id = $_POST['id'];
        $oldGenre_ids =  DB::selectByParam("records", "genre_id", "id", $id );
        $oldGenre_id = $oldGenre_ids[0]->genre_id;
        $genre_id = $_POST["genre"] ? $_POST["genre"] : $oldGenre_id;
        $imfName = $_FILES["fileToUpload"]["name"] ?? null;

        $recordUpdate = [];
        $imgName = null;

        if ($imfName && $genre_id) {
            $imgRes = Image::imgValidation($imfName, $genre_id);
            if ( $imgRes[0] == 1 && count($imgRes) == 2 ){
                $imgName = $imgRes[1] ?? null;
            } elseif(count($imgRes) > 0) {
                $imgErr = implode(",", $imgRes);
           }
        }

        if ($imgErr != "") {
            header("location: ../../index.php?page=admin&record_edited=0&imgErr=" . $imgErr);
        } else {

        $recordUpdate[] = $_POST["title"] ? "title='" . $_POST["title"] . "'" : null;
        $recordUpdate[] =  $_POST["artist"] ? "artist='" . $_POST["artist"] . "'" : null;
        $recordUpdate[] = $_POST["description"] ? "description='" . $_POST["description"] . "'" : null;
        
        $recordUpdate[] = $_POST["price"] ? "price=" . $_POST["price"] : null; 
        $recordUpdate[] = $_POST["year"] ? "year=" . $_POST["year"] : null; 
        $recordUpdate[] = $imgName ? "img='" . $imgName ."'" : null; 
        $recordUpdate[] = $_POST["amount"] ? "amount=" . $_POST["amount"] : null; 

        $recordUpdate = array_filter($recordUpdate);
        $updateStr = implode(",", $recordUpdate);
    
        if($updateStr != "" ) {
            $res = DB::updateItem("records", $id, $updateStr);
        }

        header("location: ../../index.php?page=admin&recErr=" . $res);
    } 
}

?>