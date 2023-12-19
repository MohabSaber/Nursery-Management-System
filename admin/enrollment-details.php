<?php
// Include the necessary files and initiate the session
session_start();
error_reporting(0);

// Database Connection (config.php)
include('includes/config.php');

class EnrollmentManager {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function updateEnrollment($eid, $estatus, $oremark) {
        $query = mysqli_query($this->con, "UPDATE tblenrollment SET officialRemark='$oremark', enrollStatus='$estatus' WHERE id='$eid'");

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

//Validating Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    // Create an instance of EnrollmentManager
    $enrollmentManager = new EnrollmentManager($con);

    //Code For Updation the Enrollment
    if (isset($_POST['submit'])) {
        $eid = intval($_GET['enrollid']);
        $estatus = $_POST['status'];
        $oremark = $_POST['officialremak'];

        // Call the updateEnrollment method
        $isUpdated = $enrollmentManager->updateEnrollment($eid, $estatus, $oremark);

        if ($isUpdated) {
            echo "<script>alert('Enrollment Status updated successfully.');</script>";
            // Redirect or perform any other action after successful update
            //echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
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
  <title>PreSchool Enrollment System  | New Enrollments</title>

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
            <h1>New Enrollments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">New Enrollments</li>
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
       
                  <tbody>
<?php $eid=intval($_GET['enrollid']);
$query=mysqli_query($con,"select * from tblenrollment where id='$eid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>


       <tr>
                  <th>Enrollment Number</th>
                    <td colspan="3"><?php echo $result['enrollmentNumber']?></td>
                  </tr>

                  <tr>
                  <th>Father Name</th>
                    <td><?php echo $result['fatherName']?></td>
                    <th>Mother Name</th>
                   <td> <?php echo $result['motherName']?></td>
                  </tr>
                  <tr>
                    <th>Parent Mobile No</th>
                    <td><?php echo $result['parentmobNo']?></td>
                    <th>Parent Email Id</th>
                    <td><?php echo $result['parentEmail']?></td>
                  </tr>
                  <tr>
                    <th>Child Name</th>
                   <td><?php echo $result['childName']?></td>
                   <th>Child Age</th>
                   <td><?php echo $result['childAge']?></td>
                 </tr>
                 <tr>
                  <th>Program Enroll For</th>
                    <td><?php echo $result['enrollProgram']?></td>
                    <th>Posting Date</th>
                    <td><?php echo $result['postingDate']?></td>
                  </tr>

      <tr>
                  <th>Message</th>
                    <td colspan="3"><?php echo $result['message']?></td>
                  </tr>

