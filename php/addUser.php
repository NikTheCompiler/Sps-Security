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
    $password1 = $pass;
    $password = hash("sha256", $password1);
    $mail[0]=0;

if($email!=""||$email!=null){
    $mt = sqlsrv_query($conn, "SELECT COUNT(UserID) FROM Users WHERE email='".$email."'");
    $mail=sqlsrv_fetch_array($mt,SQLSRV_FETCH_NUMERIC);
}

$tmt = sqlsrv_query($conn, "SELECT COUNT(UserID) FROM Users WHERE username='".$username."'");
$user=sqlsrv_fetch_array($tmt,SQLSRV_FETCH_NUMERIC);

if($user[0]==0 && $mail[0]==0){
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
        echo json_encode($password1);
        //header('Location: ../Admin/employees.php');
    } 
    else {  
        echo 0;
        echo "Row insertion failed.\n";  
        die(print_r(sqlsrv_errors(), true));  
    }  
}
else if($user[0]==1 && $mail[0]==0){
    echo 2;
}
else if($user[0]==1 && $mail[0]==1){
    echo 3;
}
else if($user[0]==0 && $mail[0]==1){
    echo 4;
}

?>