<?php
session_start();
include_once('connect.php');

$CID = $_POST["CID"];

$Cname_input = $_POST["Cname"];
$Cname=strip_tags($Cname_input);

$deptCat_input = $_POST["deptCatEdit"];
$deptCat = strip_tags($deptCat_input);


$checkq = sqlsrv_query($conn, "SELECT COUNT(CID) FROM Categories WHERE Cname='".$Cname."' and Dept='".$deptCat."'");
$qu=sqlsrv_fetch_array($checkq,SQLSRV_FETCH_NUMERIC);


if($qu[0]==1){
    $checkcid = sqlsrv_query($conn, "SELECT CID FROM Categories WHERE Cname='".$Cname."' and Dept='".$deptCat."'");
    $cid=sqlsrv_fetch_array($checkcid,SQLSRV_FETCH_ASSOC);
    if($cid["CID"]==$CID){
        $stmt = sqlsrv_prepare($conn, "UPDATE Categories SET Cname = ?, Dept = ? WHERE CID = ?",array($Cname,$deptCat,$CID));
        if (sqlsrv_execute($stmt)){
            echo 1;
        }else{
            echo 0;
        }
    }
    else{
        echo 2;
    }

}
else if($qu[0] == 0) {
    $stmt = sqlsrv_prepare($conn, "UPDATE Categories SET Cname = ?, Dept = ? WHERE CID = ?",array($Cname,$deptCat,$CID));
    if (sqlsrv_execute($stmt)){
        echo 1;
    }else{
        echo 0;
    }
}
else if($qu[0] > 1){
    echo 2;   
} 
?>
