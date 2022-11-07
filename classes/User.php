<?php

class User {

    public string $firstname;
    public string $lastname;
    public string $username;
    protected string $pw;
    public string $email;
    public string $roleId;

    // Methods
    function set_fname($firstname) {
        $this->firstname = $firstname;
    }
    function get_fname() {
        return $this->firstname;
    }

    function set_lname($lastname) {
        $this->lastname = $lastname;
    }
    function get_lname() {
        return $this->firstname;
    }

    function set_uname($username) {
        $this->username = $username;
    }
    function get_uname() {
        return $this->username;
    }
    function get_rolee() {
        return $this->username;
    }

    static function createUser($firstname, $lastname, $username, $pw, $email, $roleId) {
        $firstname= DB::cleanString($firstname);
        $lastname= DB::cleanString($lastname);
        $username= DB::cleanString($username);
        $pw= DB::cleanString($pw);
        $email= DB::cleanString($email);
        $role = $roleId;

        $conn = DB::pdo_connect();

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (fName, lName, userName, pWord, email, role_id) VALUES (?, ?, ?, ?, ?,?)");
        
        if ($stmt->execute([$firstname, $lastname, $username, $pw, $email,$role])) {
            $conn = null;
            $_POST = [];
            return true;
        } else {
            $conn = null;
            return false;
        }        
    }

    public static function getUsers() {
        $conn = DB::pdo_connect();

        $stmt = $conn->prepare("SELECT  fName, lName, pWord, email, role_id FROM users");
        $users = $stmt->execute() ?? null;
        if($users) {
            print_r($users);
        } else {
            echo "<h2 style='margin-top: 80px;'>Something went wrong!</h2>";
        }
        $conn = null;

        return $users;
    }

    public static function getUser($userName) {
        $conn = DB::pdo_connect();

        // prepare and bind
        $stmt = $conn->prepare("SELECT  fName, lName, pWord, email, role_id FROM users WHERE userName = ?");
        
        $user = $stmt->execute([$userName]) ?? null;

        // if($user) {
        //     print_r($user);
        // } else {
        //     echo "<h2 style='margin-top: 80px;'>Something went wrong!</h2>";
        // }
        $conn = null;

        return $user;
    }

    public static function getUserValue($userName, $value = null) {
        $pdo = DB::pdo_connect();

        // prepare and bind
        $stmt = $pdo->prepare("SELECT '" . $value . "' FROM users WHERE userName = ?");
        $stmt->execute([$userName]);
        $pdo = null;
        
        return ;
    }


}