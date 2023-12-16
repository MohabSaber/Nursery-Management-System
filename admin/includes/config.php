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

class Timezone {
    public function setTimezone($timezone) {
        date_default_timezone_set($timezone);
    }
}

// Usage
$database = new Database();
$connection = $database->getConnection();

$timezoneHandler = new Timezone();
$timezoneHandler->setTimezone('Africa/Cairo');
?>
