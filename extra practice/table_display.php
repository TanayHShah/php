<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="table_display.php" method="GET">
    <label>Enter Number You Want to Find Table Of: </label><input type="number" name="table_number" required><br>
    <br><label>Enter Number Of Terms: </label><input type="number" name="term" required min="0"><br>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['term'])) {
    $number = $_GET['table_number'];
    $i = $_GET['term'];
    echo '<br>Table Of ' . $number . ' Is As Follow : <br>';
    for ($j = 0; $j <= $i; $j++) {
        echo $number * $j;
        echo '<br>';
    }
}
?>