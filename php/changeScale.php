<?php
session_start();
include_once('connect.php');

$username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

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
    
$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to CHANGE GRADING SCALE with entries-> bad:$bad,okay:$okay,good:$good,very good:$vgood: ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);

?>