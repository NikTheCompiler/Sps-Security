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

$stmt=0;

$username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

$checkq = sqlsrv_query($conn, "SELECT COUNT(QID) FROM Questions WHERE Ques='".$question."' and Dept='".$dept2."'");
$qu=sqlsrv_fetch_array($checkq,SQLSRV_FETCH_NUMERIC);

if($qu[0]==1){
    $checkqid = sqlsrv_query($conn, "SELECT QID FROM Questions WHERE Ques='".$question."' and Dept='".$dept2."'");
    $qid=sqlsrv_fetch_array($checkqid,SQLSRV_FETCH_ASSOC);
    if($qid["QID"]==$id){
        $stmt = sqlsrv_prepare($conn, "UPDATE Questions SET Ques = ?, Choice1 = ?, Choice2 = ?, Choice3 = ?, Choice4 = ?, CorrectAns = ?, Dept=?, Category = ? WHERE QID = ?",array($question,$choice1,
        $choice2,$choice3,$choice4,$correctanswer,$dept2,$category,$id));
            if (sqlsrv_execute($stmt)){
                echo 1;
            }else{
                echo 0;
            }
    }
    else{
        echo 2;
    }

}

else if($qu[0] == 0) {
    $stmt = sqlsrv_prepare($conn, "UPDATE Questions SET Ques = ?, Choice1 = ?, Choice2 = ?, Choice3 = ?, Choice4 = ?, CorrectAns = ?, Dept=?, Category = ? WHERE QID = ?",array($question,$choice1,
    $choice2,$choice3,$choice4,$correctanswer,$dept2,$category,$id));
    if (sqlsrv_execute($stmt)){
        echo 1;
    }else{
        echo 0;
    }
}
else if($qu[0] > 1){
    echo 2;   
} 


$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to EDIT QUESTION '$question': ".($stmt?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>
