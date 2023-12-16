
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

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">About us</li>
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
                <h3 class="card-title">Fill the Info</h3>
              </div>
            
              <form name="subadmin" method="post">
                <div class="card-body">
<?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>

   <div class="form-group">
                    <label for="exampleInputFullname">Page Title</label>
    <input type="text" class="form-control" name="pagetitle" value="<?php  echo $row['PageTitle'];?>" required='true'>
                  </div>

  <div class="form-group">
                    <label for="exampleInputFullname">Page Description</label>
  <textarea  name="pagedes" class="form-control" required='true' cols="140" rows="10"><?php  echo $row['PageDescription'];?></textarea>
                  </div>
<?php } ?>

                </div>
              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
              </form>
            </div>
       

        
       
          </div>
     
  
        </div>
    
      </div>
    </section>

  </div>

<?php include_once('includes/footer.php');?>

</div>

  <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="nic.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>


