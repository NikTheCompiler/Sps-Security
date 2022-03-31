<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];

$question_input = $_POST["question"];
$question=strip_tags($question_input);

$choice1_input = $_POST["choice1"];
$choice1 = strip_tags($choice1_input);

$choice2_input = $_POST["choice2"];
$choice2 = strip_tags($choice2_input);

$choice3_input = $_POST["choice3"];
$choice3 = strip_tags($choice3_input);

$choice4_input = $_POST["choice4"];
$choice4 = strip_tags($choice4_input);

$correctanswer_input = $_POST["correctanswer"];
$correctanswer = strip_tags($correctanswer_input);

$dept2_input = $_POST["dept2"];
$dept2 = strip_tags($dept2_input);

$category_input = $_POST["category"];
$category = strip_tags($category_input);


$stmt = sqlsrv_prepare($conn, "UPDATE Questions SET Ques = ?, Choice1 = ?, Choice2 = ?, Choice3 = ?, Choice4 = ?, CorrectAns = ?, Dept=?, Category = ? WHERE QID = ?",array($question,$choice1,
$choice2,$choice3,$choice4,$correctanswer,$dept2,$category,$id));
if (sqlsrv_execute($stmt)){
    echo 1;
}else{
    echo 0;
}
?>