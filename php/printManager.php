<?php
session_start();
require_once('connect.php');
ob_end_clean();

require('../tcpdf/tcpdf.php');
  $department=$_GET["dept"];
  $table="";

  $username=$_SESSION['username'];

    date_default_timezone_set('Europe/Riga');
    $today = date("F j, Y, g:i a");

// Instantiation of FPDF class
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('SPS PRIVATE SECURITY SERVICES LTD');
$pdf->SetAuthor('SPS PRIVATE SECURITY SERVICES LTD');
$pdf->SetTitle('Test Report');
$pdf->SetSubject('Test Report');

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

              $talabels = array();
              $sql = " SELECT DISTINCT Categories.Cname
                       FROM Questions
                       JOIN UserAns 
                       ON Questions.QID=UserAns.QID
                       JOIN Categories
                       ON Questions.Category=Categories.CID
                       WHERE Questions.Dept= $department
                      ";

              $result = sqlsrv_query($conn, $sql);
              $i = 0;
              while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {

                $talabels[$i] = $row['Cname'];
                $i++;
             }
             
             ksort($talabels);
             $data = $talabels;
             $_SESSION['labelss'] = $talabels;
              
              
                 $talabelsdame = $_SESSION['labelss'];
                 $sql = " SELECT  Questions.QID, Questions.CorrectAns, Questions.Category, UserAns.UserAns, Categories.CID, Categories.Cname
                 FROM Questions
                 JOIN UserAns 
                 ON Questions.QID=UserAns.QID
                 JOIN Categories
                 ON Questions.Category=Categories.CID
                 WHERE Questions.Dept= $department
                  ";
                $result = sqlsrv_query($conn, $sql);

                $i = 0;
                $index = 0;
                $size = sizeof($talabelsdame);
                $datatwnlabels = array();
                $count = array();
            
                $o = 0;
                  for($o=0; $o<$size; $o++)
                  {
                    $datatwnlabels[$o] = 0;
                    $count[$o] = 0;
                  }
                while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
                  

                  $counter = 0;
                  
                  for($i=0; $i<$size; $i++){
                    if($row['Cname'] == $talabelsdame[$i]){
                      $index = $i;
                      $count[$index]++;
                      
                    }
                  }

                      if($row['CorrectAns'] == $row['UserAns']){
                        $datatwnlabels[$index] =  $datatwnlabels[$index] + 1;
                      }

                    $i ++;
                  }

                  for($i=0; $i<$size; $i++){
                  $apantisi = ($datatwnlabels[$i] / $count[$i]) * 100;
                  $datatwnlabels[$i] =  $apantisi;
                  }

                ksort($datatwnlabels);
                ksort($count);
               
            
                $apotelesmata = $datatwnlabels;

                  $k=0;
                  while($k<sizeof($data) && $k<sizeof($apotelesmata) ){
                      $table.='</tr>
                      <tr br="true">
                      <td>'.$data["$k"].'</td>
                      <td>'.(int)$apotelesmata["$k"].'%</td>
                      </tr>';
                      $k++;
                  }

              $html = <<<EOD

                <table border="1" cellpadding="2" cellspacing="2" align="center">
                <tr br="true">
                <th colspan="2">Percentage of correct answers each Category of Questions in the last 2 months</th>
                $table
                
               
                </table>
              EOD;
              $pdf->writeHTML($html, true, 0, true, 0);

              
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.


$pdf->Output('TestReport.pdf');

$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.$today.PHP_EOL.
    "Attempt to PRINT MANAGER CHART: ".($result?'Success':'Failed').PHP_EOL.
    "User: ".$username.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('../logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
?>
