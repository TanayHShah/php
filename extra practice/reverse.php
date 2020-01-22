<style>
    label {
        display: inline-block;
        width: 150px;
    }
</style>
<form action="reverse.php" method="GET">
    <label>Enter Number: </label><input type="number" name="term" required><br>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['term'])) {
    $term = 0;
    $number = $_GET['term'];
    $temp = $number;
    while ($number != 0) {
        $temp = $number % 10;
        echo $temp;
        $number = intval($number / 10);
    }
}
?>