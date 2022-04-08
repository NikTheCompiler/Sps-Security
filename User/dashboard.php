<?php
session_start();
include_once('../php/connect.php');
include_once('../php/security.php');
Secure(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartQuiz</title>
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
                      $dept=$row["dept"];
                    
                  
                    }
    ?>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <input hidden type="text"  name= "deptv" id= "deptv" class="form-control" value="<?php echo $dept ?>">
      <input hidden type="text"  name= "deptv" id= "idv" class="form-control" value="<?php echo $id ?>">
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
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="grades.php">
          <i class="bi bi-calculator"></i><span>Grades</span><i ></i>
        </a>

      </li><!-- End Tables Nav -->

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
      </li><!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>  Quiz</h1>

    </div><!-- End Page Title -->
<style>
h1 {

  font-size: 40px;
  margin-top: 0px;
}
</style>
<div class=" bg-white px-4" action="" id="que">
<center><h1>QUIZ</h1>
<text>Tries:1</text><center>
<text>Time:10 minutes</text><center>
<text>Test will be available on: 20 December 2021 00:00</text><center><br>

<center><button type="button" class="btn btn-primary" onclick="startQuiz()" >Start QUIZ</button><center>


</div>

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
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <!-- jQuery -->
  <script src="../jss/jquery/jquery.min.js"></script>
  
  
  <!-- Bootstrap 4 -->
  <script src="../jss/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../jss/bootstrap/js/bootstrap.js"></script>
  <script src="../jss/bootstrap/js/bootstrap.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../jss/dist/js/adminlte.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
  
  function startQuiz(){
    var TestID;
    var dept=document.getElementById("deptv").value;
    var UserID = document.getElementById("idv").value;
    Swal.fire({
    title: 'Are you ready?',
    text: "You will have 10 minutes to finish the quiz!" ,
    icon: 'warning',
    showCancelButton: true,
    reverseButtons: true,
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'

    }).then((result) =>{
      if (result.isConfirmed) {
        
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        $.post("../php/newTest.php",{
           UserID: UserID,
           date: date
        })
        .done(function(data) {
        if (data != 1) {
        TestID=data;
          $.post("../php/randomiseQuestions.php", {
            dept: dept,
            TestID: TestID
          })
            .done(function(data) {
              if (data != 1) {
                $("#que").html(data);
              }
            });
      
        }
      
        });
      
      
      }
    });
  }

  </script>


</body>

</html>
