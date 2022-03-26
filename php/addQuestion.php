<?php
include_once('connect.php');

$question = $_POST['question']; 
$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$choice3 = $_POST['choice3'];
$choice4 = $_POST['choice4'];
$correctanswer = $_POST['correctanswer'];
$dept2 = $_POST['dept2'];
$category = $_POST['category'];

$checkq = sqlsrv_query($conn, "SELECT * FROM Questions WHERE Ques='".$question."'");
$qu=sqlsrv_fetch($checkq);
if($qu == 0) {
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

    if($qu != 0){
        echo 2;   
    }  
?>