<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];

$name_input = $_POST["name"];
$name = strip_tags($name_input);

$surname_input = $_POST["surname"];
$surname = strip_tags($surname_input);

$username_input = $_POST["username"];
$username = strip_tags($username_input);

$dept_input = $_POST["dept"];
$dept = strip_tags($dept_input);

$position_input = $_POST["position"];
$position = strip_tags($position_input);

$type_input = $_POST["type"];
$type = strip_tags($type_input);

$email_input = $_POST["email"];
$email = strip_tags($email_input);

$policecert_input = $_POST["policecert"];
$policecert = strip_tags($policecert_input);


$stmt = sqlsrv_prepare($conn, "UPDATE Users SET name = ?, surname = ?, email = ?, dept = ?, type = ?, username = ?, policecert=?, position = ? WHERE UserID = ?",array($name,$surname,
$email,$dept,$type,$username,$policecert,$position,$id));
if (sqlsrv_execute($stmt)){
    echo 1;
}else{
    echo 0;
}
?>