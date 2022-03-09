
<?php
session_start();
include_once('../php/connect.php');
include_once ('../php/addUser.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Employees</title>
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

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
		  
        </li><!-- End Search Icon-->

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
        <a class="nav-link collapsed" href="Department1.php">
          <i class="bi bi-card-list"></i>
          <span>Department 1</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="Department2.php">
          <i class="bi bi-card-list"></i>
          <span>Department 2</span>
        </a>
      </li><!-- End Dashboard Nav -->
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
      </li><!-- End Profile Page Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employees</h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p> <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank"></a>  <code></code> </p>
				
				<!-- Basic Modal -->
				<p align="right">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Add Employee
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Employee</h5>
                    </div>
                    <?php include_once '../php/addUser.php' ?>
                    <form action="../php/addUser.php" method="POST">
                    <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label"> Name</label>
                  <div class="col-sm-8">
                    <input type="text" name= "name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">  Surname</label>
                  <div class="col-sm-8">
                    <input type="text" name= "surname"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Position</label>
                  <div class="col-sm-8">
                    <input type="text" name= "position"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" name= "username"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name= "email"class="form-control">
                  </div>
                </div>
					          
                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">Department</label>
                      <div class="col-sm-8">
                        <select name= "dept" class="form-select" aria-label="Default select example">
                          <option value="0">Dept</option>
                          <option value="1">Dept</option>
                          <option value="2">Dept</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">Type</label>
                      <div class="col-sm-8">
                        <select name= "type"class="form-select" aria-label="Default select example">
                          <option value="0">User</option>
                          <option value="1">Manager</option>
                          <option value="2">Secretary</option>
                        </select>
                      </div>
                    </div>
					          
					            
                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">Πιστοποιητικο Αστυνομίας</label>
                      <div class="col-sm-8">
                        <select name= "policecert" class="form-select" aria-label="Default select example">
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                          
                        </select>
                      </div>
                    </div>
                    
                      
					           
                     
                    
				
                    <div class="modal-footer">
                    <button  type="submit" name="add" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
			<p align="right">
        
              <!-- Table with stripped rows -->
              <table class="table datatable">
			  
                <thead>
				
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
					          <th scope="col">Department</th>
                    <th scope="col">Position</th>
                    <th></th>
                  </tr>
                </thead>
				
                <tbody>
                <?php
                      include_once('../php/connect.php');
                      $result = sqlsrv_query($conn, "SELECT * FROM Users WHERE type = 1 or type=2 or type=0");
                      
                        $i = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC)) {
                          $i++;
                          $id = $row[0];
                          $name = $row[1];
                          $surname = $row[2];
                          $dept= $row[4];
                          $position=$row[9];
                          $type = $row[5];
                          echo '
                          <tr> 
                            <td>' . $i .'</td>
                            <td>' . $id .'</td>
                            <td>' . $name . '</td>
                            <td>' . $surname . '</td>
                            <td>' . $dept . '</td>
                            <td>' . $position . '</td>
                            <td hidden>' . $type . '</td>
                            <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">                       
                                <button class="btn btn-info" type="submit" data-toggle="modal" data-target="#modal-Edit-User" onclick="modalGetData(this.parentNode.parentNode.parentNode)"></i>Edit</button>
                                <button class="btn btn-danger" type="submit" onclick="deleteUser(this.parentNode.parentNode.parentNode);"></i>Remove</button>
                                <button type="button" class="btn btn-dark"></i>Generate Pass</button>
                              </div>
                              
                            </td>
                          </tr>
                          ';
                        }
                                       
                ?>
                  
                </tbody>
				
              </table>
			  
              <!-- End Table with stripped rows -->
              
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
      <!-- You can delete fe links only if you purchased the pro version. -->
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