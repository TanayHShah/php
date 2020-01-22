<style>
    table,
    tr {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 70px;
        height: 70px;
    }
</style>
<?php
echo '<table>';
for ($i = 1; $i <= 5; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 6; $j++) {
        echo '<td>';
        echo $i . '*' . $j . '=' . ($i * $j);
        echo '</td>';
    }
    echo '</tr>';
}
?>