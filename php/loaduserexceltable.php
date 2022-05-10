<?php
session_start();
include('connect.php');

$id=$_GET["id"];
$name=$_GET["name"];
$surname=$_GET["surname"];

$sql = "SELECT * FROM Users WHERE UserID = '".$id."'";
$result2 = sqlsrv_query($conn, $sql);

  while ($row2 = sqlsrv_fetch_array($result2,SQLSRV_FETCH_ASSOC)) {
    $name = $row2["name"];
    $surname = $row2["surname"];
  
  }
  ?>
  <?php
    $query ="SELECT COUNT(*) FROM Tests WHERE UserID = '".$id."' ";
    $results = sqlsrv_query($conn, $query);
    $results=sqlsrv_fetch_array($results,SQLSRV_FETCH_NUMERIC);

    if($results[0] == 0)
    {
      echo 1;
      exit;
    }
    
    ?>

 <center><h3><br>Report for the User: <?php echo $name . " " .$surname ?></h3></center>
  <table class="table datatable" id="tableuser">

  <thead>
      <tr>
        <th>#</th>
        <th>Test ID</th>
        <th>Date</th>
        <th>Grade</th>
      </tr>
    </thead>

  <tbody>
   
      <?php
      $i = 0;
    $sql5 = "SELECT * FROM Tests WHERE UserID = '".$id."' ORDER BY Date";
    $result5 = sqlsrv_query($conn, $sql5);
   

    $j = 0;
    $sum = 0;
    $average = 0;

    while ($row5 = sqlsrv_fetch_array($result5,SQLSRV_FETCH_ASSOC)) {
    $i++;
    $j++;
    $testid = $row5["TestID"];
    $date = $row5["Date"]->format('d/m/Y');
    $grade = $row5["Grade"] * 5;
    $sum = $sum + $row5["Grade"] * 5;
    $average = $sum / $j;
    ?>
    <?php
echo"
      <tr>
        <td>  $i  </td>      
        <td>  $testid  </td>       
        <td>  $date  </td>       
        <td>  $grade  </td>           
      </tr>";
    }
      ?>
    </tbody>
    
  </table>
  
    <br>
  <center><button  class="btn btn-success"  onclick="ExportToExcel('xlsx')">Export results to excel</button></center>
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script>
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('tableuser');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
    XLSX.writeFile(wb, fn || ('UserReport.' + (type || 'xlsx')));
}
</script>