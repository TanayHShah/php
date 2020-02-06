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


    function connect()
    {
        $localhost = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'practice';
        $conn = mysqli_connect($localhost, $username, $password, $db);
        if (!$conn) {
            return false;
        } else {
            return $conn;
        }
    }
    function insert_row($tablename, $array, $column_name)
    {
        $conn = connect();
        echo $string = implode(',', $column_name);
        print_r($array);
        $value = $array;
        $value = '"' . implode('","', $value) . '"';
        $sql1 = "INSERT INTO $tablename($string) VALUES($value); ";
        if (mysqli_query($conn, $sql1)) {
            echo 'ROW INSERTED';
        } else {
            echo mysqli_error($conn);
        }
    }

    function convert_form_data()
    {
        $array = [];
        $column_name = [];
        foreach ($_POST['practice'] as $fieldname => $values) {
            $array[$fieldname] = $values;
        }
        foreach ($_POST['practice'] as $fieldname => $values) {
            array_push($column_name, $fieldname);
        }
        if (isset($_POST['submit_form']))
            insert_row('login', $array, $column_name);
    }
    function return_row()
    {
        $conn = connect();
        $email = $_POST['login']['email'];
        $password = $_POST['login']['password'];
        $sql1 = "SELECT * from login WHERE email= '$email'
         AND password='$password'; ";
        if (mysqli_query($conn, $sql1)) {
          
            $result = mysqli_query($conn, $sql1);
            return mysqli_num_rows($result);
        } else {
            echo mysqli_error($conn);
        }
    }

    function check_action()
    {
        if (isset($_POST['submit_login'])){
            if (return_row() == 0) {
                echo  "ENTER VALID USERNAME AND PASSWORD";
               
            } else {

                header("Location:welcome_page.php"); 
                
            }
        }
    }
