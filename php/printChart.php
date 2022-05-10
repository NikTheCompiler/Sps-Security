<?php
session_start();
require_once('connect.php');
ob_end_clean();

require('../tcpdf/tcpdf.php');
  $table="";

  $username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

// Instantiation of FPDF class
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('SPS PRIVATE SECURITY SERVICES LTD');
$pdf->SetAuthor('SPS PRIVATE SECURITY SERVICES LTD');
$pdf->SetTitle('Admin Chart');
$pdf->SetSubject('Admin Chart');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 18, 'SPS PRIVATE SECURITY SERVICES LTD                                                            '.date("d/m/Y").'', 
"6 Theotokis Street, 1055 Nicosia \nP.O.Box 27339,1644 Nicosia, Cyprus\nCompany: +357 22 265200\n\twww.spssecurity.com.cy");

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

$averagegrades=array();
$cmonth=date('m');
$newDate = date('m', strtotime('-1 month'));
$newDateYear=date('Y', strtotime('-1 month'));
$cyear=date('Y');

for($i=1;$i<6;$i++){
  $sql="SELECT Grade FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE dept='".$i."' AND type=0 AND MONTH(Date) BETWEEN '".$newDate."' AND '".$cmonth."' AND YEAR(Date) BETWEEN '".$newDateYear."' AND '".$cyear."' ";
  $qsum = sqlsrv_query($conn,$sql);
  $sum=0;
  $j=0;
  while ($gradesarr = sqlsrv_fetch_array($qsum,SQLSRV_FETCH_ASSOC)) {
    $sum=$sum+5*$gradesarr["Grade"];
    $j=$j+1;
  }
  if($j==0){
    $j=1;
  }
  (int)$averagegrades[$i-1]=(int)$sum/(int)$j;
  $sum=0;
}$depts=["CIT","Monitoring & Alarm Receiving Center","Cash & Valuables Storage Department","Cash Processing Department","Patrol Department"];

                  $k=0;
                  while($k<sizeof($averagegrades) ){
                      $table.='
                      <tr nobr="true">
                      <td>'.$depts[$k].' </td>
                      <td>'.(int)$averagegrades[$k].'%</td>
                      </tr>';
                      $k++;
                  }
                  

              $html = <<<EOD

                  <table border="1" cellpadding="2" cellspacing="2" align="center">
                  <tr nobr="true">
                  <th colspan="2">Average grade for each Department in the last 2 months
                  </th>
                  </tr>
                  $table
                  
                </table>
              EOD;



              $pdf->writeHTML($html, true, 0, true, 0);

              
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.


$pdf->Output('AdminChart.pdf');

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to PRINT ADMIN CHART: ".($qsum?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>
