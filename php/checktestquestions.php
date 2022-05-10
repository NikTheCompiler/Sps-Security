<?php

include_once('connect.php');

$testid = $_POST['testID']; 

$query ="SELECT COUNT(*) FROM UserAns WHERE TestID = '".$testid."' ";
$results = sqlsrv_query($conn, $query);

$results=sqlsrv_fetch_array($results,SQLSRV_FETCH_NUMERIC);

if($results[0] == 0)
{
echo 0;
}
else
{
echo 1;
}


?>