<?php

    spl_autoload_register(function ($class_name) {
        include "../classes/" . $class_name . '.php';
    });

    $table = $_POST["table"] ?? null;
    $id = $_POST["id"] ?? null;

    $obj = DB::selectByParam($table, "*", "id", $id);

?>
<div class="form_wrapper">
    <form action=""  class="form register" method="post">
        <h1 class="form_h1"><?php echo $msg; ?></h1>
        <input type="text" name="fname" placeholder="Fornavn"><br>
        <input type="text" name="lname" placeholder="Efternavn"><br>
        <input type="text" name="uname" placeholder="Brugernavn" required><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="text" name="password" placeholder="Indtast Kodeord" required><br>        
        <input type="text" name="rr" placeholder="Gentag Kodeord" required><br>
        <input type="submit" name="submit" value="Opret" class="submit"><br>
    </form>
</div>