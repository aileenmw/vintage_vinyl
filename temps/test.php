<?php

echo "<br/><br/><br/><br/><br/><br/>";
include "includes/db/db_pdo.php";


DB::selectByParam('records', 'title', 'genre_id', '1');