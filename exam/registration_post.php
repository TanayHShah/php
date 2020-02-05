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
  
  
    include 'connection.php';
    $error = [];
    function getvalue($sectionName, $fieldName)
{
    return isset($_POST[$sectionName][$fieldName])
        ? $_POST[$sectionName][$fieldName]
        :  getDatabasevalue($sectionName, $fieldName);
}
function getDatabasevalue($sectionName, $fieldName)
{
        $value= return_last_data($sectionName,$fieldName);
    return $value;
    }

    function setDatabase($section)
    {
        global $error;
        foreach ($_POST[$section] as $key => $value) {

            if (!validate($key, $value)) {
                echo "ENTER VALID " . $key . "<br>";
                array_push($error, $key);
            }
        }
        if ($section == 'register') {
            if ($_POST['terms'] != 'on') {
                echo 'ACCPET TERMS AND CONDITIONS';
                array_push($error, 'checkbox');
            }
        }

        if (empty($error)) {
            (isset($_POST[$section])) ?  check_function($section) : [];
        }
    }

    function validate($key, $value)
    {
        switch ($key) {
            case 'First_Name':
            case 'Last_Name':
                if (preg_match('/^[A-Z a-z]*$/', $value) && !empty($value)) {
                    return 1;
                }
                break;
            case 'Prefix':
                return 1;
                break;
            case 'Mobile':
                if (preg_match('/^[0-9]*$/', $value) && strlen($value) == 10) {
                    return 1;
                }
                break;
            case 'Email':
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return 1;
                }
                break;
            case 'Password':
                if ($value == $_POST['confirm_password']) {
                    return 1;
                }
                default:
                return 1;
        }
    }
    if (isset($_POST["submit_login"])) {
        check_action();
    }
    if (isset($_POST["submit_form"])) {
        setDatabase('register');
    }
    if (isset($_POST["submit_category"])) {
        setDatabase('category');
    }
    if (isset($_POST["submit_blog"])) {
        setDatabase('blog');
    }
    check_action();
    ?>
</body>

</html>