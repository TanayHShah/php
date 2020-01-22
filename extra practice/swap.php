<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="swap.php" method="GET">
    <label>Enter First Number: </label><input type="number" name="first_number" required min="0"><br>
    <br><label>Enter Second Number: </label><input type="number" name="second_number" required min="0"><br>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['first_number']) && isset($_GET['second_number'])) {
    $first_number = $_GET['first_number'];
    $second_number = $_GET['second_number'];
    echo '<br>Before Swapping<br>';
    echo '<br>The first Number Is :' . $first_number . '<br>';
    echo '<br>The second Number Is :' . $second_number . '<br>';
    $temp = $first_number;
    $first_number = $second_number;
    $second_number = $temp;
    echo '<br>After Swapping<br>';
    echo '<br>The first Number Is :' . $first_number . '<br>';
    echo '<br>The second Number Is :' . $second_number . '<br>';
}
?>