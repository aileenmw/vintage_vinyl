<?php

$msg = 'Registrer dig og bestil din første LP i dag!!';

if ( isset($_POST['submit'])) {

    $values = "`fName`,`lName`,`userName`,`pWord`,`email`";

    $fName = $_POST['fname'] ?? "" ;
    $lName = $_POST['lname'] ?? "" ;
    $uName = $_POST['uname'] ?? "" ;
    $email = $_POST['email'] ?? "" ;
    $pw = $_POST['password'] ?? "" ;

    if ( empty(DB::selectByParam( 'users', $values, 'userName',  $_POST['uname']))) {
       if (User::createUser($fName, $lName, $uName, $pw, $email, 3)) {
        $msg = "Tak for at du har oprettet dig som bruger";
       }
    } else if ( !empty(DB::selectByParam( 'users', $values, 'userName',  $_POST['uname']))) {
        $msg = "Der eksisterer allerede en bruger med dette brugernavn";
    } else {
        $msg = "Øv! Noget gik galt!";
    };
}

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
<button>Button</button>