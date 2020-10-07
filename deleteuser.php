<?php
session_start();

empty($_GET['id']) ? die(header('Location:index.php')) : '';


if (@$_SESSION['user_name'] === 'admin') {
    require('connect.php');

    $id = $_GET['id'];
    $statement = $conn->prepare('DELETE FROM users WHERE id = :id');
    $statement->execute(['id' => $id]);

    header('Location: users.php');
} else {
    die(header('Location: error.php'));
}
