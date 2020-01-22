<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="concatination.php" method="GET">
    <label>Enter Character Using Space: </label><input type="text" name="first_name" required><br>
    <br><label>Enter Character Using Space: </label><input type="text" name="second_name" required><br>
    <br><input type="submit"><br>
</form>
<?php
if (isset($_GET['first_name']) && isset($_GET['second_name'])) {
    $first_name = $_GET['first_name'];
    $second_name = $_GET['second_name'];
    $temp = array();
    $name1 = array();
    $name2 = array();
    $index = 0;
    $name1 = explode(" ", trim($first_name));
    $name2 = explode(" ", trim($second_name));

    if (sizeof($name1) < sizeof($name2)) {
        $short = sizeof($name1);
        $long = sizeof($name2);
        for ($i = 0; $i < $short; $i++) {
            $temp[$index] = $name1[$i] . $name2[$i];
            $index++;
        }
        for ($i = $short; $i < $long; $i++) {
            $temp[$index] = $temp[$index] . $name2[$i];
            $index++;
        }
        for ($i = 0; $i < $index; $i++) {
            echo $temp[$i];
        }
    }
    if (sizeof($name1) > sizeof($name2)) {
        $short = sizeof($name2);
        $long = sizeof($name1);
        for ($i = 0; $i < $short; $i++) {
            $temp[$index] = $name1[$i] . $name2[$i];
            $index++;
        }
        for ($i = $short; $i < $long; $i++) {
            $temp[$index] = $temp[$index] . $name1[$i];
            $index++;
        }
        for ($i = 0; $i < $index; $i++) {
            echo $temp[$i];
        }
    }
    if (sizeof($name1) == sizeof($name2)) {
        for ($i = 0; $i < sizeof(($name1)); $i++) {
            $temp[$index] = $name1[$i] . $name2[$i];
            $index++;
        }
        for ($i = 0; $i < $index; $i++) {
            echo $temp[$i];
        }
    }
}

?>