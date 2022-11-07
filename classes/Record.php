<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
  });

class Record {

    static function createRecord(string $title, string $artist, string $description, int $genre_id, float $price, int $year, string $img, int $amount) {

       $pdo = DB::pdo_connect();
       
       $title= DB::cleanString($title);
       $artist= DB::cleanString($artist);
       $description= DB::cleanString($description);
       $img= DB::cleanString($img);

       $stmt = $pdo->prepare("INSERT INTO records (`title`, `artist`, `text`, `genre_id`, `price`, `year`, `img`, `amount`) VALUES (?,?,?,?,?,?,?,?)");
       if ( $stmt->execute([$title, $artist, $description, $genre_id, $price, $year, $img, $amount])) {
            return 1;
       } else {
            return 0;
       }
    }

    public static  function recordsJoinGenre( $limit = null, $orderBy = "", $desc = false){

        if ($limit) {
            $limit = "LIMIT " . $limit;
        } else {
            $limit = "";
        }

        if ($orderBy != "") {
            $orderBy = $desc == true ? "ORDER BY " . $orderBy . " DESC" : "ORDER BY " . $orderBy;
        } else {
            $orderBy = "";
        }

        $pdo = DB::pdo_connect();
        $sql = "SELECT records.id as record_id, `title`,`artist`,`text`,`genre_id`,`price`, `year`,`img`,`amount`, genres.id as genre_id, name , displayName FROM `records` 
        INNER JOIN genres ON records.genre_id = genres.id $orderBy $limit";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $objects = $stmt->fetchAll();

        $pdo = null;

        return $objects;

    }

}