<style>
    label {
        display: inline-block;
        width: 150px;
    }
</style>
<form action="string_function.php" method="GET">
    <label>Enter User Name : </label><input type="text" name="user" required>(Hint:user)<br>
    <br><label>Enter Password : </label><input type="password" name="password" required>(hint:Password)<br>
    <br><input type="submit">
</form>
<?php
$user_name = $_GET['user'];
$password = $_GET['password'];
if(strtolower($user_name)==='user' && strtolower($password)==='password'){
    echo 'Welcome '.strtoupper($user_name).'<br>';
    echo '<br>Using strtolower & strtoupper function';
}
else{
    echo 'Wrong Input';
}

?>