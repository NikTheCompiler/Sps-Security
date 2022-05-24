<?php
session_start(); 
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

    $usernamelog=$_SESSION['username'];
    
    $stmt=0;

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

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

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to ADD USER with name '$name $surname': ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$usernamelog.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>