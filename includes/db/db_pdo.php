<?php

require_once "config.php";

function pdo_conn() {
$dsn = 'mysql:host=' . DB_HOST . ";dbname=" . DB_NAME;

// Create PDO instance
$pdo = new PDO($dsn, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

return $pdo;
}

$pdo = pdo_conn();
$stmt = $pdo->query('SELECT * FROM users');

// DEFAULT is FETCH_OBJ
while( $row = $stmt->fetch()) {
    echo $row->fName . "<br/>";
}

$sql = "SELECT * FROM users WHERE role_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([3]);
$users = $stmt->fetchAll();

foreach ( $users as $user) {
    echo $user->fName . " " . $user->lName . "<br>";
}
