<?php
session_start();
require_once('connect.php');
ob_end_clean();

require('../tcpdf/tcpdf.php');
  $id=$_GET["id"];
  $table="";

  $username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");
    $i = 0;
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
$pdf->SetTitle('User Report');
$pdf->SetSubject('User Report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 18, 'SPS PRIVATE SECURITY SERVICES LTD                                                            '.date("d/m/Y").'', 
"6 Theotokis Street, 1055 Nicosia \nP.O.Box 27339,1644 Nicosia, Cyprus\nCompany: +357 22 265200\nwww.spssecurity.com.cy");

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

     $table.='
      <tr>
        <td style="width:5%">' . $i .'</td>
        <td style="width:20%"> '.$testid.' </td>
        <td> '.$date .'</td>
        <td> '.$grade.'/100</td>                      
      </tr>
    </tbody>';
   

 // if($table==""){ $table="<tr><td>Tests for this employee not found!</td></tr></tbody>";}

  $html = <<<EOD
  <strong>  Report for User: $name $surname </strong><br><br>
  <font size="11" face="Courier New" >
  <table border="1" align="center" width="100%">
  <thead>
      <tr>
        <th align="center" style="width:5%">#</th>
        <th align="center" style="width:20%">Test ID</th>
        <th>Date</th>
        <th>Grade</th>
      </tr>
    </thead>
  <tbody>
  $table
  </table>
  <br><br>
  <strong> Average Grade: $average </strong>
  EOD;
}
  

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.


$pdf->Output('TestReport.pdf');

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to PRINT REPORT USER for USER '$name $surname': ".($result5?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>
