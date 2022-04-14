<?php
session_start();
include_once('connect.php');

$pass1 = $_POST["pass"];
$new_input = $_POST["newpass"];
$new1 = strip_tags($new_input);

$confirmpass1 = $_POST["confirmpass"];

$user = $_SESSION["username"];

$sql = "SELECT * FROM Users WHERE username='".$user."'";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));
$row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);

$pass = hash("sha256", $pass1);
$new = hash("sha256", $new1);
$confirmpass = hash("sha256", $confirmpass1);

if ($row['password']==$pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' WHERE username = '".$user."'";

if (sqlsrv_query($conn,$sql))
{
  echo 1;
}
else
{
  echo 0; 
}
}

?>
