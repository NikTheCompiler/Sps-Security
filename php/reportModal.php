<!-- Report Modal -->

<?php
  include_once('../php/connect.php');

  $UserID=$_POST['id'];
  $TestID=$_POST['testID'];
  $result = sqlsrv_query($conn, "SELECT 'Name' FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE TestID = '".$TestID."'");
  $Name = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

  $result = sqlsrv_query($conn, "SELECT 'Surname' FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE TestID = '".$TestID."'");
  $Surname = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

  $result = sqlsrv_query($conn, "SELECT 'Date' FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE TestID = '".$TestID."'");
  $Date = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);


  $result = sqlsrv_query($conn, "SELECT * FROM Questions JOIN UserAns ON Questions.QID=UsersAns.QID WHERE TestID = '".$TestID."'");

  echo '
  <thead>
    <tr>
      <th>#</th>
      <th>Question</th>
      <th>Question Category</th>
      <th>Employee Answer</th>
      <th>Correct Answer</th>

    </tr>
  </thead>
<tbody>';

  $i = 0;
  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $i++;
    $Ques = $row["Ques"];
    $Category = $row["Category"];
    $UserAns=$row["UserAns"];
    $CorrectAns=$row["CorrectAns"];
    $Choice1=$row["Choice1"];
    $Choice2=$row["Choice2"];
    $Choice3=$row["Choice3"];
    $Choice4=$row["Choice4"];
    switch ($CorrectAns){
      case 1:
          $CorrectAnswer = $Choice1;
          break;
      case 2:
          $CorrectAnswer = $Choice2;
          break;
      case 3:
          $CorrectAnswer = $Choice3;
          break;
      case 4:
          $CorrectAnswer = $Choice4;
          break;
    }
  
    switch ($UserAns){
      case 1:
          $UserAnswer = $Choice1;
          break;
      case 2:
          $UserAnswer = $Choice2;
          break;
      case 3:
          $UserAnswer = $Choice3;
          break;
      case 4:
          $UserAnswer = $Choice4;
          break;
    }


    
    echo '
      <tr>
        <td>' . $i .'</td>
        <td>' . $Ques .'</td>
        <td>' . $Category .'</td>
        <td>' . $UserAnswer . '</td>
        <td>' . $CorrectAnswer . '</td>                                    
      </tr>
    </tbody>
    ';
  }

?>

