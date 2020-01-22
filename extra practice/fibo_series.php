<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="fibo_series.php" method="GET">
    <label>Enter Number of Terms you want to print : </label><input type="number" name="term" required min="2"><br>
    <br><input type="submit"><br>

</form>
<?php
error_reporting(0);
$term = $_GET['term'];
if (isset($term)) {
    $first_term = 0;
    $second_term = 1;
    echo $first_term . '<br>';
    echo $second_term . '<br>';
    for ($i = 2; $i < $term; $i++) {
        $third_term = $first_term + $second_term;
        echo $third_term . '<br>';
        $first_term = $second_term;
        $second_term = $third_term;
    }
}
?>