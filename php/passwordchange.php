<?php
session_start();
include_once('connect.php');

$pass1 = $_POST["pass"];
$new_input = $_POST["newpass"];
$new1 = strip_tags($new_input);

$confirmpass1 = $_POST["confirmpass"];

$username = $_SESSION["username"];


    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

$sql = "SELECT * FROM Users WHERE username='".$username."'";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));
$row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);

$name=$row['name'];

$surname=$row['surname'];

$pass = hash("sha256", $pass1);
$new = hash("sha256", $new1);
$confirmpass = hash("sha256", $confirmpass1);

if ($row['password']==$pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' WHERE username = '".$username."'";

if ($stmt=sqlsrv_query($conn,$sql))
{
  echo 1;
}
else
{
  echo 0; 
}
}

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to CHANGE PASS: ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>
