<?php
session_start();
include_once('connect.php');
$UserAns = $_POST['userAns'];
$QID = $_POST['qid'];
$TestID =$_POST['tid'];

$checktest = sqlsrv_query($conn,"SELECT * FROM UserAns WHERE TestID = '".$TestID."' AND QID = '".$QID."' ");
$executechecktest = sqlsrv_fetch_array($checktest, SQLSRV_FETCH_ASSOC);

if($executechecktest == 0)
{
    $addUserAns = "INSERT INTO UserAns
        ( QID,
         TestID,
         UserAns
         )  
        VALUES   
        (?, ?, ?)";  
  
    $params = array($QID,$TestID,$UserAns);
    $questionquery = sqlsrv_query($conn, $addUserAns, $params);

}

else
{
    $updaterow = sqlsrv_prepare($conn, "UPDATE UserAns SET UserAns = ? WHERE TestID = '".$TestID."' AND QID = '".$QID."' ",array($UserAns));
    sqlsrv_execute($updaterow);
}

$res = sqlsrv_query($conn,"SELECT CorrectAns FROM Questions WHERE QID = '".$QID."'");
$correctAns = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

if ($UserAns != $correctAns["CorrectAns"])
{
    echo 1;
} else
{
    echo 0;
}

?>