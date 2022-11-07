<?php

$table = $_GET["table"]  ?? "genres";

$objects = DB::selectValuesFromTable( $table, '*');
?>
<h3>Medarbejdere</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <?php
            foreach ($objects[0] as $key=>$value) {
                echo "<th>" . $key . "</th>";
                echo "<th></th>";
            }
        ?>
        </tr>
    </thead>
    <tbody>        
        <?php
            foreach ($objects as $obj) {
                
                echo "<tr>";
                  foreach ($obj as $key=>$value) {
                     echo "<td>" . $value . "<td/>";
                 }
                echo "</tr>";
            }
        ?>        
    </tbody>
</table>