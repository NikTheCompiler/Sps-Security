<?php
include_once('connect.php');

$Cname = $_POST['Cname'];
$Dept = $_POST['deptCat'];



$checkq = sqlsrv_query($conn, "SELECT * FROM Categories WHERE Cname='".$Cname."' and Dept='".$Dept."'");
$qu=sqlsrv_fetch($checkq);
if($qu == 0) {
    $addcategory = "INSERT INTO Categories
        (Cname,
         Dept
         )  
        VALUES   
        (?, ?)";  
  
/* Set parameter values. */  
$params = array($Cname, $Dept);
    /* Prepare and execute the query. */
    $questionquery = sqlsrv_query($conn, $addcategory, $params);  
    if ($questionquery) {  
        echo 1;
    } 
    else {  
        echo 0;  
    }

}
if($qu != 0){
    echo 2;   
}  
?>