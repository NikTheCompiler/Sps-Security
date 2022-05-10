<?php
session_start();
include_once('connect.php');

  $UserID=$_GET['id'];
  $TestID=$_GET['testID'];

  $username=$_SESSION['username'];

        date_default_timezone_set('Europe/Riga');
        $today = date("F j, Y, g:i a");

  $result = sqlsrv_query($conn, "SELECT * FROM Questions JOIN UserAns ON UserAns.QID=Questions.QID JOIN Categories ON Categories.CID=Questions.Category WHERE TestID='".$TestID."' ORDER BY Category ASC");
  $testdate = sqlsrv_query($conn, "SELECT Date FROM Tests WHERE TestID='".$TestID."'");
  $testdate=sqlsrv_fetch_array($testdate,SQLSRV_FETCH_ASSOC);
  $testdate=$testdate["Date"]->format('d/m/Y');

  ?>
  <?php
                  
                  $sql = "SELECT * FROM Users WHERE UserID = '".$UserID."'";
                  $result2 = sqlsrv_query($conn, $sql);
                  
                    while ($row2 = sqlsrv_fetch_array($result2,SQLSRV_FETCH_ASSOC)) {
                      $name = $row2["name"];
                      $surname = $row2["surname"];
                    
                  
                    }
    ?>
<?php
    $query ="SELECT COUNT(QID) FROM UserAns WHERE TestID = '".$TestID."' ";
    $results = sqlsrv_query($conn, $query);
    $results=sqlsrv_fetch_array($results,SQLSRV_FETCH_NUMERIC);

    if($results[0] == 0)
    {
      echo"<center><h1><br>No Questions found for the User: $name $surname </h1></center>";
      goto a;
    }
    
    ?>
    <strong>  Report for Test of Employee: <?php echo $name." ". $surname." on ".$testdate;?> </strong>
    <table class="table datatable" id="tabletest">
  <thead>
    <tr>
      <th>#</th>
      <th>Question</th>
      <th>Question Department</th>
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
    $dept=$row["Dept"];
    switch ($dept){
      case 1:
          $deptA = "CIT";
          break;
      case 2:
          $deptA = "Monitoring & Alarm Receiving Center";
          break;
      case 3:
          $deptA = "Cash & Valuables Storage Department";
          break;
      case 4:
          $deptA = "Cash Processing Department";
          break;
      case 5:
          $deptA = "Patrol Department";
          break;
      case 6:
        $deptA = "Health & Safety";
        break;
    }
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
      default:
        $UserAnswer="";
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
        <td style="width:5%">' . $i .'</td>
        <td style="width:45%">' . $Ques .'</td>
        <td style="width:10%">' . $deptA .'</td>
        <td style="width:10%">' . $Category .'</td>
        <td style="width:10%">' . $UserAnswer . '</td>
        <td style="width:10%">' . $CorrectAnswer . '</td>
        <td '.$color.'>' . $res . '</td>                                  
      </tr>
    </tbody>';
   
  }
  $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
  "Attempt to GET REPORT for USER '$name $surname': ".($result?'Success':'Failed').PHP_EOL.
  "User: ".$username.PHP_EOL.
  "-------------------------".PHP_EOL;
  //Save string to log, use FILE_APPEND to append.
  file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
  ?>
  
  <center><button  class="btn btn-success"  onclick="ExportToExcel('xlsx')">Export results to excel</button></center>
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <?php a: ?>
  <script>
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('tabletest');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
    XLSX.writeFile(wb, fn || ('TestReport.' + (type || 'xlsx')));
}
</script>
  


