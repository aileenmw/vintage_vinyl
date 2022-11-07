  <?php
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });
 
    $imgErr = "";
    $res = 0;



    if(count($_POST) > 0) {
        

        $imfName = $_FILES["fileToUpload"]["name"] ?? null;
        $genre_id = $_POST["genre"] ?? 7;
        
        if ($imfName && $genre_id) {
          
            $imgRes = Image::imgValidation($imfName, $genre_id);

            if ( $imgRes[0] == 1 && count($imgRes) == 2 ){
                $imgName = $imgRes[1];

                $title = $_POST["title_create"] ?? "";
                $artist = $_POST["artist"] ?? "";
                $description = $_POST["description_create"] ?? "";
                
                $price = $_POST["price_create"] ?? 0.1;
                $year = $_POST["year_create"] ?? 1000;
                $img = $imgName ?? "";
                $amount = $_POST["amount_create"] ?? 0;
            
                $res = Record::createRecord($title,$artist, $description, $genre_id, $price, $year, $img, $amount);
            } elseif(count($imgRes) > 0) {
                 $imgErr = implode(",", $imgRes);
            }
        }
         header("location: ../../index.php?page=admin&recErr=" . $res . "&imgErr=" . $imgErr);
    } else {
        header("location: ../../index.php?page=admin&record_created=0");
    }
?>