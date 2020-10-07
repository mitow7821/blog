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

    <div class="login">
        <h1 class="login__heading">Sign in</h1>
        <form class="accountform" action="login_script.php" method="POST">
            <div class="accountform__email">
                <label>Email:</label>
                <input type="email" required name="email">
            </div>

            <div class="accountform__password">
                <label>Password:</label>
                <input type="password" required name="password">
            </div>

            <input class="accountform__button" type="submit" value="Sign in">
            <a class="accountform__link" href="register.php">Create account</a>
        </form>
    </div>

</body>

</html>