<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];

$name_input = $_POST["name"];
$name = strip_tags($name_input);

$surname_input = $_POST["surname"];
$surname = strip_tags($surname_input);

$email_input = $_POST["email"];
$email = strip_tags($email_input);


$stmt1 = sqlsrv_prepare( $conn, "UPDATE Users SET name = ?, surname = ?, email = ?  WHERE UserID = ?", array($name, $surname, $email, $id));

if (sqlsrv_execute($stmt1)) {
    echo 1;
} else {
    echo 0;
}
?>