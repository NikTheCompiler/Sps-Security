
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
        <a class="nav-link" href="employees.php">
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
      <h1>Employees</h1>
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <p> <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank"></a>  <code></code> </p>
              <div hidden class="col-sm-2">
              <select class="form-select" id="ddldept">
                <option value="all">Select Department</option>
                <option value="1">CIT</option>
                <option value="2">Monitoring & Alarm</option>
                <option value="3">Cash & Valuables Storage Department</option>
                <option value="4">Cash Processing Department</option>
                <option value="5">Patrol Department</option>
              </select>
            </div>

				<!-- Basic Modal -->
				<p align="right">
              <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" >
                Add Employee
              </button>
              
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog " style="max-width: 30%;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Employee</h5>
                    </div>
                    
                    <form >
                    <label for="inputText" class="col-sm-3 col-form-label"></span></label>
                    <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Name<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required  autocomplete="off" name= "name" id= "name1" class="form-control" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Surname<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" name= "surname" id= "surname1"class="form-control">
                  </div>
                </div>
                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Position<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "position" required  class="form-select" id= "position1" aria-label="Default select example" >
                        <option disabled selected value="">Choose Position </option>
                          <option value="0">Officer</option>
                          <option value="1">Supervisor</option>
                          <option value="2">Manager</option>
                          <option value="4">Secretary</option>
                        </select>
                      </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Username<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" name= "username" id= "username1"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Email</label>
                  <div class="col-sm-8">
                    <input type="email"  autocomplete="off"  name= "email" id= "email1" class="form-control">
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
                          <option value="6">Health & Safety</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Type<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "type" required  class="form-select" id= "type1" aria-label="Default select example" >
                        <option disabled selected value="">Choose Type </option>
                          <option value="0">User</option>
                          <option value="1">Manager</option>
                          <option value="2">Secretary</option>
                        </select>
                      </div>
                    </div>


                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Police &nbsp;&nbsp;&nbsp;&nbsp;Certificate<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "policecert" required  class="form-select" id= "policecert1" aria-label="Default select example">
                        <option disabled selected value="" >Choose Yes or No </option>
                          <option value="0">No</option>
                          <option value="1">Yes</option>

                        </select>
                      </div>
                    </div>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span> Indicates a required field</h6>

                    <div class="modal-footer">
                    <button  type="button"  class="btn btn-primary" data-bs-target="#modal" onclick="addUser()" >Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

              <!-- Edit User Modal-->
              <div class="modal fade" id="modal-Edit-User" >
                <div class="modal-dialog " style="max-width: 30%;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Employee</h5>
                    </div>
                    <form >
                    <label for="name" class="col-sm-3 col-form-label"></span></label>
                    <div class="row mb-3">
                  <label for="name" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Name<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text"  autocomplete="off" class="form-control"  id= "name" value="" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surname" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Surname<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"   id= "surname"  value="" >
                  </div>
                </div>
                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Position<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "position" required  class="form-select" id= "position" aria-label="Default select example" >
                        <option disabled selected value="">Choose Position </option>
                          <option value="0">Officer</option>
                          <option value="1">Supervisor</option>
                          <option value="2">Manager</option>
                          <option value="4">Secretary</option>
                        </select>
                      </div>
                </div>
                <div class="row mb-3">
                  <label for="username" class="col-sm-3 col-form-label" >&nbsp;&nbsp;&nbsp;&nbsp;Username<span style="color: red" >*</span></label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"  id="username"  value="" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Email</label>
                  <div class="col-sm-8">
                    <input type="email" autocomplete="off" class="form-control"  id="email"  value="">
                  </div>
                </div>

                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Department<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select id= "dept" autocomplete="off" class="form-select" aria-label="Default select example">
                          <option disabled selected value="">Choose Department </option>
                          <option value="1">CIT</option>
                          <option value="2">Monitoring & Alarm Receiving Center</option>
                          <option value="3">Cash & Valuables Storage Department</option>
                          <option value="4">Cash Processing Department</option>
                          <option value="5">Patrol Department</option>
                          <option value="6">Health & Safety</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Type<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select id= "type" autocomplete="off" class="form-select" aria-label="Default select example" >
                        <option disabled selected value="">Choose Type </option>
                          <option value="0">User</option>
                          <option value="1">Manager</option>
                          <option value="2">Secretary</option>
                        </select>
                      </div>
                    </div>

                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Police &nbsp;&nbsp;&nbsp;&nbsp;Certificate<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select id= "policecert" autocomplete="off" class="form-select" aria-label="Default select example">
                        <option disabled selected value="" >Choose Yes or No </option>
                          <option value="0">No</option>
                          <option value="1">Yes</option>

                        </select>
                      </div>
                    </div>
                    <input hidden id="id" name="id"></field>

                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span> Indicates a required field</h6>

                    <div class="modal-footer">
                    <button  type="button" class="btn btn-primary" onclick="editUser()">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>

                    </form>
                  </div>
                </div>
              </div><!-- End Edit_User_Modal-->


			<p align="right">

              <!-- Table with stripped rows -->
              <table class="table datatable" id="table11">

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
                      $result = sqlsrv_query($conn, "SELECT * FROM Users WHERE type = 1 or type=2 or type=0 ");

                        $i = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                          $i++;
                          $id = $row["UserID"];
                          $name = $row["name"];
                          $surname = $row["surname"];
                          $username = $row["username"];
                          $dept= $row["dept"];
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
                            case 6:
                                $deptA = "Health & Safety";
                                break;
                          }

                          $position=$row["position"];
                          switch ($position){
                            case 0:
                                $positionA = "Officer";
                                break;
                            case 1:
                                $positionA = "Supervisor";
                                break;
                            case 2:
                                $positionA = "Manager";
                                break;
                            case 4:
                                $positionA = "Secretary";
                                break;    

                          }
                          $type = $row["type"];
                          $email = $row["email"];
                          $policecert = $row["policecert"];
                          echo '
                          <tr>
                            <td>' . $i .'</td>
                            <td>' . $id .'</td>
                            <td>' . $name . '</td>
                            <td>' . $surname . '</td>
                            <td hidden>' . $username . '</td>
                            <td hidden>' . $dept . '</td>
                            <td>' . $deptA . '</td>
                            <td hidden>' . $position . '</td>
                            <td>' . $positionA . '</td>
                            <td hidden>' . $type . '</td>
                            <td hidden>' . $email . '</td>
                            <td hidden>' . $policecert . '</td>
                            <td class="text-right py-0 align-middle col-sm-3">
                              <div class="btn-group btn-group-sm col-sm-11" >
                                <button class="btn btn-info" type="submit"  data-bs-toggle="modal" data-bs-target="#modal-Edit-User" onclick="modalGetData(this.parentNode.parentNode.parentNode)"></i>Edit</button>
                                <button class="btn btn-danger" type="submit" onclick="deleteUser(this.parentNode.parentNode.parentNode);"></i>Remove</button>
                                <button class="btn btn-dark" type="submit"  onclick="generatePass(this.parentNode.parentNode.parentNode);"></i>Generate Pass</button>
                                <button class="btn btn-primary" type="submit"   onclick="getUserPrintReportData(this.parentNode.parentNode.parentNode)"></i>Print Report</button>
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
  <!-- jQuery -->
  <script src="../jss/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../jss/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../jss/dist/js/adminlte.js"></script>
  <script src="../assets/js/daterange.js"></script>
  <script src="../assets/js/report.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../assets/js/addEditRemove.js"></script>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    

    $(document).ready(function () {
        $("#ddldept").on("change", function () {
            var dept = $('#ddldept').find("option:selected").val();
            SearchData(dept)
        });
    });
    function SearchData(dept) {
        if (dept.toUpperCase() == 'ALL' ) {
            $('#table11 tbody tr').show();
        } else {
            $('#table11 tbody tr:has(td)').each(function () {
                var rowdept = $.trim($(this).find('td:eq(5)').text());
                if (dept.toUpperCase() != 'ALL') {
                    if (rowdept.toUpperCase() == dept.toUpperCase()) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                } else if ($(this).find('td:eq(5)').text() != '' || $(this).find('td:eq(5)').text() != '') {
                    if (dept != 'all') {
                        if (rowdept.toUpperCase() == dept.toUpperCase()) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                    
                }
 
            });
        }
    }
</script>



</body>

</html>
