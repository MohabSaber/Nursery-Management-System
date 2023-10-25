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
