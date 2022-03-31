<?php
include_once('connect.php');

$dept = $_POST['dept'];
$arr=array(4);
$i=0;
$sql="SELECT * FROM Questions  ";
$ques = sqlsrv_query($conn,$sql);

while ($row = sqlsrv_fetch_array($ques,SQLSRV_FETCH_ASSOC)) {
    $arr[$i]=$row["Ques"];
    $i=$i+1;
}

// $rand_keys = array_rand($arr, 2);
// echo $arr[$rand_keys[0]] . "\n";
// echo $arr[$rand_keys[1]] . "\n";
// $i=0;

// while($i<2){
//     echo $arr[$rand_keys[$i]] . "\n";
//     $i=$i+1;

// }

$previous = null;
    do {
        $prefix = $arr[array_rand($arr,2)];
    } while ($prefix === $previous && count($arr) > 1);
    $previous = $prefix;
    echo $prefix ;
    echo $arr[$rand_keys[0]] . "\n";
    echo $arr[$rand_keys[1]] . "\n";

?>


