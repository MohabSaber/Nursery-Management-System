<?php
include_once('includes/config.php');

class VisitorForm {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertVisitorDetails($gname, $emailid, $cname, $cage, $vtime, $message) {
        $query = "INSERT INTO tblvisitor(gurdianName, gurdianEmail, childName, childAge, message, visitTime) VALUES ('$gname', '$emailid', '$cname', '$cage', '$message', '$vtime')";
        $result = mysqli_query($this->con, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

// Usage
if (isset($_POST['submit'])) {
    $visitorForm = new VisitorForm($con);

    $gname = $_POST['gname'];
    $emailid = $_POST['emailid'];
    $cname = $_POST['cname'];
    $cage = $_POST['agegroup'];
    $vtime = $_POST['visittime'];
    $message = $_POST['message'];

    if ($visitorForm->insertVisitorDetails($gname, $emailid, $cname, $cage, $vtime, $message)) {
        echo "<script>alert('Details sent successfully.');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
