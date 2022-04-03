<?php
session_start();
include_once('connect.php');
$UserAns = $_POST['userAns'];
$QID = $_POST['qid'];
$TestID =$_POST['TestID']

$addUserAns = "INSERT INTO UserAns
        ( QID,
         UserAns,
         TestID
         )  
        VALUES   
        (?, ?, ?)";  
  
$params = array($QID, $UserAns,$TestID);
$questionquery = sqlsrv_query($conn, $addUserAns, $params);

$res = sqlsrv_query($conn,"SELECT CorrectAns FROM Questions WHERE QID = ?",$QID);
$correctAns = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

if ($UserAns == $correctAns["CorrectAns"])
{
    echo 1;
} else
{
    echo 0;
}

?>