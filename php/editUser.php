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

$username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

$stmt = sqlsrv_prepare($conn, "UPDATE Users SET name = ?, surname = ?, email = ?, dept = ?, type = ?, username = ?, policecert=?, position = ? WHERE UserID = ?",array($name,$surname,
$email,$dept,$type,$username,$policecert,$position,$id));
if (sqlsrv_execute($stmt)){
    echo 1;
}else{
    echo 0;
}

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to EDIT USER with name '$name $surname': ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>