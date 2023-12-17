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
