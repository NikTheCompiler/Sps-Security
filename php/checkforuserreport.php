<?php

include_once('connect.php');

$id = $_POST['id']; 

$query ="SELECT * FROM Tests WHERE UserID = '".$id."' ";
$results = sqlsrv_query($conn, $query);

if($results == "")
{
echo 0;
}
else
{
echo 1;
}


?>