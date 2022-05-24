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


$username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");


$stmt1 = sqlsrv_prepare( $conn, "UPDATE Users SET name = ?, surname = ?, email = ?  WHERE UserID = ?", array($name, $surname, $email, $id));

if (sqlsrv_execute($stmt1)) {
    echo 1;
} else {
    echo 0;
}

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to EDIT PROFILE: ".($stmt1?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>