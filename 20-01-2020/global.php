 <?php
 error_reporting(0);
 $number1 = 5;
 $number2 = 5;
 function no_global(){
     echo '<br>WIll not Display sum of numbers as global is not declared .'.($number1 + $number2).'<br>';
 }
 function globall(){
     global $number1,$number2;
    echo '<br>WIll  Display sum of numbers as global is declared .'.($number1 + $number2).'<br>';
}
no_global();
globall();
 ?>