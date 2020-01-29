<?php
session_start();
$_SESSION['flag'] = 1;
function getValue($sectionName, $fieldName, $returntype = "")
{
    return isset($_POST[$sectionName][$fieldName])
        ? $_POST[$sectionName][$fieldName]
        : getSessionvalue($sectionName, $fieldName, $returntype = "");
}

function getSessionvalue($sectionName, $fieldName, $returntype = "")
{
    return isset($_SESSION[$sectionName][$fieldName])
        ? $_SESSION[$sectionName][$fieldName]
        : $returntype;
}

function setSession($section)
{
    $error = [];
    foreach ($_POST[$section] as $key => $value) {

        if (!validation($key, $value)) {
            echo "enter valid value for " . $key . "<br>";
            array_push($error, $key);
        }
    }
    if (empty($error)) {
        (isset($_POST[$section])) ? $_SESSION[$section] = $_POST[$section] : [];
    }
}
function validation($key, $value)
{
    switch ($key) {
        case 'first_name':
        case 'last_name':
            if (preg_match('/^[A-Z a-z]*$/', $value)) {
                return 1;
            }
            break;
        case 'password':
            if ($value == $_POST['account']['cnfpassword']) {
                return 1;
            }
            break;
        case 'number':
        case 'postal':
            if (preg_match('/^[0-9]*$/', $value)) {
                return 1;
            }
            break;
        default:
            return 1;
    }
}

if (isset($_POST['account']))
    setSession('account');
if (isset($_POST['address']))
    setSession('address');
if (isset($_POST['other']))
    setSession('other');
?>