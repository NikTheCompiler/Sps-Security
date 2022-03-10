<?php

include_once('connect.php');

$id = $_POST["id"];

$name_input = $_POST["name"];
$name = strip_tags($name_input);

$surname_input = $_POST["surname"];
$surname = strip_tags($surname_input);

$position_input = $_POST["position"];
$position = strip_tags($position_input);

$email_input = $_POST["email"];
$email = strip_tags($email_input);

$dept_input = $_POST["dept"];
$dept = strip_tags($dept_input);

$type_input = $_POST["type"];
$type = strip_tags($type_input);

$policecert_input = $_POST["policecert"];
$policecert = strip_tags($policecert_input);

$stmt = sqlsrv_prepare($conn, "UPDATE Users SET name = ?, surname = ?, position = ?, username = ?, email = ?, dept = ?, type = ?, policecert=? WHERE UserID = ?;",array(&$name,&$surname,
&$username,&$email,&$dept,&$type,&$policecert,&$id));
if (sqlsrv_execute($stmt)){
    echo 1;
}else{
    echo 0;
}
?>