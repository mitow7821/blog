<?php
session_start();

if (@$_SESSION['user_name'] === 'admin') {
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
} elseif (!empty($_SESSION['user_name'])) {
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
} else {
    die(header('Location: error.php'));
}
