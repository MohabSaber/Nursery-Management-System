<?php
session_start();

// Database Connection
include('includes/config.php');

class SubAdminManager {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function updateSubAdminDetails($fname, $email, $mobileno, $subadminid) {
        $query = mysqli_query($this->con, "UPDATE tbladmin SET AdminName='$fname', MobileNumber='$mobileno', Email='$email' WHERE UserType=0 AND ID='$subadminid'");

        return $query;
    }

    public function getSubAdminDetails($subadminid) {
        $query = mysqli_query($this->con, "SELECT * FROM tbladmin WHERE UserType=0 AND ID='$subadminid'");
        return $query;
    }
}

//Validating Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    $subAdminManager = new SubAdminManager($con);

    if (isset($_POST['update'])) {
        $fname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $mobileno = $_POST['mobilenumber'];
        $subadminid = intval($_GET['said']);

        $isUpdated = $subAdminManager->updateSubAdminDetails($fname, $email, $mobileno, $subadminid);

        if ($isUpdated) {
            echo "<script>alert('Sub admin details updated successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
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
  <title>PreSchool Enrollment System  | Edit/Update Sub admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Function Email Availabilty---->


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
            <h1>Edit Subadmin Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Subadmin Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
if (strlen($_SESSION['aid']) != 0) {
    $said = intval($_GET['said']);
    $subAdminDetails = $subAdminManager->getSubAdminDetails($said);

    while ($result = mysqli_fetch_array($subAdminDetails)) {

?>
