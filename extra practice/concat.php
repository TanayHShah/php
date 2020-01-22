<?php
$name1 = array('J', 'O', 'H', 'N');
$name2 = array('S', 'M', 'I', 'T', 'H');
$temp = array();
$index = 0;
for ($i = 0; $i < sizeof(($name1)); $i++) {
    $temp[$index] = $name1[$i] . $name2[$i];
    $index++;
}
for ($i = sizeof($name1); $i < sizeof($name2); $i++) {
    $temp[$index] = $temp[$index] . $name2[$i];
    $index++;
}
for ($i = 0; $i < $index; $i++) {
    echo $temp[$i];
}
?>