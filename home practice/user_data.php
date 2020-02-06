<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        REGISTRATION FORM
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    require 'user_data_post.php';
    echo '<pre>';
    print_r($_POST);//show post
    print_r($_SESSION);// show session
    echo '</pre>';    
    ?>
    <div>
        <form method="POST" action="user_data.php" >
            <div>
                <label>ENTER USER NAME:</label><input type="text" name="admin[user_name]" >
            </div>
            <div>
                <label>ENTER USER PASSWORD</label><input type="password" name="admin[user_password]">
            </div>
            <div>
                <input type="submit" name="submit" value="LOGIN">
            </div>
        </form>
    </div>
</body>

</html>