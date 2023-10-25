<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for update the about us content
if(isset($_POST['submit']))
  {
$pagetitle=$_POST['pagetitle'];
$pagedes=$con->real_escape_string($_POST['pagedes']);
$query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
if ($query) {
echo '<script>alert("About Us has been updated.")</script>';
}else{
echo '<script>alert("Something Went Wrong. Please try again.")</script>';
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System  | About us</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

<script src="nic.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include_once("includes/navbar.php");?>



 <?php include_once("includes/sidebar.php");?>


  <div class="content-wrapper">

  
