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

  <title>Profile</title>
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
                      $email=$row["email"];
                      $dept=$row["dept"];
                      $position=$row["position"];
                    
                  
                }
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
        <a class="nav-link" href="profile.php">
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
      <h1>Profile</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/img/Secretary.jpg" alt="Profile" class="rounded-circle">
              <h2><?php
                echo $name;
                echo " ";
                echo $surname; ?></h2>
              <h3><?php
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
                 ?></h3>

            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8"><?php
                  echo $name;
                 ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Surname</div>
                    <div class="col-lg-9 col-md-8"><?php
                  echo $surname;
                 ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8"><?php
                  switch ($dept){
                  case 1:
                      echo"CIT";
                      break;
                  case 2:
                      echo "Monitoring & Alarm Receiving Center";
                      break;
                  case 3:
                      echo "Cash & Valuables Storage Department";
                      break;
                  case 4:
                      echo "Cash Processing Department";
                      break;
                  case 5:
                      echo "Patrol Department";
                      break;
                  case 6:
                      echo"Admin";
                      break;

                  }
                 ?>
                 </div>
                  </div>
					          <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8"><?php
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
                 ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php
                   echo $email;
                 ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                
                  <!-- Profile Edit Form -->
                  
                  <form>
                  <h5 class="card-title">Change Details</h5>
                  
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" autocomplete="off" id="name2" value="<?php echo $name ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="surname" class="col-md-4 col-lg-3 col-form-label">Surname</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="surname" type="text" class="form-control" autocomplete="off" id="surname2" value="<?php echo $surname ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="dept" class="col-md-4 col-lg-3 col-form-label">Department</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dept" type="text" disabled class="form-control" autocomplete="off" id="dept2" value="<?php
                 switch ($dept){
                 case 1:
                    echo "CIT";
                    break;
                 case 2:
                    echo "Monitoring & Alarm Receiving Center";
                    break;
                 case 3:
                    echo "Cash & Valuables Storage Department";
                    break;
                 case 4:
                    echo "Cash Processing Department";
                    break;
                 case 5:
                    echo "Patrol Department";
                    break;
                 default:
                    echo $dept;
                    break;
                    }
                  ?>">
                      </div>
                    </div>
					          <div class="row mb-3">
                      <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="position" type="text" disabled class="form-control" id="position2" value="<?php
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
                     ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" autocomplete="" id="email2" value="<?php echo $email ?>">
                      </div>
                    </div>
                    <div class="form-group" hidden>
                      <label for="name">id</label>
                      <input type="text" class="form-control" id="id2" value="<?php echo $id ?>">
                    </div>

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" onclick="editProfile()">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form >

                    <div class="row mb-3">
                      <label for="pass" class="col-md-4 col-lg-3 col-form-label" required>Current Password </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass" required type="password" class="form-control" id="pass" placeholder="Current Password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newpass" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpass" required type="password" class="form-control" id="newpass" placeholder="New Password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="confirmpass" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirmpass" required type="password" class="form-control" id="confirmpass" placeholder="Re-enter New Password">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" onclick="changePass()">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
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
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <!-- jQuery -->
  <script src="../jss/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../jss/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../jss/dist/js/adminlte.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="../assets/js/addEditRemove.js"></script>

</body>

</html>
