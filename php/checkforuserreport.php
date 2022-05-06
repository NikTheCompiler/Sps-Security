<?php

include_once('connect.php');

$id = $_POST['id']; 

$query ="SELECT COUNT(*) FROM Tests WHERE UserID = '".$id."' ";
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