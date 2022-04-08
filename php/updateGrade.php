<?php
include_once('connect.php');
$UserID = $_POST['uid'];
$TestID = $_POST['TestID'];
$grade=0;

$sql=sqlsrv_query($conn,"SELECT UserAns.QID , UserAns.UserAns , Questions.CorrectAns FROM UserAns JOIN Questions ON UserAns.QID=Questions.QID AND UserAns.TestID='".$TestID."'");

while($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
    if($row["UserAns"]==$row["CorrectAns"]){
        $grade++;
    }
    
}

$stmt = sqlsrv_query($conn, "UPDATE Tests SET Grade = ? WHERE TestID = '".$TestID."' AND UserID = '".$UserID."' ",array($grade));
if ($stmt)
{
    echo json_encode($grade);
} else
{
    echo 0;
}


// $res = sqlsrv_query($conn,"SELECT CorrectAns FROM Questions WHERE QID = '".$QID."'");
// $correctAns = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

// if ($UserAns != $correctAns["CorrectAns"])
// {
//     echo 1;
// } else
// {
//     echo 0;
// }

?>