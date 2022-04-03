<?php
include_once('connect.php');
$UserID = $_POST["UserID"];
$Date = $_POST["Date"];

$addTest = "INSERT INTO Tests
        ( UserID,
         Date
         )  
        VALUES   
        (?, ?)";  
  
$params = array($UserID, $Date);
$questionquery = sqlsrv_query($conn, $addTest, $params);
$res = sqlsrv_query($conn, "SELECT TestID FROM Tests WHERE UserID = ? AND Date = ?", $params);
$TestID = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)
echo $TestID["TestID"];
?>