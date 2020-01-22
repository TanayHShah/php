<style>
    label {
        display: inline-block;
        width: 350px;
    }
</style>
<form action="hcf.php" method="GET">
    <label>Enter First Number: </label><input type="number" name="first_number" required min="0"><br>
    <br><label>Enter Second Number: </label><input type="number" name="second_number" required min="0"><br>
    <br><input type="submit"><br>

</form>
<?php
if (isset($_GET['first_number']) && isset($_GET['second_number'])) {
    $first_number = $_GET['first_number'];
    $second_number= $_GET['second_number'];
    $number=array();
    $index=0;
    $result=1;
    if($first_number>=$second_number){
        $term=$first_number;
    }
    else{
        $term=$second_number;
    }
    for($i=1;$i<=$term;$i++){
        $flag=0;
        for($j=4;$j<$i;$j++){
            if($i%$j==0){
                $flag=1;
            }
        }
        if($flag==0){
            if($first_number%$i==0 && $second_number%$i==0){
                $number[$index]=$i;
                $index++;
            }
        }
    }
    for($i=0;$i<$index;$i++){
        $result=$result*$number[$i];
    }
    echo '<br>H.C.F of '.$first_number.' & '.$second_number.' is : '.$result;
}
?>