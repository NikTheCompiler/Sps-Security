<?php
  include_once('connect.php');

  $UserID=$_POST['id'];
  $TestID=$_POST['testID'];

  $result = sqlsrv_query($conn, "SELECT * FROM Questions JOIN UserAns ON UserAns.QID=Questions.QID JOIN Categories ON Categories.CID=Questions.Category WHERE TestID='".$TestID."' ORDER BY Category ASC");

  ?>
  <?php
                  
                  $sql = "SELECT * FROM Users WHERE UserID = '".$UserID."'";
                  $result2 = sqlsrv_query($conn, $sql);
                  
                    while ($row2 = sqlsrv_fetch_array($result2,SQLSRV_FETCH_ASSOC)) {
                      $name = $row2["name"];
                      $surname = $row2["surname"];
                    
                  
                    }
    ?>
  <thead>
    <tr>
      <th>#</th>
      <th>Question</th>
      <th>Question Category</th>
      <th>Employee Answer</th>
      <th>Correct Answer</th>
      <th>Result</th>

    </tr>
  </thead>
<tbody>
<?php
  $i = 0;
  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
    $i++;
    $Ques = $row["Ques"];
    $Category = $row["Cname"];
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
    if($CorrectAns==$UserAns){
      $res="Correct";
      $color="style='color:green'";
    }
    else{
      $res="False";
      $color="style='color:red'";
    }

  
     echo'
      <tr>
        <td>' . $i .'</td>
        <td>' . $Ques .'</td>
        <td>' . $Category .'</td>
        <td>' . $UserAnswer . '</td>
        <td >' . $CorrectAnswer . '</td>
        <td '.$color.'>' . $res . '</td>                                  
      </tr>
    </tbody>';
   
  }
  ?>
  

?>

