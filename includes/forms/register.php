<?php

$msg = 'Registrer dig og bestil din første LP i dag!!';

if ( isset($_POST['submit'])) {

    $values = "`fName`,`lName`,`userName`,`pWord`,`email`";

    $fName = $_POST['fname'] ?? "" ;
    $lName = $_POST['lname'] ?? "" ;
    $uName = $_POST['uname'] ?? "" ;
    $email = $_POST['email'] ?? "" ;
    $pw = $_POST['password'] ?? "" ;

    if ( empty(DB::selectByParam('users', $values, 'userName',  $_POST['uname']))) {
       if (User::createUser($fName, $lName, $uName, $pw, $email)) {
        $_POST = array();
        ?>
        <script>
             swal("Tak for at du har oprettet dig som bruger", {
                icon: "info",
            }).then((willLogin) => {
                if (willLogin) {
                window.location.href = "index.php?page=form&form=login";
                }
            });
        </script>
        <?php
       }
    } else if ( !empty(DB::selectByParam( 'users', $values, 'userName',  $_POST['uname']))) {
        ?>
        <script>
             swal("Der eksisterer allerede en bruger med dette brugernavn", {
                icon: "error",
            });
        </script>
        <?php
    } else {
        ?>
        <script>
             swal("Øv! Noget gik galt!", {
                icon: "error",
            });
        </script>
        <?php
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
        <input type="text" id="pw1" name="password" placeholder="Indtast Kodeord" required><br>        
        <input type="text" id="pw2" onfocusout="registerPwCheck()" name="rr" placeholder="Gentag Kodeord" required><br>
        <input type="submit" onfocusin="registerPwCheck()" name="submit" value="Opret" class="submit"><br>
    </form>
</div>
<script>
    function registerPwCheck() {
        var pw1 = $("#pw1").val();
        var pw2 = $("#pw2").val();
        if(pw1 != pw2) {
            swal({
                icon: 'error',
                title: 'Ups..',
                text: 'Indtastede passwords er ikke ens',
            })
        }
    }
</script>