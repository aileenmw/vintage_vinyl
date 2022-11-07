<?php
include 'includes/partials/aside.php';

$genre = $_GET['genre'] ?? "various";
$genreId = $_GET['id'] ?? 7; // genre no. 7 is 'various'
$userId = $_SESSION['user_id'] ?? null;

$records = DB::selectByParam("records", "*", "genre_id", $genreId);

$dir = "assets/img/records/".$genre."/";
if($genre == 'r_n_b'){
    $genre = 'R\'n\'B';
}
 echo '<h2 class="genre_h">'.$genre.'</h2>';
 echo '<div class="display">';

foreach ($records as $record) {
    echo "<div class='box'>";
    echo "<div class='info'>";
    echo "<img src='" . $dir . $record->img . "'>";
    echo "<h5>" . $record->artist . "</h5>";
    echo "<p class='title'>" . $record->title ." (" . $record->year . ")" . "</p>";
    echo "<p>" . substr($record->text, 0, 100) . "</p>";
    echo "</div>";
    echo "<div class='buy'>";
    echo $record->price;
    if ($userId) {
        echo "<img id='" . $record->id ."' onclick='addToCart(this, " . $userId . ")' src='assets/img/cart.png' class='cart'>";
    } else {
        echo "<img id='" . $record->id ."' onclick='addToCart(this)' src='assets/img/cart.png' class='cart'>";
    }
    echo '</div>';
    echo '</div>';
}
echo "</div>";

?>
