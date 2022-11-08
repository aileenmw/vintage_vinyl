<?php 

    $root = dirname( __DIR__ );
    $root = str_replace('\\', '/', $root);
    include $root . "/session.php";

    $logged = $_SESSION['logged'] ?? null;
    $role = $_SESSION['role'] ?? null;
    $user = $_SESSION['username'] ?? null;
    $userId = $_SESSION['user_id'] ?? null;

    $cartCount = $userId != null ? Cart::cartItems($userId, true) : 0;

?>
<!DOCTYPE html>
<head>
    <title>Vintage Vinyl Online</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="http://amw.nu/vintage_vinyl/assets/img/favicon_record.png">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Grand+Hotel|Molle:400i|Niconne|Yesteryear" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi|Lobster|Righteous|Staatliches" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <!-- <script src="SweetAlert.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

  
    <script src="assets/js/script.js"></script>
</head>
<body id='body'>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <image src="assets/img/record.png" alt="record" title="home">
                </a>
            </div>
            <ul>
                <a href="index.php?page=new_items">
                    <li>Friskt på hylderne</li>
                </a>
                <a href="index.php?page=offers">
                    <li>Pst..ugens bargain!</li>
                </a>
                <a href="index.php?page=news">
                    <li>VV News og Events</li>
                </a>
                <a href="index.php?page=contact">
                    <li>Spørg løs, vi ved alt..næsten</li>
                </a>
                <?php
                if ($logged) {
                    ?>
                    <a id="logout">
                        <li>Logout</li>
                    </a>
                    <?php
                    if($role == "admin") {
                        ?>
                        <a id="admin" href="index.php?page=admin">
                            <li>Administration</li>
                        </a>
                        <?php
                    }
                    if($role == "employee") {
                        ?>
                            <a id="admin" href="index.php?page=admin&role=2">
                                <li>Medarbejder indgang</li>
                            </a>
                        <?php
                    } 
                } else {
                    ?>
                    <a href="index.php?page=form&forms=login">
                        <li>Login</li>
                    </a>
                    <a href="index.php?page=form&form=register">
                        <li>Ny bruger</li>
                    </a>
                <?php
                } 
                $cartArr = DB::getItemsLimitedAndOrdered("carts", 1, "time", true) ?? null;
                $cart = count($cartArr) > 0 ? $cartArr[0] : null;
                $cartId = $cart ? $cart->id : null;
                ?> 
                <li id="cartLi" class="hovertext" data-hover="Vis indkøbskurven"> 
                    <?php if($userId) {
                        ?>
                    <p id="cartNmb"><?=$cartCount?></p>
                    <?php
                    }
                    ?>
                    <img onclick="showCart(<?=$cartId?>)" src='assets/img/cart.png' id='header_cart'>     
                </li>            
            </ul>
        </nav>
        <?php
            if ($user) {
        ?>
            <p class="greeting">                    
        <?php 
            echo "Hej " . $user . "!";
        ?>
            </p>
        <?php      
            }

            if($userId) {
        ?>
            <div id="overlay">
                <div id="overlayContent">
                    <?php
                    include "includes/overlayContent.php";
                    ?>
                </div>
            </div>
        <?php
            }
        ?>
    </header>
    <script>
        $("#logout").click(function(){  
            swal({
            title: "Går du?",
            text: "Er du sikker på, at du vil logge ud?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willLogout) => {
                if (willLogout) {
                    $.post( "includes/handlers/logout.php", function( data ) {
                    if ( data == "1") {
                            swal("Du er logget ud", {
                            icon: "success",
                        });                           
                        window.location.href = "index.php?login=1";
                    }                  
                });
                } else {
                    swal("Du er stadig logget på!", {
                        icon: "error",
                    });
                }
            });
        });
    </script>
