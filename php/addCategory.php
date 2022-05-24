<?php
session_start(); 
include_once('connect.php');

$Cname = $_POST['Cname'];
$Dept = $_POST['deptCat'];

$username=$_SESSION['username'];

$categoryquery=0;

date_default_timezone_set('Europe/Riga');
$today = date("F j, Y, g:i a");

$checkq = sqlsrv_query($conn, "SELECT COUNT(CID) FROM Categories WHERE Cname='".$Cname."' and Dept='".$Dept."'");
$qu=sqlsrv_fetch_array($checkq,SQLSRV_FETCH_NUMERIC);

if($qu[0] == 0) {
    $addcategory = "INSERT INTO Categories
        (Cname,
         Dept
         )  
        VALUES   
        (?, ?)";  
  
/* Set parameter values. */  
$params = array($Cname, $Dept);
    /* Prepare and execute the query. */
    $categoryquery = sqlsrv_query($conn, $addcategory, $params);  
    if ($categoryquery) {  
        echo 1;
    } 
    else {  
        echo 0;  
    }

}
else if($qu[0]> 0){
    echo 2;   
} 

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to ADD CATEGORY with name '$Cname': ".($categoryquery?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);

?>