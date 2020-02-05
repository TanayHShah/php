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
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'test';
    $conn = mysqli_connect($localhost, $username, $password,$db);
    if (!$conn) {
        die('CONNECTION FAILED');
    }
    echo 'CONNECTION SUCCESFUL<br>';
    $sql = "CREATE DATABASE exam";
    $sql1 = "CREATE TABLE category( category_id INT,Title TEXT, 
    Meta_Title TEXT, Url TEXT, Content TEXT, Created_At TEXT, Updated_At VARCHAR(20), PRIMARY KEY(category_id) )";
    $sql2 = "INSERT INTO test(FIRST_NAME,LAST_NAME,PHONE_NUMBER) VALUES ('TANAY','SHAH','1234455')";
    $sql3 = "CREATE TABLE parent_category( parent_category_id INT,Parent_Category TEXT,PRIMARY KEY(parent_category_id) )";
    if(mysqli_query($conn,$sql3)){
        echo 'WELCOME';
    }
    else{
        echo mysqli_error($conn);
    }
    ?>
</body>

</html>