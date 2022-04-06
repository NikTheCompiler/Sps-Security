<?php
session_start();
include_once('connect.php');
$UserAns = $_POST['userAns'];
$QID = $_POST['qid'];
$TestID =$_POST['tid'];

$addUserAns = "INSERT INTO UserAns
        ( QID,
         TestID,
         UserAns
         )  
        VALUES   
        (?, ?, ?)";  
  
$params = array($QID,$TestID,$UserAns);
$questionquery = sqlsrv_query($conn, $addUserAns, $params);

$res = sqlsrv_query($conn,"SELECT CorrectAns FROM Questions WHERE QID = '".$QID."'",);
$correctAns = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

if ($UserAns != $correctAns["CorrectAns"])
{
    echo 1;
} else
{
    echo 0;
}

?>