<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .a {
            float: left;
            margin-right: 50px;
        }

        table,
        th,
        td,
        tr {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
     include 'registration_post.php';
    if(!isset($_SESSION['id'])){
        header("Location:login.php");
    }
   
    ?>
    <div class="a">
        <a href="category.php">MANAGE CATEGORY</a>
    </div>
    <div class="a">
        <a href="update_user.php">MY PROFILE</a>
    </div>
    <div>
        <a href="log_out.php">LOGOUT</a>
    </div>
    <div>
        <h2>BLOG POST</h2>
    </div>
    <div>
        <a href="blog_form.php">ADD BLOG</a>
    </div>
    <?php
    view_table_blog($array_blog);
    ?>
</body>

</html>