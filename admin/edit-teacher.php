<?php
session_start();

include('includes/config.php');

class TeacherDetailsUpdater {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function updateTeacherDetails($fullName, $teacherEmail, $teacherMobileNo, $teacherSubject, $teacherId) {
        $query = mysqli_query($this->con, "UPDATE tblteachers SET fullName='$fullName', teacherEmail='$teacherEmail', teacherMobileNo='$teacherMobileNo', teacherSubject='$teacherSubject' WHERE id='$teacherId'");
        return $query;
    }
}

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $teacherDetailsUpdater = new TeacherDetailsUpdater($con);

        $fname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $mobileno = $_POST['mobilenumber'];
        $tsubject = $_POST['tsubject'];
        $teacherid = intval($_GET['tid']);

        $queryResult = $teacherDetailsUpdater->updateTeacherDetails($fname, $email, $mobileno, $tsubject, $teacherid);

        if ($queryResult) {
            echo "<script>alert('Teacher details updated successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-teachers.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System  | Add Teacher</title>

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Teacher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
