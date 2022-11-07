<?php
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });

class Cart {

    /**
     * create cart for user
     */
    public static  function createCart($userId) {
        $postId = 0;

        $pdo = DB::pdo_connect();
 
        $stmt = $pdo->prepare("INSERT INTO carts (`user_id`) VALUES (?)");
        if ($stmt->execute([$userId])) {
             $postId = $pdo->insert_id;
        }

        return $postId;
     }

     /**
      * Add item to cart
      */
     public static  function createCartItem($itemId, $cartId) {
        $res = false;

        $pdo = DB::pdo_connect();
        $stmt = $pdo->prepare("INSERT INTO cart_items (`record_id`, `cart_id`) VALUES (?,?)");
        if ($stmt->execute([$itemId, $cartId])) {
             $res = true;
        }

        return $res;
     }

     /**
      * Creating cart if inactive or not exists
      * Creating cartitem
      * Adding item to users cart
      * returning case number: 0:error, 1:success, 2: cartItem not created, 3: no cart created
      */
    public static  function addToCart( object $user, $recordId) {       
        // check if user has cart
        $userId = $user->id ?? null;
        $createCart = false;
        $cartId = null;
        $res = 0;

        if ( $userId) {
           $carts = DB::selectByParam("carts", "*", "user_id", $userId);  

           if (count($carts) > 0) {
                $cart = end($carts);

                if($cart->status == 1) {
                    // cart is active
                    $cartId = $cart->id;
                } else {
                    // cart is not active -> create new cart;
                    $createCart = true;
                }
           } else {
                    // user has no cart -> create cart 
                    $createCart = true;
           }

           if ($createCart == true) {
             $cartId = Cart::createCart($userId) ?? null;
           }

           // create cart_item 
           if ($cartId) {
                if (Cart::createCartItem($recordId, $cartId)) {
                    $res = 1;
                } else {
                    // cartItem was not created
                    $res = 2;
                }
           } else {
              // error: cart was not created or cartId was not returned 
              //  ( $pdo->insert_id request in createCart() )
              $res = 3;
           }
        }

        return $res;
    }

    public static  function cartItems($userId, $count = false) {

        $res = null;

        $usersCarts = DB::selectByParam("carts", "id", "user_id", $userId);
        
        if (count($usersCarts) > 0) {
                $usersCart = end($usersCarts);
                $cartItems = DB::selectByParam("cart_items", "*", "cart_id", $usersCart->id);

                if ($count == true && $cartItems) {
                    return count($cartItems);
                }
        }      
    }

}