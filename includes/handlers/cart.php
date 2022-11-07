<?php
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });

    $itemId = $_POST['itemId'] ?? null;
    $userID = $_POST['userId']  ?? null;
    $action = $_POST['action']  ?? null;
    
    $res = 0;

    if ($itemId && $action) {
        /*/////////ADD ITEM/////*/
        if ( $action == "add" && $userID) {
            $users = DB::selectByParam("users", "*", "id", $userID);
            if(count($users) > 0) {
                if(count($users) == 1) {
                    $user = $users[0];
                        $res = Cart::addToCart($user, $itemId);
                } else {
                    // more than one user with the same id
                    $res = 4;
                }
            } else {
                //user not found
                $res = 5;
            }
        }

        /*///////DELTETE////////*/
        if ( $action == "delete") {
            $res = DB::deleteItem("cart_items", "id",  $itemId);
        }

    } else {
        // missing data
        $res = 6;
    }

    echo $res;

?>