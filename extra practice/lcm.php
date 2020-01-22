<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="lcm.php" method="GET">
    <label>Enter First Number: </label><input type="number" name="first_number" required min="0"><br>
    <br><label>Enter Second Number: </label><input type="number" name="second_number" required min="0"><br>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['first_number']) && isset($_GET['second_number'])) {
    $first_number = $_GET['first_number'];
    $second_number = $_GET['second_number'];
    $flag = 0;
    $multiple = 1;
    if ($first_number > $second_number) {
        $term = $second_number;
        $term1 = $first_number;
    } elseif ($first_number < $second_number) {
        $term = $first_number;
        $term1 = $second_number;
    } else {
        $term = $first_number;
        $term1 = $second_number;
    }
    while ($flag != 1) {
        $result1 = ($term * $multiple);;
        if ($result1 % $term1 == 0) {
            $flag = 1;
        } else {
            $multiple++;
        }
    }
    echo 'L.C.M is : ' . $result1;
}

?>