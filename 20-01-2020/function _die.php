<?php
$string = 'My name is';
$string_name = 'abc';
echo 'Will only print first string and print nothing after die function is used<br>';
echo '<br>' . $string;
die();
echo $string_name;
?>