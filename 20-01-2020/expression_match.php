<?php
$email = 'user@gmail.com';
$no_email = 'user@123';
if(preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$email)){
    echo '<br>String '.'"'.$email.'"'.' is an email pattern<br>';
}
else{
    echo '<br>String '.'"'.$email.'"'.' is not an email pattern<br>';
}
if(preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$no_email)){
    echo '<br>String '.'"'.$no_email.'"'.' is an email pattern<br>';
}
else{
    echo '<br>String '.'"'.$no_email.'"'.' is not an email pattern<br>';
}
?>
