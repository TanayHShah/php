<?php
$name=' Tanay';//Embedded Value
$text="EMBEDDED TEXT";
echo '<br>Hello World<br>';//Simple Input String
echo '<br>Hello'.$name.'<br>';//Print With Variable
echo '<br><strong>HTML TAG</strong><br>';//Using HTML Tag
echo '<br><input type=\'text id=\'name><br>';//HTML Input Type
echo "<br><input type='text' id='name1'><br> ";//Double Inverted 
?>
<br><input type="text" value="<?php echo $text;?>"><br>
