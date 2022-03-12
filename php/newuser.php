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
$password = $_SESSION["password"];

if ($pass==""){
    echo 3;
    exit();
}

if ($password== $pass){
    //$new = hash("sha256", $new);
    $sql = "UPDATE Users SET password='".$new."' , newuser = '1' WHERE username = '".$user."'";
    if (sqlsrv_query($conn,$sql)){
      if($_SESSION['type']== $admin)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $username;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../Admin/dashboard.php');
        }

      else if($_SESSION['type']==$secretary)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $username;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../Secretary/dashboard.php');
      }
      else if($_SESSION['type']== $manager)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $username;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../Manager/dashboard.php');
      }
      else if($_SESSION['type']== $user)
      {
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['dept'] = $row['dept'];
          $_SESSION['username'] = $username;
          $_SESSION['position'] = $row['position'];
          $_SESSION['UserID'] = $row['UserID'];
          header('Location: ../User/dashboard.php');
      }
    }else{
        echo $sql;
    }

}
else{
    echo 2;
}?>
