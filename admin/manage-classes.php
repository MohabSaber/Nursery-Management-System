<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{<?php session_start();
    error_reporting(0);
    // Database Connection
    include('includes/config.php');
    //Validating Session
    if(strlen($_SESSION['aid'])==0)
      { 
    header('location:index.php');
    }
    else{
    //Code For Deletion the classes
    if($_GET['action']=='delete'){
    $cid=intval($_GET['cid']);
    $tpic=$_GET['teacherpic'];
    $tpicpath="classpic"."/".$tpic;
    $query=mysqli_query($con,"delete from tblclasses where id='$cid'");
    if($query){
    unlink($tpicpath);
    echo "<script>alert('Class details deleted successfully.');</script>";
    echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
    } else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";
    }}}
?>
}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System  | Manage Classes</title>

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
           <h1>Manage Classes</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
             <li class="breadcrumb-item active">Manage Classes</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
