<?php
session_start();

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
        <?php
        if (empty($_SESSION['user_name'])) {
            echo ('
    <a class="header__heading" href="index.php">Blog</a>
    <nav class="header__nav">
        <a class="header__login" href="login.php">Login</a>
        <a class="header__register" href="register.php">Register</a>
    </nav>
    ');
        } elseif ($_SESSION['user_name'] === 'admin') {
            echo ('
    <div class="header__welcomeUser">
        <h1 class="header__username">' . ucfirst($_SESSION['user_name']) . '</h1>
    </div>
    <nav class="header__nav">
        <a href="admin.php" class="header__link">Show posts</a>
        <a href="users.php" class="header__link">Show users</a>
        <a class="header__logout" href="logout.php">Sign out</a>
    </nav>
    ');
        } else {
            echo ('
    <div class="header__welcomeUser">
        <h1 class="header__welcome"> Welcome, </h1><h1 class="header__username">' . $_SESSION['user_name'] . '</h1>
    </div>
    <nav class="header__nav">
        <a href="index.php" class="header__link">Show blog</a>
        <a href="newblog.php" class="header__link">Add post</a>
        <a href="myposts.php" class="header__link">My posts</a>
        <a class="header__logout" href="logout.php">Sign out</a>
    </nav>
    ');
        }
        ?>


    </div>

    <div class="container">
        <h1 class="container__heading">All posts</h1>
        <div class="container__posts">
            <?php
            require('connect.php');

            $statement = $conn->prepare('SELECT * FROM blogs ORDER BY blogs.id DESC');
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($result as $value) : ?>

                <div class="post">
                    <h1 class="post__title"><?= $value['title'] ?></h1>
                    <p class="post__content" style="white-space: pre-line"><?= $value['content'] ?></p>
                    <p class="post__author">Autor: <?= '<span class="post__authorname">' . $value['author'] . '</span>' ?></p>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</body>

</html>