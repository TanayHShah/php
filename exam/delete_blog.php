<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    include 'registration_post.php';
    if (!isset($_SESSION['id'])) {
        echo header("Location:login.php");
    }
    ?>
    <h2>DELETE blog</h2>
    <form method="POST">
        <div>
            <label>Title</label><input type="text" name="blog[Title]" value="<?php echo getvalue('blog', 'Title') ?>">
        </div>
        <div>
            <label>Content</label><textarea rows="3" cols="20" name="blog[Content]" value="<?php echo getvalue('blog', 'Content') ?>"></textarea>
        </div>
        <div>
            <label>URL</label><input type="text" name="blog[Url]" value="<?php echo getvalue('blog', 'Url') ?>">
        </div>
        <div>
            <label>Image</label><input type="file" name="blog[image]">
        </div>
        <div>
            <input type="submit" value="DELETE" name="delete_blog">
        </div>
    </form>
    <form action="blog_page.php">
        <input type="submit" value="BACK TO BLOG blog">
    </form>
    <?php
    ?>
</body>

</html>