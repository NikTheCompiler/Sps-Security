<?php
session_start();
include ("connect.php");

if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password']))
    {
    $username = $_POST["username"];
    $password  = $_POST["password"];
    $admin=3;
    $secretary=2;
    $manager=1;
    $user=0;
    extract($_POST);

    $sql = "SELECT * FROM Users WHERE username='".$username."'";
    $req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));
    $row = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);

    $_SESSION['type']=$row['type'];

    if($password !== $row['password'])
        {

        header('Location: ../login.php');
        exit;
        }
    else
        {
            if($_SESSION['type']== $admin){
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['dept'] = $row['dept'];
                $_SESSION['username'] = $username;
                $_SESSION['position'] = $row['position'];
                $_SESSION['UserID'] = $row['UserID'];
                $_SESSION['newuser'] = $row['newuser'];
                $_SESSION['password'] = $password;
                if ($row['newuser'] == '0')
                {
                  header('Location: ../NewUser.php');
                }
                else{
                header('Location: ../Admin/dashboard.php');
              }
            }
            else if($_SESSION['type']==$secretary){
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['dept'] = $row['dept'];
                $_SESSION['username'] = $username;
                $_SESSION['position'] = $row['position'];
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../Secretary/dashboard.php');
            }
            else if($_SESSION['type']== $manager){
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['dept'] = $row['dept'];
                $_SESSION['username'] = $username;
                $_SESSION['position'] = $row['position'];
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../Manager/dashboard.php');
            }
            else if($_SESSION['type']== $user){
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['dept'] = $row['dept'];
                $_SESSION['username'] = $username;
                $_SESSION['position'] = $row['position'];
                $_SESSION['UserID'] = $row['UserID'];
                header('Location: ../User/dashboard.php');
            }

        }
    }
    else {
    header('Location: ../login.php');
    exit;
}
?>
