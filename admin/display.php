<?php

    spl_autoload_register(function ($class_name) {
        include "../classes/" . $class_name . '.php';
    });

    if (isset($_POST["table"] )) {
        $objects = DB::selectValuesFromTable($_POST["table"] , '*') ?? array();
    } 
?>
<container>
    <h3><?=ucfirst($_POST["table"])?></h3>
    <table class="table table-condensed">
        <thead class="thead-dark">
            <tr>
            <?php
                foreach ($objects[0] as $key=>$value) {
                    if ($key == "pWord") {

                    } else {
                        echo "<th>" . $key . "</th>";
                        echo "<th></th>";
                    }
                }            
                echo "<th></th><th></th>";
            ?>
            </tr>
        </thead>
        <tbody>        
            <?php
                 foreach ($objects as $obj) {
                    echo "<tr>";
                        foreach ($obj as $key=>$value) {
                            if ($key == "text") {
                                echo "<td class='cell overflow'>" . substr($value, 0, 30) . "<td/>";
                            } elseif ($key == "pWord") {
                            } else {
                               echo "<td class='cell'>" . $value . "<td/>";
                            }
                        }
                        echo "<td><button action=edit_" . $_POST["table"] .  " onclick='getEditForm(this)' id=" . $obj->id . " class='btn btn-primary edit'>Edit</button></td>";
                        echo "<td><button type=" . $_POST["table"] .  " onclick=deleteItem(this) id=" . $obj->id . " class='btn btn-danger'>Delete</button></td>";
                    echo "</tr>";
                }
            ?>        
        </tbody>
    </table>
</container>