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
        <?php require('navigation.php') ?>
    </div>

    <div class="container">
        <h1 class="container__heading">My posts</h1>
        <div class="container__posts">
            <?php
            require('connect.php');

            $username = $_SESSION['user_name'];
            $userId = $_SESSION['id'];
            $statement = $conn->prepare('SELECT * FROM blogs WHERE author=:author && author_id=:id ORDER BY blogs.id DESC');
            $statement->execute(['author' => $username, 'id' => $userId]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($result as $value) : ?>

                <div class="post">
                    <h1 class="post__title"><?= $value['title'] ?></h1>
                    <p class="post__content" style="white-space: pre-line"><?= $value['content'] ?></p>
                    <p class="post__author">Autor: <?= '<span class="post__authorname">' . $value['author'] . '</span>' ?></p>
                    <div class="post__actions">
                        <a class="post__edit" href="edit.php?id=<?= $value['id'] ?>">Edit</a>
                        <a class="post__delete" href="delete.php?id=<?= $value['id'] ?>">Remove</a>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</body>

</html>