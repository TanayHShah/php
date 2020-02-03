<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .a{
            float: left;
            margin-right:50px; 
            
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
    ?>
    <div class="a">
        <a href="category.php">MANAGE CATEGORY</a>
    </div>
    <div class="a">
        <a href="display.php">MY PROFILE</a>
    </div>
    <div >
        <a href="login_form.php">LOGOUT</a>
    </div>
    <div>
 <h2>BLOG CATEGORY</h2>  
    </div>
 <div>
 <a href="category_form.php">ADD CATEGORY</a>
 </div>
<div>
    <?php
    view_table();
    ?>
</div>
</body>
</html>