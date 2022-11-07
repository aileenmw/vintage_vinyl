<?php 
    $genres = DB::selectValuesFromTable("genres", "*" );
?>
<div class="aside_frame">
    <div class="aside">
        <ul>
        <?php
            foreach( $genres as $genr) {
                echo "<a href='index.php?page=genre&id=" . $genr->id . "&genre=" . $genr->name . "'><li>" . $genr->displayName . "</li></a>";
            }
        ?>
        </ul>
    </div>
</div>