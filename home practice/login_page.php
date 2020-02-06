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
    ?>
    <form method="POST">
        enter EMAIL:<input type="text" name="login[email]"><br>
        enter PASSWORD:<input type="text" name="login[password]"><br>
        <input type="submit" name="submit_login">
    </form>
</body>
</html>