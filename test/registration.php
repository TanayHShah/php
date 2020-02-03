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
   
        <h1>REGISTRATION FORM</h1>

        <form method="POST">
            <div>
        <label>Select One Of Prefix:</label>
                <select name="register[Prefix]">
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr">Dr</option>
                </select>
</div>
            
                <label>Enter First Name:</label><input type="text" name="register[First_Name]">
    
            <div>
                <label>Enter Last Name:</label><input type="text" name="register[Last_Name]">
            </div>
            <div>
                <label>Enter Phone Number:</label><input type="text" name="register[Mobile]"></div>
            <div>
                <label>Enter Email:</label><input type="text" name="register[Email]"></div>
            <div>
                <label>Enter Password:</label><input type="text" name="register[Password]"></div>
            <div>
                <label>Confirm Password:</label><input type="password" name="confirm_password">
            </div>
            <div>
                <label>ENTER Information:</label><textarea rows="3" cols="20"></textarea>
            </div>
            <div>
                <input type="submit" name="submit_form" value="REGISTER">
            </div>
        </form>
        <form action="login_form.php">
            <input type="submit" value="BACK TO LOG IN PAGE">
        </form>

</body>

</html>