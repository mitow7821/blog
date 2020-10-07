<?php empty($_GET['id']) ? die(header('Location:index.php')) : '' ?>
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

    <div class="editpost">
        <h1 class="editpost__heading">Edit post</h1>
        <?php

        require('connect.php');

        $id = $_GET['id'];

        $statement = $conn->prepare('SELECT * FROM blogs WHERE id=:id');
        $statement->execute(['id' => $id]);
        $value = $statement->fetch();
        if ($_SESSION['user_name'] === $value['author'] || @$_SESSION['user_name'] === 'admin') {
            
        } else{
            die(header('Location:error.php'));
        }
        ?>
        <form class="postform" action="update.php?id=<?= $id ?>" method="POST">
            <div class="postform__title">
                <label class="postform__titlelabel">Title:</label>
                <input class="postform__input" type="text" required name="title" value="<?= $value['title'] ?>">
            </div>
            <div class="postform__content">
                <label class="postform__contentlabel">Content:</label>
                <textarea class="postform__textarea" name="content" cols="50" rows="10" required><?= $value['content'] ?></textarea>
            </div>
            <input class="postform__button" type="submit" value="Save">
        </form>
    </div>

</body>

</html>