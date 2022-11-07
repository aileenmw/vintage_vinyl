<?php
    include 'includes/partials/aside.php';

    $userId = $_SESSION['user_id'] ?? null;
    $records = Record::recordsJoinGenre(30, "price");

    $dir = "assets/img/records/";

    echo '<h2 class="genre_h">Tilbudene gælder resten af ugen ! </h2>';
    echo '<div class="display offers">';
    
    foreach ($records as $record) {
        echo "<div class='box'>";
        echo "<div class='info'>";
        echo "<img src='" . $dir . $record->name . "/" . $record->img . "'>";
        echo "<h5>" . $record->artist . "</h5>";
        echo "<p class='title'>" . $record->title ." (" . $record->year . ")" . "</p>";
        echo "<p>" . substr($record->text, 0, 100) . "</p>";
        echo "</div>";
        echo "<div class='buy'>";
        echo $record->price;
        if ($userId) {
            echo "<img id='" . $record->record_id ."' onclick='addToCart(this, " . $userId . ")' src='assets/img/cart.png' class='cart'>";
        } else {
            echo "<img id='" . $record->record_id ."' onclick='addToCart(this)' src='assets/img/cart.png' class='cart'>";
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
?>