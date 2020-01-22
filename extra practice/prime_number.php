<style>
    label {
        display: inline-block;
        width: 250px;
    }
</style>
<form action="prime_number.php" method="GET">
    <label>Enter Number You Want to Check: </label><input type="number" name="term" required min="0">
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['term'])) {
    $flag=0;
    $number = $_GET['term'];
    for($i=2;$i<$number;$i++){
        if($number%$i==0){
            $flag=1;
            break;
        }
    }
    if ($flag==0) {
        echo '<br>Prime Number';
    } else {
        echo '<br>Not A Prime Number';
    }
}
?>