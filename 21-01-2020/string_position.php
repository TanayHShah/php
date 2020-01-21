<style>
    label {
        display: inline-block;
        width: 100px;
    }
</style>
<form action="string_position.php" method="POST">
    <label>Enter a String : </label><textarea rows="3" cols="100" name="input" required></textarea><br>
    <br><label>Enter sub-string you want to find : </label><textarea rows="3" cols="100" name="sub_input" required></textarea><br>
    <br><input type="submit">
</form>
<?php
error_reporting(0);
if (isset($input_string) && isset($input_string)) {
    $input_string = $_POST['input'];
    $sub_input_string = $_POST['sub_input'];
    $length = strlen($sub_input_string);
    $offset = 0;
    echo '<br>Input String is : ' . $input_string . '<br>';
    echo '<br>Sub-String to find is : ' . $sub_input_string . '<br>';
    while ($string_position = strpos($input_string, $sub_input_string, $offset)) {
        echo '<br>' . $sub_input_string . ' found at postion ' . $string_position . '<br>';
        $offset = $string_position + $length;
    }
}
?>