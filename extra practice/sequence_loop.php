<?php
$index = 1;
for ($i = 1; $i < 5; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        echo $index;
        $index = $index + 4;
        echo '&nbsp&nbsp';
    }
    $index = $i + 1;
    echo '<br>';
}
?>