<?php
session_start();

if (!empty($_SESSION['user_name'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <div class="header">
        <a class="header__heading" href="index.php">Blog</a>
        <nav class="header__nav">
            <a class="header__login" href="login.php">Login</a>
            <a class="header__register" href="register.php">Register</a>
        </nav>
    </div>

    <div class="error">
        <h1 class="error__content">You must be <a class="error__link" href="login.php">logged</a> in <br> to see this page!</h1>
        <a class="error__button" href="index.php">Back to reading</a>
    </div>

</body>

</html>