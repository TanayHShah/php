<?php
if (@mysqli_connect('localhost', 'roott', '') || exit('Displaying error through exit function : Wrong Input')) {
    echo 'Connected';
}
?>