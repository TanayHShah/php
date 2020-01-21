<?php
$day = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
echo 'The whole array is : ';
print_r($day);
echo '<br>';
echo '<br>Particular element of array displayed is(first element) : ' . $day[0] . '<br>';
$day = array('Monday' => 100, 'Tuesday' => 200, 'Wednesday' => 300, 'Thursday' => 400, 'Friday' => 500, 'Saturday' => 600, 'Sunday' => 700);
echo '<br>Array after assigning different values to elements';
print_r($day);
echo '<br>';
$day = array('Weekdays' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), 'Weekends' => array('Saturday', 'Sunday'));
echo '<br>Array inserted inside an array<br>';
print_r($day);
echo '<br>';
echo '<br>Displaying Single Element from MultiDimensional Array : ' . $day['Weekdays'][0] . '<br>';
echo '<br>Displaying MultiDimentional array as list<br>';
echo '<br>';
foreach ($day as $element => $inner_array) {
    echo '<strong>' . $element . '</strong>';
    foreach ($inner_array as $item) {
        echo '<br>';
        echo $item;
        echo '<br>';
    }
    echo '<br>';
}
?>