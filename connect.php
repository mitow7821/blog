<?php
$dsn = "mysql:dbname=learning;host=localhost";
$dbUser = "root";
$dbPassword = "";

try {
    $conn = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $exception) {
    die('Connection failed: ' . $exception->getMessage());
}
