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
        <?php require('navigationAdmin.php') ?>
    </div>

    <div class="container">
        <h1 class="container__heading">My posts</h1>
        <div class="container__posts">
            <?php
            require('connect.php');

            $statement = $conn->prepare("SELECT id,user_name,email FROM users WHERE user_name!='admin'");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($result as $value) : ?>

                <div class="post">
                    <p class="user">Username: <span class="username"><?= $value['user_name'] ?></span>
                    </p>
                    <p class="email">Email: <?= $value['email'] ?></p>
                    <p class="id">Id: <?= $value['id'] ?></p>
                    <div class="post__actions">
                        <a class="post__delete" href="deleteuser.php?id=<?= $value['id'] ?>">Remove</a>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</body>

</html>