<style>
    label {
        display: inline-block;
        width: 250px;
    }
</style>
<form action="factors.php" method="GET">
    <label>Enter Number You Want to Check: </label><input type="number" name="term" required min="0">
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['term'])) {
    $factor = array();
    $index = 0;
    $number = $_GET['term'];
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $factor[$index] = $i;
            $index++;
        }
    }
    echo '<br>Factors Are : <br>';
    for ($i = 0; $i < $index; $i++) {
        echo $factor[$i] . '<br>';
    }
}
?>