<?php
session_start();

include('includes/config.php');

class ClassDetailsUpdater {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function updateClassDetails($teacherId, $className, $ageGroup, $classTiming, $capacity, $classId) {
        $query = mysqli_query($this->con, "UPDATE tblclasses SET teacherId='$teacherId', className='$className', ageGroup='$ageGroup', classTiming='$classTiming', capacity='$capacity' WHERE id='$classId'");
        return $query;
    }
}

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
    exit();
} else {
    if (isset($_POST['Update'])) {
        $classDetailsUpdater = new ClassDetailsUpdater($con);

        $tid = $_POST['teacher'];
        $cname = $_POST['classname'];
        $agegroup = $_POST['agegroup'];
        $classtiming = $_POST['classtiming'];
        $capacity = $_POST['capacity'];
        $classid = intval($_GET['cid']);

        $queryResult = $classDetailsUpdater->updateClassDetails($tid, $cname, $agegroup, $classtiming, $capacity, $classid);

        if ($queryResult) {
            echo "<script>alert('Class updated successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
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
  <title>PreSchool Enrollment System  | Edit Class Details</title>

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
            <h1>Edit Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Class</li>
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
              <div class="card-header">
                <h3 class="card-title">Class Info</h3>
              </div>
              <!-- /.card-header -->
<?php $cid=intval($_GET['cid']);
$query=mysqli_query($con,"select tblteachers.fullName as teachername,tblteachers.id as tid,tblclasses.*,tblclasses.id as classid from tblclasses
join tblteachers on tblteachers.id=tblclasses.teacherId where tblclasses.id='$cid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>



              <!-- form start -->
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">

<!-- Teacher--->
   <div class="form-group">
                    <label for="exampleInputFullname">Teacher</label>
                    <select class="form-control" id="teacher" name="teacher" required>
                      <option value="<?php echo $result['tid'];?>"><?php echo $result['teachername'];?></option>
<?php $query=mysqli_query($con,"select id,fullName,teacherSubject from tblteachers");
while($row=mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['fullName'];?>-(<?php echo $row['teacherSubject'];?>)</option>
<?php } ?>

</select>
