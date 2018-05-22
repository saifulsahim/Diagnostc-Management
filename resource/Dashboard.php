<?php

require_once("../vendor/autoload.php");

session_start();

$objTestCategory = new App\TestCategory\TestCategory();

$objSubTestCategory = new App\SubTestCategory\SubTestCategory();

$objDoctors = new App\Doctors\Doctors();

$objExpenses = new App\Expenses\Expenses();


//$admin_id = $_SESSION['admin_id'];
//if($admin_id == NULL)
//{
//    //\App\Utility\Utility::redirect("index.php");
//}


?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../resource/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../resource/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"
     style="position: absolute; left: 0px; top: 0px; width: 100%;display: block" id="mainNav">

<!--    <a class="navbar-brand" href="index.html" style="float: left"> Diagonstic</a>-->
<!--    <div class="dropdown" width="100%">-->
<!--        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"-->
<!--                aria-haspopup="true" aria-expanded="true">Account Settings-->
<!--            <span class="caret"></span>-->
<!--        </button>-->
<!--        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
<!--            <li><a href="#">Action</a></li>-->
<!--            <li><a href="../logout.php">logout</a></li>-->
<!---->
<!--        </ul>-->
<!--    </div>-->
            <a href="../logout.php" class="logout text-right" style="text-decoration: none;
    color: #fff;
    font-weight: 500;float: right">Log Out</a>
<!--    </div>-->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Test Category">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentss"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Test Category</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponentss">
                    <li>
                        <a href="../views/TestCategory/add_category.php">Add Test Category </a>
                    </li>
                    <li>
                        <a href="../views/TestCategory/index.php">View All Test Category</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title=" Sub Test Category">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Sub Test Category</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="../views/SubTestCategory/add_category.php">Add Sub Test Category </a>
                    </li>

                    <li>
                        <a href="../views/SubTestCategory/index.php">Manage Sub Test Category </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsss"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Doctors</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponentsss">
                    <li>
                        <a href="../views/Doctors/add_doctor.php">Add Doctor </a>
                    </li>
                    <li>
                        <a href="../views/Doctors/index.php">Manage Doctors</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentssss"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Expenses</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponentssss">
                    <li>
                        <a href="../views/Expenses/add_category.php">Add Expense Category </a>
                    </li>
                    <li>
                        <a href="../views/Expenses/index.php">Manage Expense Category</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Invoice">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Invoice</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="../views/Invoice/add_invoice.php">Add Test Invoice</a>
                    </li>
                    <li>
                        <a href="../views/Invoice/index.php">Manage Test Invoice</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Invoice">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagesttt"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Manage Invoice</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePagesttt">
                    <li>
                        <a href="">Today Invoice</a>
                    </li>
                    <li>
                        <a href="../views/CustomInvoice/add_custom_invoice.php">Custom Invoice</a>
                    </li>

                    <li>
                        <a href="../views/CustomDoctorInvoice/add_custom_doctor_invoice.php">Custom Doctor Invoice</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reports">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagestttt"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Reports</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePagestttt">
                    <li>
                        <a href="../views/IncomeReport/add_income_report.php">Income Report</a>
                    </li>
                    <li>
                        <a href="../views/ExpenseReport/add_expense_report.php">Expense Report</a>
                    </li>
                    <li>
                        <a href="../views/TotalReport/add_total_report.php">Total Report</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="General Settings">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">General Settings</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="../views/Settings/add_settings.php">Settings</a>
                    </li>


                    <li>
                        <a href="../views/AddAdmin/add_admin.php">Add Admin</a>
                    </li>
                    <li>
                        <a href="../views/AddAdmin/index.php">Manage Admin</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper" style="height: 115vh;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5"><?php $row_count = $objTestCategory->count_rows();
                            echo $row_count ?> Test Categories
                        </div>

                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="../views/TestCategory/index.php"">
                    <span class="float-left">View Details</span>

                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5"><?php $row_count = $objSubTestCategory->count_rows();
                            echo $row_count ?> Sub Test Categories
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="../views/SubTestCategory/index.php">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa fa-male fa-x"></i>
                        </div>
                        <div class="mr-5"><?php $row_count = $objDoctors->count_rows();
                            echo $row_count ?> Doctors
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="../views/Doctors/index.php">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                        </div>
                        <div class="mr-5"><?php $row_count = $objExpenses->count_rows();
                            echo $row_count ?> Expenses
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="../views/Expenses/index.php">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
        </div>

        <!--        --><?php
        //        if(isset($_SESSION['admin_id'])) {
        //        echo $_SESSION['admin_id'];
        //        }
        //?>
    </div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small></small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../resource/jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../resource/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../resource/chart.js/Chart.min.js"></script>
    <script src="../resource/datatables/jquery.dataTables.js"></script>
    <script src="../resource/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
</div>
</body>


</html>
