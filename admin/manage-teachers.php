<?php session_start();
error_reporting(0);

include('includes/config.php');

if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System  | Manage Teachers</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>Manage teachers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Teachers</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">teachersDetails</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Mobile Number</th>
                    <th>Subject</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php $query=mysqli_query($con,"select * from tblteachers");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><img src="teacherspic/<?php echo $result['teacherPic']?>" width="80"></td>
                    <td><?php echo $result['fullName']?></td>
                   <td><?php echo $result['teacherEmail']?></td>
                   <td><?php echo $result['teacherMobileNo']?></td>
                    <td><?php echo $result['teacherSubject']?></td>
                    <td><?php echo $result['regDate']?></td>
                    <th>
     <a href="edit-teacher.php?tid=<?php echo $result['id'];?>" title="Edit Sub Admin Details"> <i class="fa fa-edit" aria-hidden="true"></i> </a> | 
     <a href="manage-teachers.php?action=delete&&tid=<?php echo $result['id']; ?>&&profilepic=<?php echo $result['teacherPic'];?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
 </th>
                  </tr>
         <?php $cnt++;} ?>
             
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Mobile Number</th>
                    <th>Subject</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include_once('includes/footer.php');?>


  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>

<script src="../plugins/jquery/jquery.min.js"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php } ?>