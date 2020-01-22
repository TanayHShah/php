<?php
$temp=0;
for ($i = 0; $i <= 10; $i++) {
    for ($j = 0; $j <= 10; $j++) {
        if ($j == 0 || $j == 10 || $j==$temp ||  $j == 10-$temp) {
            echo '*';
        } else {
            echo '&nbsp&nbsp';
        }
    }
    echo '<br>';
    $temp++;
}
?>
