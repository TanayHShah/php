<style>
    table,
    tr {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 50px;
        height: 50px;
    }

    .black {
        background-color: black;
    }
</style>
<?php
echo '<table>';
for ($i = 0; $i < 8; $i++) {
    echo '<tr>';
    for ($j = 0; $j < 8; $j++) {
        if ($i % 2 == 0) {
            if ($j % 2 == 0) {
                echo '<td class="black"></td>';
            } else {
                echo '<td></td>';
            }
        } else {
            if ($j % 2 != 0) {
                echo '<td class="black"></td>';
            } else {
                echo '<td></td>';
            }
        }
    }
}
echo '</table>';
?>