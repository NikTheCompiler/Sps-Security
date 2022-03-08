<?php
include_once('connect.php');
session_start();

$pass = $_POST["pass"];
$input = $_POST["newpass"];
$confirmpass = $_POST["confirmpass"];
$new = strip_tags($input);
$user = $_SESSION["username"];
if ($pass==""){
    echo 3;
    exit();
}
if($row=sqlsrv_fetch_array(sqlsrv_query($conn,'SELECT * FROM `Users` WHERE `username`="'.$user.'"'))){

if ($row["password"]== $pass){
    //$new = hash("sha256", $new);
    $sql = 'UPDATE `Users` SET `password`="'.$new.'" WHERE `username`="'.$user.'";';
    if (sqlsrv_query($con,$sql)){
        echo "1";
    }else{
        echo $sql;
    }

}else {
    echo 2;
}
}else{
    echo "SQL 1 PROBLEM";
}
