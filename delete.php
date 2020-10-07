<?php
session_start();

empty($_GET['id']) ? die(header('Location:index.php')) : '';

require('connect.php');
$id = $_GET['id'];
$author = $conn->prepare('SELECT author FROM blogs WHERE id = :id');
$author->execute(['id' => $id]);
$result = $author->fetch();

function delete()
{
    require('connect.php');
    $id = $_GET['id'];
    $statement = $conn->prepare('DELETE FROM blogs WHERE id = :id');
    $statement->execute(['id' => $id]);
}

if (@$_SESSION['user_name'] === 'admin') {
    delete();
    header('Location: admin.php');
} elseif ($_SESSION['user_name'] === $result['author']) {
    delete();
    header('Location: myposts.php');
} else {
    die(header('Location: error.php'));
}
