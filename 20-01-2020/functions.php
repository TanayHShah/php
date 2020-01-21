<?php
function no_argument()
{
    echo '<br>Funtion with no argument nor return<br>';
}
function no_return($number1, $number2)
{
    echo '<br>With Argument and no Return Displaying sum of input numbers = ' . ($number1 + $number2) .  '<br>';
}
function argument_return($number1, $number2)
{
    echo '<br>With Argument & Return(returning sum of numbers) = ';
    return $number1 + $number2;
}
no_argument();
no_return(5, 5);
$result = argument_return(10, 10);
echo $result;
?>