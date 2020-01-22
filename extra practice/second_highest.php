<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="second_highest.php" method="GET">
    <label>Enter Numbers Using Space: </label><input type="text" name="first_number" required min="0"><br>
    <br><input type="submit"><br>
</form>
<?php
if (isset($_GET['first_number'])) {
    $first_number = $_GET['first_number'];
    $number = array();
    $number = explode(" ", trim($first_number));
    $result = $number[0];
    $result1 = $number[0];
    for ($i = 0; $i < sizeof($number); $i++) {
        if ($number[$i] > $result) {
            $result = $number[$i];
            $index = $i;
        }
    }
    for ($i = 0; $i < sizeof($number); $i++) {
        if ($i !== $index) {
            if ($number[$i] > $result1 && $number[$i] < $result) {
                $result1 = $number[$i];
            }
        }
    }

    echo 'Second Biggest Number In Array Is : ' . $result1;
}
?>