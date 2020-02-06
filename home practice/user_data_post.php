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
    $error = [];
    session_start();
    // function getvalue($sectioname, $fieldname)
    // {
    //     return  isset($_POST[$sectioname][$fieldname]) ? $_POST[$sectioname][$fieldname] :
    //         getSessionvalue($sectioname, $fieldname);
    // }
    // function getSessionvalue($sectioname, $fieldname)
    // {
    //     return isset($_SESSION[$sectioname][$fieldname]) ? $_SESSION[$sectioname][$fieldname] :
    //         "";
    // }
    function setSessionvalue($sectioname)
    {
        global $error;
        foreach ($_POST[$sectioname] as $key => $value) {
            if (!validate($key, $value)) {
                echo 'ENTER VALID ' . strtoupper($key);
                array_push($error, $value);
            }
        }
       print_r($error);//error array
        if(empty($error)){
        isset($_POST[$sectioname]) ? $_SESSION[$sectioname] = $_POST[$sectioname] :
            [];
        }
    }
    function validate($key, $value)
    {
        switch ($key) {
            case 'user_name':
                if ($value == 'admin')
                    return 1;
                break;
            case 'user_password':
                if ($value == 'admin')
                    return 1;
        }
    }
    if(isset($_POST['admin']))
    setSessionvalue('admin');
    session_destroy();
    ?>
</body>

</html>