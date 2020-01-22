<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="increasing_pattern.php" method="GET">
    <label>Enter Number Of Rows: </label><input type="number" name="first_number" required min="0"><br>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['first_number'])) {
    $row = $_GET['first_number'];
    for ($i = 0; $i <= $row; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j . '&nbsp&nbsp';
        }
        echo '<br>';
    }
}
?>