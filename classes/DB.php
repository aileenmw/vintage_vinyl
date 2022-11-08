<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/vintage_vinyl/includes/db/config.php";

class DB {

    /**
     * PDO connection
     * Default: FETCH_OBJ
     */

    static function pdo_connect() {
        $dsn = 'mysql:host=' . DB_HOST . ";dbname=" . DB_NAME;
        
        // Create PDO instance
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        return $pdo;
    }

    // genereic 'select-by-param' function  
    public static function selectByParam( $table, $values, $param, $paramValue) {
        
        $pdo = DB::pdo_connect();
        $sql = "SELECT $values FROM $table WHERE $param = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$paramValue]);
        $objects = $stmt->fetchAll();

        $pdo = null;

        return $objects;
    }
        // genereic 'select-values-from-table' function  
        public static function selectValuesFromTable($table, $values) {
        
            $pdo = DB::pdo_connect();
            $sql = "SELECT $values FROM $table";
    
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $objects = $stmt->fetchAll();
            
            $pdo = null;
    
            return $objects ?? null;
        }

        public static  function getItemsLimitedAndOrdered($table, $limit = null, $orderBy = "", $desc = false) {

            if ($limit) {
                $limit = "LIMIT " . $limit;
            } else {
                $limit = "";
            }
    
            if ($orderBy != "") {
                $orderBy = $desc == true ? "ORDER BY " . $orderBy . " DESC" : "ORDER BY " . $orderBy;
            } else {
                $orderBy = "";
            }
    
            $sql =  "SELECT * FROM $table $orderBy $limit";
            $pdo = DB::pdo_connect();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $objects = $stmt->fetchAll();
    
            $pdo = null;
        
            return $objects;
        }

        public static function updateItem( string $table, int $id, string $updateString) {
            $res = 0;

            $sql = "UPDATE $table SET $updateString WHERE id=?";
            $pdo = DB::pdo_connect();
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])) {
                $res = 1;
            }

            $pdo = null;
            
            return $res;
        }

        public static function deleteItem ( $table, $param, $value) {

            $handleCarts = $table == 'users' ? 0 : 1;

            if($table == 'users') {
                $carts = DB::selectByParam('carts', 'id', 'user_id', $value); 
                if (count($carts) > 0) {
                    $i = 0;
                    $where = "";
                    $id = intval($value);
                    foreach ($carts as $cart) {
                        if ( $i > 0) {
                            $where .= ' OR cart_id=' . $cart->id;
                        } else {
                            $where .= 'cart_id=' . $cart->id;
                        }
                        $i++;
                    }

                    $sql1 = "DELETE FROM cart_items WHERE " . $where;     
                    //return $sql1;               
                    $pdo = DB::pdo_connect();
                    $stmt1 = $pdo->prepare($sql1);
                    $itemsDeleted = $stmt1->execute();

                    if ($itemsDeleted) {
                        $sql2 = "DELETE FROM carts WHERE user_id=?";
                        $stmt2 = $pdo->prepare($sql2);
                        if($stmt2->execute([$id])) {
                            $handleCarts = 1;
                        }
                        
                    } 
                }else {
                    $handleCarts = 1;
                }
                $pdo = null;
            }

            if ($handleCarts == 1) {

                $outcome = 0;
                $sql = "DELETE FROM $table WHERE $param=?";
                $pdo = DB::pdo_connect();
                $stmt = $pdo->prepare($sql);
                $res = $stmt->execute([$value]);

                if ($res) {
                    $outcome = 1;
                } 
                $pdo = null;
                
                return $outcome;
            }
        }

    //check login
    public static function login ($uName, $pw) {

        $loginOK = 0;
        $uName = DB::cleanString($uName);

        $pdo = DB::pdo_connect();
        $sql = "SELECT users.id, `fName`, `lName`, `userName`, `pWord`, `role_id`, role.name as role FROM `users` 
        INNER JOIN role ON
        users.role_id = role.id
        WHERE `userName` = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$uName]);
        $objects = $stmt->fetchAll();

        if (count($objects) > 0) {
            $obj = end($objects);
            if (password_verify($pw, $obj->pWord)) {
                $loginOK = 1;
            } else {
                $loginOK = 2;
            }
        }
        /*/////login without encrypted pw/////////*/
        // if (count($objects) > 0) {
        //         foreach ($objects as $obj) {
        //             if ($obj->pWord == $pw) {
        //                 $loginOK = 1;
        //             } else {
        //                 $loginOK = 2;
        //             }
        //         }
        // } 
        $pdo = null;

        if ($loginOK == 1) {
            // opret session & redirect
            $_SESSION['logged'] = true;
            $_SESSION['role'] = $obj->role;
            $_SESSION['username'] = $obj->userName;
            $_SESSION['user_id'] = $obj->id;
        }

        return $loginOK;
    }

    // methods for cleaning inputs
    public static function cleanString ($string) {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);

        return $string;
    }

    public static function isInt ($int) {
        $isInt = false;

        if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
            $isInt = false;
          } else {
            $isInt = true;
          }
        
        return $isInt;
    }
}

?>