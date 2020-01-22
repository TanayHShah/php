<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="leap_year.php" method="GET">
    <label>Enter Year: </label><input type="number" name="first_number" minlength="4"  required ><br>
    <br><input type="submit"><br>
</form>
<?php
if (isset($_GET['first_number'])) {
    $year = $_GET['first_number'];
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                echo 'Leap Year.';
            } else {
                echo 'Not A Leap Year.';
            }
        } else {
            echo 'Leap Year.';
        }
    } else {
        echo 'Not A Leap Year.';
    }
}
?>