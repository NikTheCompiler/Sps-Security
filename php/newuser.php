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
if(strlen($new)<5){
    $_SESSION['LoginError'] = "4";
    header('Location: ../Newuser.php');
    exit();
}
if ($pass==""){
    $_SESSION['LoginError'] = "3";
    header('Location: ../Newuser.php');
    exit();
}
if($row['password']== $pass){
if ($new==$confirmpass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' , newuser = '1' WHERE username = '".$user."'";
    if (sqlsrv_query($conn,$sql)){
      if($_SESSION['type']== $admin)
      {
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../Admin/dashboard.php');
        }

      else if($_SESSION['type']==$secretary)
      {
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../Secretary/dashboard.php');
      }
      else if($_SESSION['type']== $manager)
      {
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../Manager/dashboard.php');
      }
      else
      {
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../User/dashboard.php');
      }
    }
    else{
        $_SESSION['LoginError'] = "1";
        header('Location: ../Newuser.php');
    }

}
else{
    $_SESSION['LoginError'] = "2";
    header('Location: ../Newuser.php');
}
}
else{
    $_SESSION['LoginError'] = "3";
    header('Location: ../Newuser.php');
}

?>
