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

    <div class="addpost">
        <h1 class="addpost__heading">Add new blog post</h1>
        <form class="postform" action="new_script.php" method="POST">
            <div class="postform__title">
                <label class="postform__titlelabel">Title:</label>
                <input class="postform__input" type="text" required name="title">
            </div>
            <div class="postform__content">
                <label class="postform__contentlabel">Content:</label>
                <textarea class="postform__textarea" name="content" cols="50" rows="10" required></textarea>
            </div>
            <input class="postform__button" type="submit" value="Add post">
        </form>
    </div>
</body>

</html>