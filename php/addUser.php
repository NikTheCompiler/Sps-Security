<?php
include_once('connect.php');




if(isset($_POST['add'])){

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $type = $_POST['type'];
    $username = $_POST['username'];
    $policecert = $_POST['policecert'];
    $position = $_POST['position'];
    $newuser = 0;
$tsql = "INSERT INTO Users   
        ( name,   
         surname,
         email,
         dept,
         type,
         username,
         password,
         policecert,
         position,
         newuser
         )  
        VALUES   
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  
  
/* Set parameter values. */  
$params = array($name, $surname,$email , $dept, $type, $username, '123' ,$policecert, $position, $newuser);  
  
/* Prepare and execute the query. */  
$stmt = sqlsrv_query($conn, $tsql, $params);  
if ($stmt) {  
    header('Location: ../Admin/employees.php');
} else {  
    echo "Row insertion failed.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  
}
?>