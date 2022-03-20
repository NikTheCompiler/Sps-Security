<?php
session_start();
include_once('connect.php');

$tsql1 = "UPDATE Users   
          SET name = ? 
              surname = ?
              email = ?  
          WHERE UserID = ?";

$name_input = $_POST["name"];
$name = strip_tags($name_input);

$surname_input = $_POST["surname"];
$surname = strip_tags($surname_input);

$email_input = $_POST["email"];
$email = strip_tags($email_input);

$id = $_POST["id"];

$stmt1 = sqlsrv_query( $conn, $tsql1, array($name, $surname, $email, $id));  
if( $stmt1 === false )  
{  
     echo "Statement 1 could not be executed.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
?>