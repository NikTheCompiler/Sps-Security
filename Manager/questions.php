<?php
session_start();
include_once('../php/connect.php');
include_once('../php/security.php');
Secure(1);
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
                      $dept=$row["dept"];


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
        <a class="nav-link collapsed" href="Grades.php">
          <i class="bi bi-calculator"></i>
          <span>Grades</span>
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

              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#questions">Questions</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#categories">Categories</button>
                </li>
              </ul>

              <div class="tab-content pt-2">

              <div class="tab-pane fade show active questions" id="questions">

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
                    <input type="text" required  autocomplete="off" id= "question" class="form-control" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 1<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" id= "choice1"class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 2<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" id= "choice2"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 3</label>
                  <div class="col-sm-8">
                    <input type="email"  autocomplete="off" id= "choice3" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 4</label>
                  <div class="col-sm-8">
                    <input type="email"  autocomplete="off" id= "choice4" class="form-control">
                  </div>
                </div>
              <!-- <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Answer<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" required autocomplete="off" id= "correctanswer"class="form-control">
                 </div>
                </div>                            TEXT BOX CORRECT ANSWER                                                                       -->
           <!--    <div class="row mb-3">
                  <label for="thecorrectanswer">&nbsp;&nbsp;&nbsp;&nbsp;Answer<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <div class="form group" id = "correctanswer">
                       <input type="radio" name="Correct_answer" value="1">
                       <label for="1">Answer 1</label>
                       <input type="radio" name="Correct_answer" value="2">
                       <label for="2">Answer 2</label>
                       <input type="radio" name="Correct_answer" value="3">
                       <label for="3">Answer 3</label>
                       <input type="radio" name="Correct_answer" value="4">
                        <label for="4">Answer 4</label>
                      </div>
                    </div>
                </div>                                               RADIO BUTTON CORRECT ANSWER                                                                           -->

                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Answer<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "corrans" required class="form-select" id= "correctanswer" aria-label="Default select example">
                          <option disabled selected value="">Choose the correct choice</option>
                          <option value="1">Choice 1</option>
                          <option value="2">Choice 2</option>
                          <option value="3">Choice 3</option>
                          <option value="4">Choice 4</option>
                        </select>
                      </div>
                    </div>


                <div class="row mb-4">
                      <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Department<span style="color: red">*</span></label>
                      <div class="col-sm-8">
                        <select name= "dept" required class="form-select" id= "dept2" aria-label="Default select example">
                          <option value= <?php echo $dept ?> >
                              <?php
                                include_once('../php/connect.php');
                                $sessiondept = $dept;
                                switch ($sessiondept){
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
                                }
                              ?>
                            </option>
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
                    <button  type="button"  class="btn btn-primary" data-bs-target="#modal" onclick="addQuestion()" >Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

              <!-- Edit Question Modal-->
              <div class="modal fade" id="modal-Edit-Question" >
                <div class="modal-dialog " style="max-width: 30%;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Question</h5>
                    </div>
                    <form >
                    <label for="name" class="col-sm-3 col-form-label"></span></label>
                    <div class="row mb-3">
                  <label for="name" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Question<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text"  autocomplete="off" class="form-control"  id= "question2" value="" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surname" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 1<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"   id= "choice12"  value="" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surname" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 2<span style="color: red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"   id= "choice22"  value="" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surname" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 3</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"   id= "choice32"  value="" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surname" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Choice 4</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"   id= "choice42"  value="" >
                  </div>
                </div>

                    <div class="row mb-4">
                          <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Answer<span style="color: red">*</span></label>
                          <div class="col-sm-8">
                            <select name= "correctans" required class="form-select" id= "correctans" aria-label="Default select example">
                              <option disabled selected value="">Choose the correct choice</option>
                              <option value="1">Choice 1</option>
                              <option value="2">Choice 2</option>
                              <option value="3">Choice 3</option>
                              <option value="4">Choice 4</option>
                            </select>
                          </div>
                        </div>


                    <div class="row mb-4">
                          <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Department<span style="color: red">*</span></label>
                          <div class="col-sm-8">
                            <select name= "dept" required class="form-select" id= "dept3" aria-label="Default select example">
                              <option value= <?php echo $dept ?> >
                                  <?php
                                    include_once('../php/connect.php');
                                    $sessiondept = $dept;
                                    switch ($sessiondept){
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
                                    }
                                  ?>
                                </option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-4">
                          <label class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Category<span style="color: red">*</span></label>
                          <div class="col-sm-8">
                            <select name= "position" required  class="form-select" id= "category2" aria-label="Default select example" >
                            <option disabled selected value="">Choose Category </option>
                              <option value="0">Officer</option>
                              <option value="1">Supervisor</option>
                              <option value="2">Manager</option>
                            </select>
                          </div>
                        </div>

                    <input hidden id="id2" name="id2"></field>

                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red">*</span> Indicates a required field</h6>

                    <div class="modal-footer">
                    <button  type="button" class="btn btn-primary" onclick="editQuestion()">Save Changes</button>
                    <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div><!-- End Edit_User_Modal-->

              <!-- Table with stripped rows -->
              <table class="table datatable">

                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">QID</th>
                    <th scope="col">Question</th>
					          <th scope="col">Choice 1</th>
                    <th scope="col">Choice 2</th>
                    <th scope="col">Choice 3</th>
                    <th scope="col">Choice 4</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Department</th>
					          <th scope="col">Category</th>
                    <th></th>

                  </tr>
                </thead>

                <tbody>

                <?php
                      include_once('../php/connect.php');
                      $sessiondept = $dept;
                      $result = sqlsrv_query($conn, "SELECT * FROM Questions WHERE Dept=$sessiondept ");

                        $i = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                          $i++;
                          $QID = $row["QID"];
                          $Ques = $row["Ques"];
                          $Choice1 = $row["Choice1"];
                          $Choice2 = $row["Choice2"];
                          $Choice3 = $row["Choice3"];
                          $Choice4 = $row["Choice4"];
                          $CorrectAns = $row["CorrectAns"];
                          $Dept= $row["Dept"]; //prepei na ginei DeptA gia na doulepsei to switch, j an ginei
                                               //DeptA kapoia Departments en polla meala j en ta forei mes ton pinaka j gamiete o pinakas
                          switch ($Dept){
                            case 1:
                                $DeptA = "CIT";
                                break;
                            case 2:
                                $DeptA = "MARC";
                                break;
                            case 3:
                                $DeptA = "CVSD";
                                break;
                            case 4:
                                $DeptA = "CPD";
                                break;
                            case 5:
                                $DeptA = "PD";
                                break;
                          }
                          $Category = $row["Category"]; // To idio me to DeptA
                          switch ($Category){
                            case 1:
                                $CategoryA = "";
                                break;
                            case 2:
                                $CategoryA = "";
                                break;
                            case 3:
                                $CategoryA = "";
                                break;
                            case 4:
                                $CategoryA = "";
                                break;
                            case 5:
                                $CategoryA = "";
                                break;
                            case 6:
                                $CategoryA = "";
                                break;
                          }
                          echo '
                          <tr>
                            <td>' . $i .'</td>
                            <td>' . $QID .'</td>
                            <td>' . $Ques . '</td>
                            <td>' . $Choice1 . '</td>
                            <td>' . $Choice2 . '</td>
                            <td>' . $Choice3 . '</td>
                            <td>' . $Choice4 . '</td>
                            <td hidden>' . $CorrectAns . '</td>
                            <td>Choice ' . $CorrectAns . '</td>
                            <td hidden>' . $Dept . '</td>
                            <td>' . $DeptA . '</td>
                            <td>' . $Category . '</td>
                            <td class="text-right py-0 align-middle col-sm-3">

                            <div class="btn-group btn-group-sm col-sm-11" >
                              <button class="btn btn-info" type="submit"  data-bs-toggle="modal" data-bs-target="#modal-Edit-Question" onclick="modalGetDataQuestion(this.parentNode.parentNode.parentNode)"></i>Edit</button>
                              <button class="btn btn-danger" type="submit" onclick="deleteQuestion(this.parentNode.parentNode.parentNode);"></i>Remove</button>
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

              <div class="tab-pane fade categories " id="categories">

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

              <!-- Table with stripped rows -->
              <table class="table datatable">

                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">CID</th>
                    <th scope="col">Category</th>
					          <th scope="col">Department</th>
                    <th></th>

                  </tr>
                </thead>

                <tbody>

                <?php
                      include_once('../php/connect.php');
                      $result = sqlsrv_query($conn, "SELECT * FROM Questions");

                        $i = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                          $i++;
                          $CID = $row["CID"];
                          $Cname = $row["Cname"];
                          $Dept= $row["Dept"]; //prepei na ginei DeptA gia na doulepsei to switch, j an ginei
                                               //DeptA kapoia Departments en polla meala j en ta forei mes ton pinaka j gamiete o pinakas
                          switch ($Dept){
                            case 1:
                                $DeptA = "CIT";
                                break;
                            case 2:
                                $DeptA = "MARC";
                                break;
                            case 3:
                                $DeptA = "CVSD";
                                break;
                            case 4:
                                $DeptA = "CPD";
                                break;
                            case 5:
                                $DeptA = "PD";
                                break;
                          }
                          echo '
                          <tr>
                            <td>' . $i .'</td>
                            <td>' . $CID .'</td>
                            <td>' . $Cname . '</td>
                            <td>' . $DeptA . '</td>
                            <td class="text-right py-0 align-middle col-sm-3">
                              <div class="btn-group btn-group-sm col-sm-11" >
                                <button class="btn btn-info" type="submit"  data-bs-toggle="modal" data-bs-target="#modal-Edit-Category" onclick="modalGetData(this.parentNode.parentNode.parentNode)"></i>Edit</button>
                                <button class="btn btn-danger" type="submit" onclick="deleteCategory(this.parentNode.parentNode.parentNode);"></i>Remove</button>
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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../assets/js/addEditRemove.js"></script>

</body>

</html>
