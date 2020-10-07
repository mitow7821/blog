<?php
session_start();

$data = $_POST;

if (empty($data['email']) || empty($data['password'])) {
    die('Email and password are required!');
}

$email = $data['email'];
$password = $data['password'];

require('connect.php');

$statement = $conn->prepare('SELECT * FROM users WHERE email = :email');
$statement->execute([':email' => $email]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($result)) {
    die('<!DOCTYPE html>
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
            <a href="register.php" class="header__register">Register</a>
        </nav>
    </div>
    <h2 class="login__error">Account doesn\'t exist !</h2>
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
    </form>
    </div>

</body>

</html>
    ');
}

$user = array_shift($result);
if ($user['email'] === $email && $user['password'] === $password) {
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['id'] = $user['id'];
    if ($_SESSION['user_name'] === 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: index.php');
    }
} else {
    die('<!DOCTYPE html>
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
                <a href="register.php" class="header__register">Register</a>
            </nav>
        </div>
        <h2 class="login__error">Incorrect email or password !</h2>
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
        </form>
        </div>
    
    </body>
    
    </html>
        ');
}
