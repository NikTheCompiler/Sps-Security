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

  <title>Questions</title>
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
              <i class="bi bi-circle-fill"></i><span>CIT</span>
            </a>
          </li>
          <li>
            <a href="MARC.php">
              <i class="bi bi-circle-fill"></i><span>Monitoring & Alarm Receiving Center</span>
            </a>
          </li>
          <li>
            <a href="CVSD.php">
              <i class="bi bi-circle-fill"></i><span>Cash & Valuables Storage Department</span>
            </a>
          </li>
          <li>
            <a href="CPD.php">
              <i class="bi bi-circle-fill"></i><span>Cash Processing Department</span>
            </a>
          </li>
          <li>
            <a href="PD.php">
              <i class="bi bi-circle-fill"></i><span>Patrol Department</span>
            </a>
          </li>
          <li>
            <a href="HS.php">
              <i class="bi bi-circle-fill"></i><span>Health & Safety</span>
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
      <h1>Questions </h1>
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">

              <p> <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank"></a>  <code></code> </p>
			  
    <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal1">Add Category</button></p>
    <div class="modal fade" id="basicModal1" tabindex="-1">
                <div class="modal-dialog " style="max-width: 30%;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Category</h5>
                    </div>
                    
                    <form>
                    <label for="inputText" class="col-sm-3 col-form-label"></span></label>
                    <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Name<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required  autocomplete="off" name= "qname" id= "cname" class="form-control" >
                  </div>
                </div>

                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Department<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "dept" required class="form-select" id= "dept1" aria-label="Default select example">
                          <option disabled selected value="">Choose Department</option>
                          <option value="1">CIT</option>
                          <option value="2">Monitoring & Alarm Receiving Center</option>
                          <option value="3">Cash & Valuables Storage Department</option>
                          <option value="4">Cash Processing Department</option>
                          <option value="5">Patrol Department</option>
                        </select>
                      </div>
                    </div>
                    
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span> Indicates a required field</h6>

                    <div class="modal-footer">
                    <button  type="button"  class="btn btn-primary" data-bs-target="#modal" onclick="addCat()" >Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
    <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal2">Add Question</button></p>
    <div class="modal fade" id="basicModal2" tabindex="-1">
                <div class="modal-dialog " style="max-width: 30%;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Question</h5>
                    </div>
                    
                    <form >
                    <label for="inputText" class="col-sm-3 col-form-label"></span></label>
                    <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Question<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required  autocomplete="off" name= "qname" id= "qname" class="form-control" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 1<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" name= "c1" id= "c1"class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 2<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" name= "c2" id= "c2"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 3</label>
                  <div class="col-sm-8">
                    <input type="email"  autocomplete="off"  name= "c3" id= "c3" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 4</label>
                  <div class="col-sm-8">
                    <input type="email"  autocomplete="off"  name= "c4" id= "c4" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Answer<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" name= "answer" id= "answer"class="form-control">
                  </div>
                </div>
                

                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Department<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "dept" required class="form-select" id= "dept2" aria-label="Default select example">
                          <option disabled selected value="">Choose Department</option>
                          <option value="1">CIT</option>
                          <option value="2">Monitoring & Alarm Receiving Center</option>
                          <option value="3">Cash & Valuables Storage Department</option>
                          <option value="4">Cash Processing Department</option>
                          <option value="5">Patrol Department</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Category<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "position" required  class="form-select" id= "category" aria-label="Default select example" >
                        <option disabled selected value="">Choose Category </option>
                          <option value="0">Officer</option>
                          <option value="1">Supervisor</option>
                          <option value="2">Manager</option>
                        </select>
                      </div>
                </div>

                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span> Indicates a required field</h6>

                    <div class="modal-footer">
                    <button  type="button"  class="btn btn-primary" data-bs-target="#modal" onclick="addQues()" >Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

              <!-- Table with stripped rows -->
              <table class="table datatable">

                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
					          <th scope="col">Choice 1</th>
                    <th scope="col">Choice 2</th>
                    <th scope="col">Choice 3</th>
                    <th scope="col">Choice 4</th>
                    <th scope="col">Department</th>
					          <th scope="col">Category</th>
                    <th></th>

                  </tr>
                </thead>

                <tbody>

                  <tr>
                    <th scope="row">1</th>
                    <td>Question 1</td>
                    <td>Answer 1</td>
                    <td>Option 1,Option 2</td>
                    <td style="color:blue">remove</td>
					<td style="color:blue">edit</td>


                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Question 2</td>
                    <td>Answer 2</td>
                    <td>Option 1</td>
                    <td style="color:blue">remove</td>
					<td style="color:blue">edit</td>

                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Question 3</td>
                    <td>Answer 3</td>
                    <td>Option 1</td>
                    <td style="color:blue">remove</td>
					<td style="color:blue">edit</td>

                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Question 4</td>
                    <td>Answer 4</td>
                    <td>Option 1</td>
                    <td style="color:blue">remove</td>
					<td style="color:blue">edit</td>

                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Question 5</td>
                    <td>Answer 5</td>
                    <td>Option 1</td>
                    <td style="color:blue">remove</td>
					<td style="color:blue">edit</td>

                  </tr>
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
