<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for update lawyer image
if(isset($_POST['submit'])){

$cid=intval($_GET['cid']); 
//Getting Post Values  
$currentpic=$_POST['currentprofilepic'];
$oldprofilepic="classpic"."/".$currentpic;
$profilepic=$_FILES["teacherpic"]["name"];
// get the image extension
$extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$newprofilepic=md5($profilepic).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["teacherpic"]["tmp_name"],"classpic/".$newprofilepic);