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
    require 'registration_post.php';
    if (!isset($_SESSION['id'])) {
        echo header("Location:login.php");
    }
    ?>

    <h1>MY PROFILE</h1>

    <form method="POST">
        <div>
            <label>Select One Of Prefix:</label>
                <?php $prefix_Data = ['Mr', 'Mrs', 'Dr']; ?>
                <select name="account[prefix]">
                    <?php foreach ($prefix_Data as $value) : ?>
                        <?php $selected = $value == getvalue('register', 'Prefix') ? "selected" : ""; ?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
        </div>

        <label>Enter First Name:</label><input type="text" name="register[First_Name]" value="<?php echo getvalue('register', 'First_Name') ?>">

        <div>
            <label>Enter Last Name:</label><input type="text" name="register[Last_Name]" value="<?php echo getvalue('register', 'Last_Name') ?>">
        </div>
        <div>
            <label>Enter Phone Number:</label><input type="text" name="register[Mobile]" value="<?php echo getvalue('register', 'Mobile') ?>"></div>
        <div>
            <label>Enter Email:</label><input type="text" name="register[Email]" value="<?php echo getvalue('register', 'Email') ?>"></div >
        <div>
            <label>Enter Password:</label><input type="text" name="register[Password]" value="<?php echo getvalue('register', 'Password') ?>"></div>
        <div>
            <label>Confirm Password:</label><input type="password" name="confirm_password">
        </div>
        <div>
            <label>ENTER Information:</label><textarea rows="3" cols="20"></textarea>
        </div>
        <div>
            <input type="submit" name="update_user" value="UDATE">
        </div>
    </form>
    <form action="blog_page.php">
        <input type="submit" value="BACK TO BLOG PAGE">
    </form>

</body>

</html>