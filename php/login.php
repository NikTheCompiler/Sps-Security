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
    $data = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);
    
    $_SESSION['type']=$data['type'];

    if($password !== $data['password'])
        {
        
        header('Location: ../login.php'); 
        exit;
        }
    else
        {
            if($_SESSION['type']== $admin){
                $_SESSION['username'] = $username;
                header('Location: ../Admin/dashboard.php');
            }
            else if($_SESSION['type']==$secretary){
                $_SESSION['username'] = $username;
                header('Location: ../Secretary/dashboard.php');
            }
            else if($_SESSION['type']== $manager){
                $_SESSION['username'] = $username;
                header('Location: ../Manager/dashboard.php');
            }
            else if($_SESSION['type']== $user){
                $_SESSION['username'] = $username;
                header('Location: ../User/dashboard.php');
            }
        
        }    
    }   
    else {
    header('Location: ../login.php');
    exit;
}
?>