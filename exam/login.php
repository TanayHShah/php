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
    <div>
        <h2>LOGIN</h2>
        <form method="POST">

            <div>
                ENTER EMAIL:<input type="text" name="login[Email]">
            </div>

            <div>
                ENTER PASSWORD:<input type="text" name="login[Password]">

            </div>

            <div>
                <input type="submit" name="submit_login" value="LOGIN">

            </div>
        </form>
        <form action="registration.php">
            <input type="submit" value="REGISTER">
        </form>
    </div>
</body>

</html>