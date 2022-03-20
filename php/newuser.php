<?php
session_start();
include_once('connect.php');

$admin=3;
$secretary=2;
$manager=1;
$user=0;

$pass = $_POST["pass"];
$new_input = $_POST["newpass"];
$new = strip_tags($new_input);

$confirmpass = $_POST["confirmpass"];

$user = $_SESSION["username"];


$sql1 = "SELECT * FROM Users WHERE username='".$user."'";
$req =  sqlsrv_query($conn, $sql1) or die(print_r(sqlsrv_errors(),true));
$row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);

if ($pass==""){
    echo 3;
    exit();
}

if ($row['password']== $pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' , newuser = '1' WHERE username = '".$user."'";
    if (sqlsrv_query($conn,$sql)){
      if($_SESSION['type']== $admin)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $user;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          $_SESSION['newuser'] = $row['newuser'];
          
          header('Location: ../Admin/dashboard.php');
        }

      else if($_SESSION['type']==$secretary)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $user;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          $_SESSION['newuser'] = $row['newuser'];
          
          header('Location: ../Secretary/dashboard.php');
      }
      else if($_SESSION['type']== $manager)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $user;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          $_SESSION['newuser'] = $row['newuser'];
          
          header('Location: ../Manager/dashboard.php');
      }
      else
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $user;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          $_SESSION['newuser'] = $row['newuser'];
          
          header('Location: ../User/dashboard.php');
      }
    }
    else{
        echo $sql;
    }

}
else{
    echo 2;
}?>
