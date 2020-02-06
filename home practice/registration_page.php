<!-- form 3field
connect to database
form login
email pass
coneect to database select query
homepage -->
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
        enter FIRST NAME:<input type="text" name="practice[first_name]"><br>
        enter EMAIL:<input type="text" name="practice[email]"><br>
        enter PASSWORD:<input type="text" name="practice[password]"><br>
        <input type="submit" name="submit_form">
    </form>
</body>
</html>