<?php
session_start();
error_reporting(0);
include('includes/config.php');

class EnrollmentDetailsManager {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function getAllEnrollments() {
        $query = mysqli_query($this->con, "SELECT * FROM tblenrollment");
        $enrollments = [];
        while ($result = mysqli_fetch_array($query)) {
            $enrollments[] = $result;
        }
        return $enrollments;
    }
}

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    $enrollmentManager = new EnrollmentDetailsManager($con);
    $enrollments = $enrollmentManager->getAllEnrollments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System  | All Enrollments</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Enrollments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Enrollments</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Enrollment Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Enrollment No</th>
                    <th>Father Name/MotherName</th>
                    <th>Parent Mob/Email</th>
                    <th>Child Name</th>
                    <th>Child Age Group</th>
                    <th>Program Enroll For</th>
                    <th>Posting Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

