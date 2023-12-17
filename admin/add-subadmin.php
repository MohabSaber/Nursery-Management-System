<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "preschooldb";
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Connection Fail" . mysqli_connect_error();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

class SubAdminManager {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function addSubAdmin($username, $fullname, $email, $mobilenumber, $password) {
        $hashedPassword = md5($password);
        $usertype = '0';
        $connection = $this->db->getConnection();
        
        $query = mysqli_query($connection, "INSERT INTO tbladmin(AdminuserName,AdminName,MobileNumber,Email,Password,UserType) VALUES('$username','$fullname','$mobilenumber','$email','$hashedPassword','$usertype')");

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

// Usage
session_start();

include('includes/config.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $username = $_POST['sadminusername'];
        $fname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $mobileno = $_POST['mobilenumber'];
        $password = $_POST['inputpwd'];

        $database = new Database();
        $subAdminManager = new SubAdminManager($database);

        $result = $subAdminManager->addSubAdmin($username, $fname, $email, $mobileno, $password);

        if ($result) {
            echo "<script>alert('Sub admin details added successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'add-subadmin.php'; </script>";
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
  <title>PreSchool Enrollment System  | Add Sub admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Function Email Availabilty---->
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#sadminusername").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

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
            <h1>Create Subadmin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Subadmin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

