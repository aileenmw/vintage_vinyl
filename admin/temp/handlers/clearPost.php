<?php
    if ( $_POST['clearPostData'] == 1) {
        $_POST = [];
        // unset($_POST);
        print_r($_POST);
        } else {
            echo "no go !";
        }
    
?>