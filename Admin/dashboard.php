<?php
session_start();
include_once('../php/connect.php');
include_once('../php/security.php');
Secure(3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

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

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

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
        <a class="nav-link" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="CIT.php">
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
      </li>
      <!-- End Profile Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->

<div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <div class="d-table-cell w-100">
                <h5 class="card-title">Average grade for each Department in the last 2 months</h5>
              </div>
              <div class="d-table-cell align-middle">
                <button class="btn btn-primary" type="submit" onclick=""></i>Print Report</button>
              </div>
              <?php 
                $averagegrades=array(5);
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
                }

              ?>
              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['CIT', 'MARC', 'CVSD', 'CPD','PD'],
                      datasets: [{
                        label: 'Average Grades' ,
                        data: [<?php echo json_encode($averagegrades[0]); ?>, <?php echo json_encode($averagegrades[1]); ?>, <?php echo json_encode($averagegrades[2]); ?>, <?php echo json_encode($averagegrades[3]); ?>,
                         <?php echo json_encode($averagegrades[4]); ?>],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true,
                          suggestedMax: 100
                        },
                      }
                    }
                  });
                });
              </script>
              
              <!-- End Bar Chart -->
			  </div>
          </div>
        </div>
        <!-- Table without test -->
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Employees without a test in the last 2 months</h5>
              <table id="table1" class="datatable">
              
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Employee</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                   include_once('../php/connect.php');
                   $currentdate=date("Y-m-d");
                   $cmonth=date('m');
                   $newDate = date('m', strtotime('-1 month'));
                   $newDateYear=date('Y', strtotime('-1 month'));
                   $cyear=date('Y');
                   $result = sqlsrv_query($conn, "SELECT * FROM Users WHERE type=0 AND UserID NOT IN (SELECT  Users.UserID FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE type=0 AND MONTH(Date) BETWEEN '".$newDate."' AND '".$cmonth."' AND YEAR(Date) BETWEEN '".$newDateYear."' AND '".$cyear."') ");

                     $i = 0;
                     while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        $i++;
                        $id = $row["UserID"];
                        $name=$row["name"];
                        $surname=$row["surname"];
                        
                        
                        echo '
                        <tr>
                          <td>' . $id .'</td>
                          <td>'.''.'' . $name . ' '.$surname.'</td>
                        </tr>
                        ';
                     }

                    ?>
                    </tbody>
                  </table>
			  </div>
          </div>
        </div>
                     <!-- End Table without test -->

                </div>

              

            <!-- Today Recent Tests -->
            <div class="col-12">
              <div class="card recent-sales">
                <div class="card-body">
                  <h5 class="card-title">Recent Tests <span>| Today</span></h5>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Department</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                   include_once('../php/connect.php');
                   $currentdate=date("Y-m-d");
                   $result = sqlsrv_query($conn, "SELECT * FROM Users JOIN Tests ON Users.UserID=Tests.UserID WHERE type=0 AND Date='".$currentdate."' ");

                     $i = 0;
                     while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        $i++;
                        $id = $row["UserID"];
                        $name=$row["name"];
                        $surname=$row["surname"];
                        $dept=$row["dept"];
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
                        }
                        
                        echo '
                        <tr>
                          <td>' . $id .'</td>
                          <td>' . $name . ' '.$surname.'</td>
                          <td>' . $deptA . '</td>
                          <td>' . $grade . '/100</td>
                          <td class="text-right py-0 align-middle col-sm-1">' . $data1 . '' . $status . ' ' . $data2 . '</td>
                        </tr>
                        ';
                     }

                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Tests -->
            

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

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
  <script src="../assets/vendor/simple-datatables/simple-datatables2.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('table1');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
         perPage: 5
         });

       
    }
});
</script>
  

</body>

</html>
