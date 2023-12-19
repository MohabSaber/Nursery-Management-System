<?php
session_start();
include('../includes/config.php');

class AdminLogin {
    private $con;

    public function __construct($dbConnection) {
        $this->con = $dbConnection;
    }

    public function login($username, $password) {
        $hashedPassword = md5($password);
        $query = mysqli_query($this->con, "SELECT ID, AdminuserName, UserType FROM tbladmin WHERE AdminuserName='$username' AND Password='$hashedPassword'");
        return $query;
    }
}

if (isset($_POST['login'])) {
    $adminLogin = new AdminLogin($con);

    $uname = $_POST['username'];
    $Password = $_POST['inputpwd'];

    $queryResult = $adminLogin->login($uname, $Password);
    $ret = mysqli_fetch_array($queryResult);

    if ($ret > 0) {
        $_SESSION['aid'] = $ret['ID'];
        $_SESSION['uname'] = $ret['AdminuserName'];
        $_SESSION['utype'] = $ret['UserType'];
        header('location:dashboard.php');
    } else {
        echo "<script>alert('Invalid Details.');</script>";
    }
}
?>
