<?php
session_start();

function update()
{
    require('connect.php');
    $id = $_GET['id'];
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $statement = $conn->prepare('UPDATE blogs SET title = :title, content = :content WHERE id = :id');
    $statement->execute(['title' => $title, 'content' => $content, 'id' => $id]);
}

if (@$_SESSION['user_name'] === 'admin') {
    update();
    header('Location: admin.php');
} elseif (!empty($_SESSION['user_name'])) {
    update();
    header('Location: myposts.php');
} else {
    die(header('Location: error.php'));
}
