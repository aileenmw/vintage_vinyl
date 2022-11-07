<?php

$message = 'Log ind og bestil løs';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
       $message = 'Ufyld venligst alle felter';
        
    } else {
        $message = 'Vær så god at komme indenfor';
        // Remove HTML tags from string
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        //sql injection ..Escapes special characters in a string for use in an SQL statement ( json\'s)
        $username = $mysqli->real_escape_string($username);
        
        $sql = " SELECT `user_id`, `username`, `email`,  `password`, `role` FROM `bil_bixen_users` 
        INNER JOIN bil_bixen_role ON
        bil_bixen_users.role_id = bil_bixen_role.id
        WHERE `email` = '$username' ";

        $result = $mysqli->query($sql);
        $user = false;

        if ($result->num_rows > 0) {

            $user = $result->fetch_object();
            $role = $user->role;

            // password tjek    
            $db_password = $user->password;
            $valid = password_verify($password, $db_password);

            if ($valid) {
                // opret session & redirect
                $_SESSION['logget'] = true;
                $_SESSION['role'] = $role;
                $_SESSION['username'] = $user->username;
                $_SESSION['user_id'] = $user->user_id;

                if ($_SESSION['role'] == 'forhandler') {
                    header('Location: index.php');

                    exit;
                } elseif ($_SESSION['role'] == 'admin') {
                    header('Location: admin/index.php');
                    echo $_SESSION['role'] = $role;
                    echo $_SESSION['username'] = $user->username;
                }
            } else {
                // invalid user...
                $message = 'Logindata er ikke valid';
            }
        }
    }
}
?> 
<div class="form_wrapper">
<!--    admin : admin@admin.dk, 1234<br>
    forhandler : mail@mail.dk, 1234-->

    <form action=""  class="form login" method="post">
        <h1 class="form_h1"><?php echo $message; ?></h1>
        <input type="email" name="username" placeholder="brugernavn"><br>
        <input type="text" name="password" placeholder="Indtast Kodeord"><br>
        <input class="checkbox" type="checkbox" name="forgot_password" value="Forgot password">Glemt kodeord<br>
        <input type="submit" name="submit" value="Login" class="submit"><br>
        <a href="index.php?page=register" style="color: #fff;" id="registrer">Er du ny? Bliv registreret her</a>
    </form>

</div
