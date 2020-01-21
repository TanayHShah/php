<style>
    label {
        width: 250px;
        display: inline-block;
    }
</style>
<h1>Calculator</h1>
<p>1.Addition</p>
<p>2.Subtraction</p>
<p>3.Multiplication</p>
<p>4.Division</p>
<p>5.Exit</p>
<form action="calc.php" method="GET">
    <br><label>Enter the First number:</label><input type="number" name="value1" required><br>
    <br><label> the Second number:</label><input type="number" name="value2" required><br>
    <br><label> Enter the Your Choice:</label><input type="number" name="value3" min="1" max="5" required><br>
    <br><input type="submit">
</form>
<?php
error_reporting(0);

$number1 = $_GET['value1'];

$number2 = $_GET['value2'];

$number3 = $_GET['value3'];
if(isset($number3) && $number3 !== '')
{
switch ($number3) {
    case 1:
        echo 'Sum is:' . ($number1 + $number2);
        break;
    case 2:
        echo 'Subtraction is:' . ($number1 - $number2);
        break;
    case 3:
        echo 'Multiplication is:' . ($number1 * $number2);
        break;
    case 4:
        echo 'Division is:' . ($number1 / $number2);
        break;
    default:
        echo 'Wrong choice';
}

if ($number3 === 5) {
    echo 'Thank You For Using Calculator';
}
}
?>