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
  
/* Set parameter values. */  
$params = array($question, $choice1, $choice2, $choice3, $choice4, $correctanswer, $dept2 ,$category);
    /* Prepare and execute the query. */
    $questionquery = sqlsrv_query($conn, $addquestion, $params);  
    if ($questionquery) {  
        echo 1;
        echo "Question insertion succeed.\n";
    } 
    else {  
        echo 0;
        echo "Question insertion failed.\n";  
        die(print_r(sqlsrv_errors(), true));  
    }  
?>