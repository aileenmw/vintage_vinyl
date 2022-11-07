<?php

$message = 'Log ind og bestil løs';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
       $message = 'Ufyld venligst alle felter'; 
    } else {
        $loginReturn = DB::login( $username, $password);
        if ($loginReturn == 0) {
            $message = "Brugeren findes ikke.<br> 
            Registrér dig <a href='index.php?page=form&form=register' style='color: #666;' id='registrer'> her</a>";
        } 
        if ($loginReturn == 2) {
            $message = "Brugerdata er ikke korrekt. Prøv igen eller registrér dig 
            <a href='index.php?page=form&form=register' style='color: #666;' id='registrer'> her</a>";
        }
        if ($loginReturn == 1) {
           echo "<script>window.location.href='index.php';</script>";
        }
    }
}
?> 
<form action=""  class="form login" method="post">
    <h1 class="form_h1"><?php echo $message; ?></h1>
    <input type="text" name="username" placeholder="brugernavn"><br>
    <input type="text" name="password" placeholder="Indtast Kodeord"><br>
    <input class="checkbox" type="checkbox" name="forgot_password" value="Forgot password">Glemt kodeord<br>
    <input type="submit" name="submit" value="Login" class="submit"><br>
    <a href="index.php?page=form&form=register" style="color: #fff;" id="registrer">Er du ny? Bliv registreret her</a>
</form>