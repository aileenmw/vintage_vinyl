
<?php

    /**
     * @category PHP API's
     * @return \mysqli object
     * @description Connection using object oriented style
     */

    function db_connect() {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($mysqli->connect_errno > 0) {    
            echo "<div style='margin-top: 80px;'Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " 
                    . $mysqli->connect_error . "</div>";
            exit();
        }
        
        /* Sets the default client character set to utf8 */
        if (!$mysqli->set_charset(MYSQL_CHARSET)) {
            echo "<div style='margin-top: 80px;'> Error loading character set utf8: (", $mysqli->error . ") </div>";
            exit();
        }
        return $mysqli;
        
    }
