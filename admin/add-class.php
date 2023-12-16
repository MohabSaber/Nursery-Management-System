

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

   <div class="form-group">
                    <label for="exampleInputFullname">Teacher</label>
                    <select class="form-control" id="teacher" name="teacher" required>
                      <option value="">Select Teacher</option>
<?php $query=mysqli_query($con,"select id,fullName,teacherSubject from tblteachers");
while($row=mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['fullName'];?>-(<?php echo $row['teacherSubject'];?>)</option>
<?php } ?>

</select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Class name</label>
                    <input type="text" class="form-control" id="classname" name="classname" placeholder="Class name e.g: Drawing, Dnace, Fun" required>
                  </div>

<div class="form-group">
<label for="text">Age Group</label>
<select class="form-control" id="agegroup" name="agegroup"  required>
<option value="">Select</option>
<option value="18 Month-3 Year">18 Month-2 Year</option>
<option value="2-3 Year">2-3 Year</option>
<option value="3-4 Year">3-4 Year</option>
<option value="4-5 Year">4-5 Year</option>
<option value="5-6 Year">5-6 Year</option>
</select>
</div>


<div class="form-group">
<label for="text">Class Timing</label>
<select class="form-control" id="classtiming" name="classtiming"  required>
<option value="">Select</option>
<option value="8-9 AM">8-9 AM</option>
<option value="9-10 AM">9-10 AM</option>
<option value="10-11 AM">10-11 AM</option>
<option value="11-12 PM">11-12 PM</option>
<option value="12-1 PM">12-1 PM</option>
<option value="1-2 PM">1-2 PM</option>
<option value="2-3 PM">2-3 PM</option>
<option value="3-4 PM">3-4 PM</option>
<option value="4-5 PM">4-5 PM</option>
</select>
</div>


<div class="form-group">
<label for="text">Capacity</label>
<select class="form-control" id="capacity" name="capacity"  required>
<option value="">Select</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="35">35</option>
<option value="40">40</option>
<option value="45">45</option>
<option value="50">50</option>
</select>
</div>






  <div class="form-group">
                    <label for="exampleInputFile">Class Pic <span style="font-size:12px;color:red;">(Only jpg / jpeg/ png /gif format allowed)</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required="true">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
      
                </div>
             
          
            </div>
      
          </div>
     








    
              </form>
       
  
        </div>
   
      </div>
    </section>

  </div>

<?php include_once('includes/footer.php');?>

</div>

<script src="../plugins/jquery/jquery.min.js"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/demo.js"></script>

<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
  $(function () {
   
    $('.select2').select2()

   
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
</body>
</html>
<?php } ?>
