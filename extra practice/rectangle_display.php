<?php
for ($i = 0; $i <= 12; $i++) {
    for ($j = 0; $j <= 4; $j++) {
        if ($i != 0 && $i != 12 && $i % 3 == 0) {
            if ($j == 0 || $j==4) {
                echo '*';
                echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
            }
        }
        if ($i == 0 || $i == 12) {
            echo '*';
        }
    }
    echo '<br>';
}
?>