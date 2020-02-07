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
    echo 'THANK YOU FOR LOGGING IN';
    session_destroy();
    ?>
    <br>
    <a href="login.php">Back to Login</a>
</body>

</html>