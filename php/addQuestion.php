<?php
session_start(); 
include_once('connect.php');

$question = $_POST['question']; 
$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$choice3 = $_POST['choice3'];
$choice4 = $_POST['choice4'];
$correctanswer = $_POST['correctanswer'];
$dept2 = $_POST['dept2'];
$category = $_POST['category'];

$username=$_SESSION['username'];

date_default_timezone_set('Europe/Riga');
$today = date("F j, Y, g:i a");

$checkq = sqlsrv_query($conn, "SELECT COUNT(QID) FROM Questions WHERE Ques='".$question."' AND Dept='".$dept2."' ");
$qu=sqlsrv_fetch_array($checkq,SQLSRV_FETCH_NUMERIC);

if($qu[0] == 0) {
    $addquestion = "INSERT INTO Questions
        ( Ques,
         Choice1,
         Choice2,
         Choice3,
         Choice4,
         CorrectAns,
         Dept,
         Category
         )  
        VALUES   
        (?, ?, ?, ?, ?, ?, ?, ?)";  
  
$params = array($question, $choice1, $choice2, $choice3, $choice4, $correctanswer, $dept2 ,$category);

    $questionquery = sqlsrv_query($conn, $addquestion, $params);  

    if ($questionquery) {  
        echo 1;
    } 
    else {
        echo 0;
    }


}

    else if($qu[0] > 0){
        echo 2;   
    }  

    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to ADD QUESTION '$question': ".($questionquery?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>