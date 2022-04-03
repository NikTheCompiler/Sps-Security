<?php
include_once('connect.php');
$Grade = $_POST['grade'];
$TestID = $_POST['TestID'];
$stmt = sqlsrv_prepare($conn, "UPDATE Tests SET Grade = ? WHERE TestID = ?",array($Grade,$TestID);
if ($stmt)
{
    echo 1;
} else
{
    echo 0;
}
?>