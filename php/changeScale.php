<?php
session_start();
include_once('connect.php');

$id=1;

$bad_input = $_POST["bad"];
$bad=strip_tags($bad_input);

$okay_input = $_POST["okay"];
$okay=strip_tags($okay_input);

$good_input = $_POST["good"];
$good=strip_tags($good_input);

$vgood_input = $_POST["vgood"];
$vgood=strip_tags($vgood_input);

$stmt = sqlsrv_prepare($conn, "UPDATE Scale SET Bad = ?, Okay = ?, Good=?, VeryGood=? WHERE id = ?",array($bad,$okay,$good,$vgood,$id));
if (sqlsrv_execute($stmt)){
    echo 1;
}else{
    echo 0;
}
    


?>