<?php
session_start();

$data = $_POST;

if (empty($data['title']) || empty($data['content'])) {
    die('Title and content are required!');
}

$title = $data['title'];
$content = $data['content'];
$author = $_SESSION['user_name'];
$author_id = $_SESSION['id'];

require('connect.php');

$statement = $conn->prepare("INSERT INTO blogs (title,content,author,author_id) VALUES (:title, :content, :author, :author_id)");

if ($statement->execute([':title' => $title, ':content' => $content, ':author' => $author, ':author_id' => $author_id])) {
    header('Location: index.php');
    echo "User has been created" . "<br>";
    echo "<a href='login.php'>Login to your account</a>";
}
