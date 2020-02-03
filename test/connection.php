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
    session_start();
    if (!isset($_SESSION['array']))
        $_SESSION['array'] = [];

    function connect()
    {
        $localhost = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'test';
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
        $time = time();
        $day = date('d M Y @ H:i:s', $time);
        $value = $array;
        $value = '"' . implode('","', $value) . '"';
       echo $sql1 = "INSERT INTO $tablename($string,Created_At) VALUES($value,'$day'); ";
        if (mysqli_query($conn, $sql1)) {
            echo 'SUCCESFULLY REGISTERED';
        } else {
            echo mysqli_error($conn);
        }
    }

    function convert_form_data()
    {
        $array = [];
        $column_name = [];
        foreach ($_POST['register'] as $fieldname => $values) {
            $array[$fieldname] = $values;
        }
        foreach ($_POST['register'] as $fieldname => $values) {
            array_push($column_name, $fieldname);
        }
        if (isset($_POST['submit_form']))
            insert_row('user', $array, $column_name);
    }
    function category_data()
    {
        $array = [];
        $column_name = [];
        foreach ($_POST['category'] as $fieldname => $values) {
            $array[$fieldname] = $values;
        }
        foreach ($_POST['category'] as $fieldname => $values) {
            array_push($column_name, $fieldname);
        }
        foreach ($_POST['show'] as $fieldname => $values) {
            $flag = 0;
            if ($fieldname == 'parent_category_id') {
                for ($i = 0; $i < sizeof($_SESSION['array']); $i++) {
                    if ($_SESSION['array'][$i] == $values) {
                        $flag = 1;
                    }
                }
                if ($flag == 0) {
                    array_push($_SESSION['array'], $values);
                   
                }
            }
        }
        if (isset($_POST['submit_category']))
            insert_row('category', $array, $column_name);
    }
    function return_row()
    {
        $conn = connect();
        $email = $_POST['login']['Email'];
        $password = $_POST['login']['Password'];
        $sql1 = "SELECT * from user WHERE Email= '$email'
         AND Password='$password'; ";
        if (mysqli_query($conn, $sql1)) {

            $result = mysqli_query($conn, $sql1);
            return mysqli_num_rows($result);
        } else {
            echo mysqli_error($conn);
        }
    }

    function check_action()
    {
        if (isset($_POST['submit_login'])) {
            if (return_row() == 0) {
                echo  "ENTER VALID USERNAME AND PASSWORD";
            } else {

                return header("Location:blog_page.php");
            }
        }
    }
    function check_function($sectionname)
    {
        if ($sectionname == 'register') {
            return convert_form_data();
        }
        if ($sectionname == 'category') {
            return category_data();
        }
    }
    function check_last_key()
    {
        $conn = connect();
        $sql = "SELECT category_id FROM category ORDER BY category_id DESC limit 1;";
        $var = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($var);
    }
    function check_url()
    {
        $flag = 0;
        $conn = connect();
        if (check_last_key() != 0) {
            $key = check_last_key();
            $key = implode(" ", $key);
            for ($id = $key; $id > 0; $id--) {
                $sql1 = "SELECT Url FROM category WHERE category_id=$id;";
                if (mysqli_query($conn, $sql1)) {

                    $result = mysqli_query($conn, $sql1);
                    $result = $result->fetch_assoc();
                    $result = implode(" ", $result);
                    if ($_POST['category']['Url'] == $result) {
                        $flag = 1;
                    }
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
        return $flag;
    }
    // function view_table()
    // {
    //     $conn = connect();
    //     $sql = $query = 'SELECT *from category where customer_id=customer_id';
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_num_rows($result) > 0) {
    //         echo '<table>';
    //         echo '<tr>';
         
    //         echo '<td colspan="2">';
    //         echo 'ACTION';
    //         echo '</td>';

    //         echo '</tr>';
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             echo '<tr>';
    //             for ($i = 0; $i < sizeof($array); $i++) {
    //                 echo '<td>';
    //                 echo $row[$array[$i]];
    //                 echo '</td>';
    //             }
    //             echo '<td>';
    //             echo '<a class="btn" href="form.php?id=' . $row['ID'] . '">UPDATE</a>';
    //             echo '</td>';
    //             echo '<td>';
    //             echo '<a class="btn" href="form.php?id=' . $row['ID'] . '">DELETE</a>';
    //             echo '</td>';
    //             echo '<td>';
    //             echo '<a class="btn" href="form_post.php?id=' . $row['ID'] . '">VIEW</a>';
    //             echo '</td>';
    //             echo '</tr>';
    //         }
    //         echo '</table>';
    //     } else {
    //         echo '0 RESULTS';
    //     }
    // }
