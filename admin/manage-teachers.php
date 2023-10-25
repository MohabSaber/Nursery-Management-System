<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
//Code For Deletion the teacher
if($_GET['action']=='delete'){
$lid=intval($_GET['tid']);
$profilepic=$_GET['profilepic'];
$ppicpath="teacherspic"."/".$profilepic;
$query=mysqli_query($con,"delete from tblteachers where id='$lid'");
if($query){
unlink($ppicpath);
echo "<script>alert('Teacher details deleted successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-teachers.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}


  ?>