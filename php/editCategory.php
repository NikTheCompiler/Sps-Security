<?php
session_start();
include_once('connect.php');

$CID = $_POST["CID"];

$Cname_input = $_POST["Cname"];
$Cname=strip_tags($Cname_input);

$deptCat_input = $_POST["deptCatEdit"];
$deptCat = strip_tags($deptCat_input);



$stmt = sqlsrv_prepare($conn, "UPDATE Categories SET Cname = ?, Dept = ? WHERE CID = ?",array($Cname,$deptCat,$CID));
if (sqlsrv_execute($stmt)){
    echo 1;
}else{
    echo 0;
}
?>
