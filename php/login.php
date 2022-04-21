<?php
session_start();
include ("connect.php");

if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password']))
    {
    $username = $_POST["username"];
    $password1  = $_POST["password"];
    $admin=3;
    $secretary=2;
    $manager=1;
    $user=0;
    extract($_POST);

    $sql = "SELECT * FROM Users WHERE username='".$username."'";
    $req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));
    $row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);
    $password = hash("sha256", $password1);
    $_SESSION['type']=$row['type'];

    if($password != $row['password'])
        {
        $_SESSION['LoginError'] = "1";
        header('Location: ../index.php');
        
        }
    else
        {
          if ($row['newuser'] == '0')
          {
                $_SESSION['username'] = $username;
                $_SESSION['UserID'] = $row['UserID'];
            header('Location: ../NewUser.php');
          }
          else {
            if($_SESSION['type']== $admin){
              $_SESSION['username'] = $username;
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../Admin/dashboard.php');
              }
            
            else if($_SESSION['type']==$secretary){
              $_SESSION['username'] = $username;
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../Secretary/dashboard.php');
            }
            else if($_SESSION['type']== $manager){
              $_SESSION['username'] = $username;
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../Manager/dashboard.php');
            }
            else if($_SESSION['type']== $user){
              $_SESSION['username'] = $username;
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../User/dashboard.php');
            }
          }


        }
    }
    else {
      $_SESSION['LoginError'] = "2";
      header('Location: ../index.php');
    
}
?>
