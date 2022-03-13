<?php
include_once('connect.php');
include_once('passgenerator.php');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $type = $_POST['type'];
    $username = $_POST['username'];
    $policecert = $_POST['policecert'];
    $position = $_POST['position'];
    $newuser = 0;

    $password = $pass;
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
$params = array($name, $surname,$email , $dept, $type, $username, $password ,$policecert, $position, $newuser);  
  
/* Prepare and execute the query. */  
$stmt = sqlsrv_query($conn, $tsql, $params);  
if ($stmt) {  
    echo json_encode($password);
    //header('Location: ../Admin/employees.php');
} else {  
    echo 0;
    echo "Row insertion failed.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  

?>