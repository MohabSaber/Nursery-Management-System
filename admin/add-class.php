<?php session_start();

include('includes/config.php');

if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit'])){

$tid=$_POST['teacher'];
$cname=$_POST['classname'];
$agegroup=$_POST['agegroup'];
$classtiming=$_POST['classtiming'];
$capacity=$_POST['capacity'];
$addedby=$_SESSION['uname'];
$profilepic=$_FILES["profilepic"]["name"];

$extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));

$allowed_extensions = array(".jpg","jpeg",".png",".gif");

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$newprofilepic=md5($profilepic).time().$extension;

move_uploaded_file($_FILES["profilepic"]["tmp_name"],"classpic/".$newprofilepic);





$query=mysqli_query($con,"insert into tblclasses(teacherId,className,ageGroup,classTiming,capacity,feacturePic,addedBy) values('$tid','$cname','$agegroup','$classtiming','$capacity','$newprofilepic','$addedby')");
if($query){
echo "<script>alert('Class added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-class.php'; </script>";
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
  <title>PreSchool Enrollment System  | Add Class</title>

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

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

<?php include_once("includes/navbar.php");?>


 <?php include_once("includes/sidebar.php");?>


  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Class</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
   
          <div class="col-md-8">
      
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Persoanl Info</h3>
              </div>
            
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">
