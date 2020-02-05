<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    $i = 1;
    for ($j = 0; $j < 2; $j++) {
        $array2 = [$i => [$i + 2, $i + 3], $i + 1 => [$i + 4, $i + 5]];
        $i++;
    }

    $array1 = [1 => $array2];
    echo '<pre>';
    print_r($array1);
    echo '</pre>';
    foreach($array1 as $fieldname => $value){
        echo '<pre>';
    echo print_r($fieldname)."=>".print_r($value).'<br>';
    echo '</pre>';    
}
    ?>

</body>

</html>