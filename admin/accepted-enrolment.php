<?php
session_start();
error_reporting(0);

// Database Connection
include('includes/config.php');

class EnrollmentManager {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function getAcceptedEnrollments() {
        return mysqli_query($this->con, "SELECT * FROM tblenrollment WHERE enrollStatus='Accepted'");
    }
}

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    $enrollmentManager = new EnrollmentManager($con);
?>
