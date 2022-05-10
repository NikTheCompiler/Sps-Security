<?php
session_start();
include_once('../php/connect.php');
include_once('../php/security.php');

Secure(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CIT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SPS Private Security Services LTD</span>
      </a>

    </div><!-- End Logo -->
    <?php
                  $id = $_SESSION['UserID'];
                  $sql = "SELECT * FROM Users WHERE UserID = '".$id."'";
                  $result = sqlsrv_query($conn, $sql);
                  
                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
                      $id = $row["UserID"];
                      $name = $row["name"];
                      $surname = $row["surname"];
                      $position=$row["position"];
                    
                  
                    }

                    $scale= sqlsrv_query($conn,"SELECT * FROM Scale WHERE id=1");
                  $scaleinfo = sqlsrv_fetch_array($scale,SQLSRV_FETCH_ASSOC);
    ?>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/12345.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php
                echo $name;
                echo " ";
                echo $surname; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php
                echo $name;
                echo " ";
                echo $surname; ?></h6>
              <span><?php
              switch ($position){
                case 0:
                    echo "Officer";
                    break;
                case 1:
                    echo "Supervisor";
                    break;
                case 2:
                    echo "Manager";
                    break;
                case 3:
                    echo "Admin";
                    break;
                    case 4:
                      echo "Secretary";
                      break;
                default:
                    echo $position;
                    break;
              }
               ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="../php/signout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item"> 
        <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="CIT.php" class="active">
              <i class="bi bi-circle"></i><span>CIT</span>
            </a>
          </li>
          <li>
            <a href="MARC.php">
              <i class="bi bi-circle"></i><span>Monitoring & Alarm Receiving Center</span>
            </a>
          </li>
          <li>
            <a href="CVSD.php">
              <i class="bi bi-circle"></i><span>Cash & Valuables Storage Department</span>
            </a>
          </li>
          <li>
            <a href="CPD.php">
              <i class="bi bi-circle"></i><span>Cash Processing Department</span>
            </a>
          </li>
          <li>
            <a href="PD.php">
              <i class="bi bi-circle"></i><span>Patrol Department</span>
            </a>
          </li>
          <li>
            <a href="HS.php">
              <i class="bi bi-circle"></i><span>Health & Safety</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="employees.php">
          <i class="bi bi-layout-text-sidebar"></i>
          <span>Employees</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="questions.php">
          <i class="bi bi-question-lg"></i>
          <span>Questions</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="aboutus.php">
          <i class="bi bi-bank"></i>
          <span>About Us</span>
        </a>
      </li><!-- End Profile Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>  Departments</h1>

    </div><!-- End Page Title -->
<!-- Department 1 -->
            <div class="col-12">
              <div class="card recent-sales">


                <div class="card-body">


                  <h5 class="card-title">CIT<span></span></h5>
                  
<table border="0" cellspacing="5" cellpadding="5">
        
  <tbody>
    <tr>
      <td>Start date:</td>
      <td><input type="text" id="min" name="min"></td>
    </tr>
    <tr>
      <td>End date:</td>
      <td><input type="text" id="max" name="max"></td>
    </tr>
    </tbody>
</table>

       <table class="display nowrap" id="Grades" style="width:100%">
         <thead>
           <tr>
             <th>#</th>
             <th>ID</th>
             <th>Employee</th>
             <th>Grade</th>
             <th>Date</th>
             <th hidden>Date</th>
             <th>Status</th>
             <th>Report</th>
           </tr>
         </thead>
         <tbody>
             <?php
                   include_once('../php/connect.php');
                   $result = sqlsrv_query($conn, "SELECT * FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE dept='1' AND type=0 ");

                     $i = 0;
                     while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                       $i++;
                       $testId = $row["TestID"];
                       $id = $row["UserID"];
                       $name=$row["name"];
                       $surname=$row["surname"];
                       $grade=5*$row["Grade"];
                       $date = $row['Date']->format('Y/m/d');
                       if ($grade<$scaleinfo["Bad"]){
                        $status = "Bad";
                        $data1="<span class="."'badge rounded-pill bg-danger even-larger-badge'".">";
                        $data2="</span> ";
                       }
                       else if($grade<$scaleinfo["Okay"]){
                        $status = "Okay";
                        $data1="<span class="."'badge rounded-pill bg-warning even-larger-badge'".">";
                        $data2="</span> ";
                       }
                       else if($grade<$scaleinfo["Good"]){
                        $status = "Good";
                        $data1="<span class="."'badge rounded-pill bg-success even-larger-badge'".">";
                        $data2="</span> ";
                       }
                       else if($grade<=$scaleinfo["VeryGood"]){
                        $status = "Very Good";
                        $data1="<span class="."'badge rounded-pill bg-success even-larger-badge'".">";
                        $data2="</span> ";
                       }
                       
                       echo '
                       <tr>
                         <td>' . $i .'</td>
                         <td>' . $id .'</td>
                         <td>' . $name . ' '.$surname.'</td>
                         <td>' . $grade . '/100</td>
                         <td>' . $date . '</td>
                         <td hidden>' . $testId . '</td>
                         <td class="text-right py-0 align-middle col-sm-1">' . $data1 . '' . $status . ' ' . $data2 . '</td>
                         <td class="text-right py-0 align-middle col-sm-1">
                          <div class="btn-group btn-group-sm col-sm-11" >
                          <button class="btn btn-info" type="submit"  onclick="getReportData(this.parentNode.parentNode.parentNode)"></i>Get Report</button>
                          <button class="btn btn-primary" type="submit"   onclick="getPrintReportData(this.parentNode.parentNode.parentNode)"></i>Print Report</button>
                          </div>
                        </td>
                         
                       </tr>
                       ';
                     }

             ?>
          
             
             
         </tbody>
       </table>

                </div>

              </div>
            </div><!-- End Department 1 -->


</div>


<!-- Report Modal -->

<div class="modal fade" id="reportModal" >
                <div class="modal-dialog " style="max-width: 60%;">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      <label  for="name5" id="names">Report for Test of: <?php echo $name.' '.$surname?></label>
                      
                      <h6 value='' id='date'></h6>
                      
                    </div>
                    <table class="display nowrap" id="Report" style="width:100%">

                  </table>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                  </div>
                  
                </div>
              </div>
              <!-- End Report_Modal-->   


  </main><!-- End #main -->


  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

  <script src="../assets/js/daterange.js"></script>
  <script src="../assets/js/report.js"></script>
  

</body>

</html>
