<?php
require_once('connect.php');
ob_end_clean();

require('../tcpdf/tcpdf.php');
  $id=$_GET["id"];
  $testid=$_GET["testid"];
  $table="";

  $sql = "SELECT * FROM Users WHERE UserID = '".$id."'";
                  $result2 = sqlsrv_query($conn, $sql);
                  
                    while ($row2 = sqlsrv_fetch_array($result2,SQLSRV_FETCH_ASSOC)) {
                      $name = $row2["name"];
                      $surname = $row2["surname"];
                    
                  
                    }
// Instantiation of FPDF class
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('SPS PRIVATE SECURITY SERVICES LTD');
$pdf->SetAuthor('SPS PRIVATE SECURITY SERVICES LTD');
$pdf->SetTitle('Test Report');
$pdf->SetSubject('Test Report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 18, 'SPS PRIVATE SECURITY SERVICES LTD', "6 Theotokis Street, 1055 Nicosia \nP.O.Box 27339,1644 Nicosia, Cyprus\nCompany: +357 22 265200\nwww.spssecurity.com.cy");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$result = sqlsrv_query($conn, "SELECT * FROM Questions JOIN UserAns ON UserAns.QID=Questions.QID JOIN Categories ON Categories.CID=Questions.Category WHERE TestID='".$testid."' ORDER BY Category ASC");
// Set some content to print
$number = sqlsrv_query($conn,"SELECT Grade,Date FROM Tests WHERE TestID='".$testid."' ");

$nu=sqlsrv_fetch_array($number,SQLSRV_FETCH_ASSOC);
$n=$nu["Grade"];
$f=20-$n;
$i = 0;
$date=$nu['Date']->format('d/m/Y');
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

  
     $table.='
      <tr>
        <td style="width:5%">' . $i .'</td>
        <td style="width:32%"> '.$Ques.' </td>
        <td> '.$deptA .'</td>
        <td> '.$Category.'</td>
        <td> '.$UserAnswer .'</td>
        <td >'.$CorrectAnswer.' </td>
        <td >'.$res.' </td>                          
      </tr>
    </tbody>';
   
  }

  if($table==""){ $table="<tr><td>Questions not found!</td></tr></tbody>";}

  if($n==NULL){$n=0;}

  $html = <<<EOD
  <strong>  Report for Test of Employee: $name $surname on $date</strong><br><br>
  <font size="11" face="Courier New" >
  <table  width="100%">
  <thead>
      <tr>
        <th style="width:5%">#</th>
        <th style="width:32%">Question</th>
        <th>Question Department</th>
        <th>Question Category</th>
        <th>Employee Answer</th>
        <th>Correct Answer</th>
        <th>Result</th>
  
      </tr>
    </thead>
  <tbody>
  $table
  </table>
  <br><br>
  <strong>Correct Answers: $n<br>False Answers: $f </strong>
  EOD;

  

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.


$pdf->Output('TestReport.pdf');
?>
