<?php
session_start();
include_once('connect.php');
include_once('passgenerator.php');

$id = $_POST["id"];

$password = $pass;

if ($password==$pass){
    //$password = hash("sha256", $password);
    $sql = "UPDATE Users SET password='".$password."', newuser = '0' WHERE UserID = '".$id."'";

if (sqlsrv_query($conn,$sql))
{
    echo json_encode($password);
}
else
{
  echo 0; 
}
}
?>