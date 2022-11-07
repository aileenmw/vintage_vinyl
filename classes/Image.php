<?php

require_once "DB.php";

class Image {
    public static $errorArr = [
      1=>"Upload lykkedes",
      2=>"Dette billede er allerede blevet uploadet.",
      3=>"Din fil er for stor.",
      4=>"Kun JPG-, JPEG-, PNG- og GIF-filer er tilladt.",
      5=>"Beklager, der opstod en fejl under upload af din fil.",
      6=>"Filen er ikke et billede."
    ];

    public static  function imgValidation ($fileUpload, $genreId) {

        //get genrename by id
        $genreData = DB::selectByParam("genres", "*", "id", $genreId);
        $genre = $genreData[0]->name ?? "various";
        $target_dir = "../../assets/img/records/" . $genre . "/";
        
        $target_file = $target_dir . basename($fileUpload);
        $uploadVal = [];
      
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]) ?? null;
            if($check !== null) {
              if (file_exists($target_file)) {
                $uploadVal[] = 2;
              }
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                $uploadVal[] = 3;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                $uploadVal[] = 4;
              }
              // Check if $uploadVal is set to 0 by an error
              if (count($uploadVal) == 0) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  $uploadVal[] = 1;
                  $uploadVal[] = basename($fileUpload);
                } else {
                 $uploadVal[] = 5;
                }
              }
            } else {
                $uploadVal[] = 6;
            }

            return $uploadVal;
    }

}