<?php
session_start();

//Pobranie danych z formularza i ich sprawdzenie
$data = $_POST;
if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
    die('Username, email and password are required!');
}
$newUsername = $data['username'];
$newEmail = $data['email'];
$newPassword = $data['password'];

require('connect.php');

//Zapytanie sql
$get = $conn->prepare('SELECT user_name,email FROM users');
$get->execute();
$result = $get->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $value) {
    if (strtolower($value['user_name'])  === strtolower($newUsername)) {
        die('
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
                <a href="register.php" class="header__register">Register</a>
            </nav>
        </div>
        <h2 class="login__error">Username is already used !</h2>
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
    if ($value['email'] === $newEmail) {
        die('
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
                <a href="register.php" class="header__register">Register</a>
            </nav>
        </div>
        <h2 class="login__error">Email is already used !</h2>
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
}

$statement = $conn->prepare("INSERT INTO users (user_name,email,password) VALUES (:username, :email, :password)");

//Wyświetlenie widoku po rejestracji
if ($statement->execute([':username' => $newUsername, ':email' => $newEmail, ':password' => $newPassword])) {
    echo ('
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
            <a href="register.php" class="header__register">Register</a>
        </nav>
    </div>
    <h2 class="login__created">User account has been created !</h2>
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
