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

  <title>Quiz</title>
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
        <span class="d-none d-lg-block">SPS Security</span>
      </a>

    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/12345.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php
                echo $_SESSION["name"];
                echo " ";
                echo $_SESSION["surname"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php
                echo $_SESSION["name"];
                echo " ";
                echo $_SESSION["surname"]; ?></h6>
              <span><?php
                echo $_SESSION["position"];
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
        <a class="nav-link collapsed" href="quiz.php">
          <i class="bi bi-card-checklist"></i>
          <span>Quiz</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="grades.php">
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
          <i class="bi bi-at"></i>
          <span>About Us</span>
        </a>
      </li><!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>  QUIZ</h1>

    </div><!-- End Page Title -->


<style>
timer {

  font-size: 40px;
  margin-top: 0px;
}

</style>
<center>
<p> Time Left:</p>
</center>
<center>
<timer id="ten-countdown"></timer>
</center>
<script>

function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time is up!";
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

countdown( "ten-countdown", 10, 0 );

</script>



	<div class="row col-5">
  <h4 class="fw-bold text-center mt-3"></h4>
  <form class=" bg-white px-4" action="">
    <p class="fw-bold">Question 1</p>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" id="radioExample1" />
      <label class="form-check-label" for="radioExample1">
        Option 1
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" id="radioExample2" />
      <label class="form-check-label" for="radioExample2">
        Option 2
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" id="radioExample3" />
      <label class="form-check-label" for="radioExample3">
        Option 3
      </label>
    </div>
  </form>
  <div class="text-end">
    <button type="button" class="btn btn-primary">Submit</button>
  </div>
</div>

<div class="row col-5">
  <h4 class="fw-bold text-center mt-3"></h4>
  <form class="bg-white px-4" action="">
    <p class="fw-bold">Choose one or more options</p>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
      <label class="form-check-label" for="flexCheckDefault">
        Option 1
      </label>
    </div>

    <!-- Checked checkbox -->
    <div class="form-check">

      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" />
      <label class="form-check-label" for="flexCheckDefault2">
        Option 2
      </label>
    </div>

    <!-- Checked checkbox -->
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" />
      <label class="form-check-label" for="flexCheckDefault3">
        Option 3
      </label>
    </div>
  </form>
  <div class=" text-end">
    <button type="button" class="btn btn-primary">Submit</button>
  </div>

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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
