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
        $session = 0;
        $array_category = ['category_id', 'parent_category_id', 'Parent_Category'];
        $array_category_update = ['Title', 'Meta_Title', 'Url', 'Content', 'parent_category_id'];
        $array_blog = ['blog_id', 'Title', 'Url', 'Content', 'Created_At'];
        $array_user = ['Prefix', 'First_Name', 'Last_Name', 'Mobile', 'Email', 'Password'];
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
            $string = implode(',', $column_name);
            $value = $array;
            $value = '"' . implode('","', $value) . '"';
            $sql1 = "INSERT INTO $tablename($string) VALUES($value); ";
            if (mysqli_query($conn, $sql1)) {
                echo 'SUCCESFULLY REGISTERED<br>';
            } else {
                echo mysqli_error($conn);
            }
        }

        function convert_form_data()
        {
            $array = [];
            $column_name = [];
            foreach ($_POST['register'] as $fieldname => $values) {
                if ($fieldname == 'Password') {
                    $array[$fieldname] = md5($values);
                } else {
                    $array[$fieldname] = $values;
                }
            }
            foreach ($_POST['register'] as $fieldname => $values) {
                array_push($column_name, $fieldname);
            }
            if (isset($_POST['submit_form']))
                insert_row('user', $array, $column_name);
        }
        function check_function($sectionname)
        {
            if ($sectionname == 'register') {
                return convert_form_data();
            }
            if ($sectionname == 'category') {
                return convert_category_data();
            }
            if ($sectionname == 'blog') {
                return convert_blog_data();
            }
        }
        function return_row()
        {
            $conn = connect();
            $email = $_POST['login']['Email'];
            $password = $_POST['login']['Password'];
            $password = md5($password);
            echo $sql1 = "SELECT * from user WHERE Email= '$email'
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
            global $session;
            if (return_row() == 0) {
                echo  "ENTER VALID USERNAME AND PASSWORD";
            } else {
                $session = set_ssession();
                return header("Location:blog_page.php");
            }
        }
        function get_parent_id()
        {
            $conn = connect();
            $array = [];
            $sql1 = "SELECT parent_category_id from parent_category WHERE parent_category_id=parent_category_id; ";
            if (mysqli_query($conn, $sql1)) {

                $result = mysqli_query($conn, $sql1);
                while ($data = mysqli_fetch_assoc($result)) {
                    array_push($array, $data['parent_category_id']);
                }
            } else {
                echo mysqli_error($conn);
            }
            return $array;
        }
        function get_parent_category()
        {
            $conn = connect();
            $array = [];
            $sql1 = "SELECT Parent_Category from parent_category WHERE Parent_Category=Parent_Category; ";
            if (mysqli_query($conn, $sql1)) {

                $result = mysqli_query($conn, $sql1);
                while ($data = mysqli_fetch_assoc($result)) {
                    array_push($array, $data['Parent_Category']);
                }
            } else {
                echo mysqli_error($conn);
            }
            return $array;
        }
        function convert_category_data()
        {
            $array = [];
            $column_name = [];
            foreach ($_POST['category'] as $fieldname => $values) {
                $array[$fieldname] = $values;
            }
            foreach ($_POST['category'] as $fieldname => $values) {
                array_push($column_name, $fieldname);
            }

            if (isset($_POST['submit_category']))
                insert_row('category', $array, $column_name);
        }

        function convert_blog_data()
        {
            $array = [];
            $column_name = [];
            foreach ($_POST['blog'] as $fieldname => $values) {
                $array[$fieldname] = $values;
            }
            foreach ($_POST['blog'] as $fieldname => $values) {
                array_push($column_name, $fieldname);
            }
            array_push($column_name, 'customer_id');
            $value = check_last_key();
            echo $array['customer_id'] = $value['customer_id'];


            if (isset($_POST['submit_blog']))
                insert_row('blog_post', $array, $column_name);
        }


        function view_table($array)
        {
            global $array_category;
            $array = $array_category;
            $conn = connect();
            $sql = $query = 'SELECT category.category_id,category.parent_category_id,
             parent_category.Parent_Category, category.Created_At FROM
             category LEFT JOIN parent_category ON 
             category.parent_category_id = parent_category.parent_category_id';
            $result = mysqli_query($conn, $sql);
            table_form($result, $array, 'category_id');
        }
        function view_table_blog($array)
        {
            global $array_blog;
            $value = implode(' ', $_SESSION['id']);
            $array = $array_blog;
            $conn = connect();
            $sql = $query = "SELECT * FROM blog_post WHERE customer_id= '$value';";
            $result = mysqli_query($conn, $sql);
            table_form($result, $array, 'blog_id');
        }
        function check_last_key()
        {
            $conn = connect();
            $value = implode('', $_SESSION['id']);
            $sql = "SELECT customer_id FROM user Where customer_id=$value;";
            $var = mysqli_query($conn, $sql);
            return mysqli_fetch_assoc($var);
        }
        function table_form($result, $array, $id)
        {
            if ($id == 'category_id') {
                $update = 'update_category_form.php?id=';
                $delete = 'delete_category.php?id=';
            }
            if ($id == 'blog_id') {
                $update = 'update_blog_form.php?id=';
                $delete = 'delete_blog.php?id=';
            }
            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<tr>';
                for ($i = 0; $i < sizeof($array); $i++) {
                    echo '<td>';
                    echo $array[$i];
                    echo '</td>';
                }
                echo '<td colspan="2">';
                echo 'ACTION';
                echo '</td>';

                echo '</tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    for ($i = 0; $i < sizeof($array); $i++) {
                        echo '<td>';
                        echo $row[$array[$i]];
                        echo '</td>';
                    }
                    echo '<td>';
                    echo '<a class="btn" href="' . $update . '' . $row[$id] . '">UPDATE</a>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a class="btn" href="' . $delete . '' . $row[$id] . '">DELETE</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '0 RESULTS';
            }
        }
        function return_last_data($sectionname, $fieldname)
        {
            if ($sectionname == 'category') {
                $tablename = 'category';
                if (isset($_GET['id'])) {
                    $value = show_id();
                } else {
                    $value = check_last_key();
                }
                $id = $value;
                return check_table($sectionname, $fieldname, $id, $tablename);
            }
            if ($sectionname == 'blog') {
                $tablename = 'blog_post';
                if (isset($_GET['id'])) {
                    $value = show_id();
                } else {
                    $value = check_last_key();
                }
                $id = $value;
                return check_table($sectionname, $fieldname, $id, $tablename);
            }
            if ($sectionname == 'register') {
                $tablename = 'user';
                if (isset($_GET['id'])) {
                    $value = show_id();
                } else {
                    $value = check_last_key();
                }
                $id = $value;
                return check_table($sectionname, $fieldname, $id, $tablename);
            }
        }
        function show_id()
        {
            if (!empty($_GET['id']))
                return $_GET['id'];
        }
        function check_table($sectionname, $fieldname, $id, $tablename)
        {
            switch ($sectionname) {
                case 'category':
                    $table_id = 'category_id';
                    break;
                case 'blog':
                    $table_id = 'blog_id';
                    break;
                case 'register':
                    $table_id = 'customer_id';
            }
            $conn = connect();
            $name = last_data($sectionname, $fieldname);
            if (!empty($id)) {
                if (is_array($id))
                    $id = implode('"', $id);
                $sql = "SELECT $name from $tablename WHERE $table_id=$id"; //
                if (mysqli_query($conn, $sql)) {
                    $result = mysqli_query($conn, $sql)->fetch_assoc();
                    if (!empty($result))
                        $result = implode('', $result);
                    return $result;
                } else {
                    mysqli_error($conn);
                }
            }
        }
        function last_data($sectionname, $fieldkey)
        {
            switch ($sectionname) {
                case 'category':
                    global $array_category_update;
                    for ($i = 0; $i < sizeof($array_category_update); $i++) {
                        if ($fieldkey == $array_category_update[$i])
                            return $array_category_update[$i];
                    }
                    break;
                case 'blog':
                    global $array_blog;
                    for ($i = 0; $i < sizeof($array_blog); $i++) {
                        if ($fieldkey == $array_blog[$i])
                            return $array_blog[$i];
                    }
                    break;
                case 'register':
                    global $array_user;
                    for ($i = 0; $i < sizeof($array_user); $i++) {
                        if ($fieldkey == $array_user[$i])
                            return $array_user[$i];
                    }
            }
        }
        function update($tablename, $array, $column_name)
        {
            switch ($tablename) {
                case 'category':
                    $table_id = 'category_id';
                    break;
                case 'blog_post':
                    $table_id = 'blog_id';
                    break;
                case 'user';
                    $table_id = 'customer_id';
            }
            if (isset($_GET['id'])) {
                $array[$table_id] = show_id();
                $id = show_id();
            } else {
                $array[$table_id] = implode('', check_last_key());
                $id = implode('', check_last_key());
            }
            $conn = connect();
            $string =  $column_name;
            $value = $array;
            foreach ($value as $fieldname => $values) {
                $sql1 = "UPDATE $tablename
                    SET $fieldname='$values'
                    WHERE $table_id=$id
                    ; ";

                if (!mysqli_query($conn, $sql1)) {
                    echo mysqli_error($conn);
                }
            }
            echo "UPDATED SUCCESFULLY";
        }
        function delete_row($tablename, $array, $column_name)
        {
            switch ($tablename) {
                case 'category':
                    $table_id = 'category_id';
                    break;
                case 'blog_post':
                    $table_id = 'blog_id';
                    break;
            }
            if (isset($_GET['id'])) {
                $array[$table_id] = show_id();
                $id = show_id();
                $conn = connect();
                $sql1 = "DELETE FROM $tablename
                    WHERE $table_id=$id
                    ; ";

                if (mysqli_query($conn, $sql1)) {
                    echo 'DELETED SUCCESFULLY';
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
        function set_ssession()
        {
            $conn = connect();
            $email = $_POST['login']['Email'];
            $password = $_POST['login']['Password'];
            $password = md5($password);
            $sql1 = "SELECT customer_id from user WHERE Email= '$email'
                     AND Password='$password'; ";
            if (mysqli_query($conn, $sql1)) {

                $result = mysqli_query($conn, $sql1);
                $_SESSION['id'] = mysqli_fetch_assoc($result);
                $value = implode('', $_SESSION['id']);
                return $value;
            } else {
                echo mysqli_error($conn);
            }
        }
        function transaction_table()
        {
            $flag = [" "];
            $value = [];
            $name = [];
            $id = implode('', check_last_key());
            $conn = connect();
            $sql1 = "SELECT blog_id FROM blog_post
                    WHERE customer_id=$id
                    ; ";
            if (mysqli_query($conn, $sql1)) {
                $result = mysqli_query($conn, $sql1);
                $result = mysqli_fetch_all($result);
                foreach ($result as $fieldkey => $key) {
                    array_push($value, implode($key));
                }
            } else {
                echo mysqli_error($conn);
            }
            $value = sizeof($value)+1;
            if (!isset($_POST['display']['parent_blog_id']))
                $_POST['display']['parent_blog_id'] = $flag;
            foreach ($_POST['display']['parent_blog_id'] as  $key) {
                $conn = connect();
                $sql1 = "INSERT INTO post_id(parent_category_id,blog_id) VALUES('$key','$value')
                ; ";
                if (!mysqli_query($conn, $sql1)) {
                    echo mysqli_error($conn);
                }
            }
            echo "TRANSACTION TABLE UPDATED";
        }
        function last_login()
        {
            $id = implode(' ', $_SESSION['id']);
            $time = time();
            $day = date('d M Y @ H:i:s', $time);
            $conn = connect();
            $sql1 = "UPDATE user SET Last_Login='$day' WHERE customer_id=$id;
                ; ";
            if (!mysqli_query($conn, $sql1)) {
                echo mysqli_error($conn);
            }
        }
        ?>
  </body>

  </html>