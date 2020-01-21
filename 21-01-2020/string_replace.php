<style>
label{
    display: inline-block;
    width:200px;
}

</style>
<form action="string_replace.php" method="POST">
<label>Enter a String : </label><textarea rows="3" cols="100" name="input" required></textarea><br>
<br><label>Enter sub-string you want to replace : </label><textarea rows="3" cols="100" name="sub_remove" required></textarea><br>
<br><label>Enter sub-string you want to replace with : </label><textarea rows="3" cols="100" name="sub_input" required></textarea><br>
<br><input type="submit">
</form>
<?php
error_reporting(0);
$input_string=$_POST['input'];
$sub_input_remove=$_POST['sub_remove'];
$sub_input_insert=$_POST['sub_input'];
echo '<br>Input String is : '.$input_string.'<br>';
echo '<br>Sub-String to replace is : '.$sub_input_remove.'<br>';
echo '<br>Sub-String to replace with is : '.$sub_input_insert.'<br>';
echo '<br>New String After Replacement is : '.'<br>';
echo '<br>';
echo str_replace($sub_input_remove,$sub_input_insert,$input_string);
?>