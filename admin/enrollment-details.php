<?php
// Include the necessary files and initiate the session
session_start();
error_reporting(0);

// Database Connection (config.php)
include('includes/config.php');

class EnrollmentManager {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function updateEnrollment($eid, $estatus, $oremark) {
        $query = mysqli_query($this->con, "UPDATE tblenrollment SET officialRemark='$oremark', enrollStatus='$estatus' WHERE id='$eid'");

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

//Validating Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    // Create an instance of EnrollmentManager
    $enrollmentManager = new EnrollmentManager($con);

    //Code For Updation the Enrollment
    if (isset($_POST['submit'])) {
        $eid = intval($_GET['enrollid']);
        $estatus = $_POST['status'];
        $oremark = $_POST['officialremak'];

        // Call the updateEnrollment method
        $isUpdated = $enrollmentManager->updateEnrollment($eid, $estatus, $oremark);

        if ($isUpdated) {
            echo "<script>alert('Enrollment Status updated successfully.');</script>";
            // Redirect or perform any other action after successful update
            //echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
}
?>
