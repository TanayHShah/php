<style>
    label {
        display: inline-block;
        width: 250px;
    }
</style>
<form action="armstrong.php" method="GET">
    <label>Enter Number You Want to Check: </label><input type="number" name="term" required>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['term'])) {
    $term = 0;
    $number = $_GET['term'];
    $temp = $number;
    $temp1 = $number;
    while ($number !== 0) {
        $temp1 = $number % 10;
        $term = $term + ($temp1 * $temp1 * $temp1);
        $number = intval($number / 10);
    }
    if ($temp == $term) {
        echo '<br>Armstrong Number';
    } else {
        echo '<br>Not An Armstrong Number';
    }
}
?>