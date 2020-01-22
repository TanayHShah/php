<?php
$term = 1;
for ($i = 1; $i <= 5; $i++) {
    for ($j = 0; $j < $term; $j++) {
        echo '*';
    }
    for ($j = 1; $j <= $i; $j++) {
        echo '0';
    }
    $term = $term + $i + 1;
    echo '<br>';
}
?>