<?php
include_once('connect.php');
session_start();

$pass = $_POST["pass"];
$input = $_POST["newpass"];
$confirmpass = $_POST["confirmpass"];
$new = strip_tags($input);
$user = $_SESSION["username"];
$sql = "SELECT * FROM Users WHERE username='".$user."'";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));
$row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);
if ($pass==""){
    echo 3;
    exit();
}



if ($row["password"]== $pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE `Users` SET `password`="'.$new.'" WHERE `username`="'.$user.'";";
    if (sqlsrv_query($conn,$sql)){
        echo "1";
    }else{
        echo $sql;
    }

}else {
    echo 2;
}?>
