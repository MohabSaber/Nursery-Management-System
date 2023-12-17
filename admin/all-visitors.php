<?php
                session_start();
                include('includes/config.php');

                class Database
                {
                    private $connection;

                    public function __construct()
                    {
                        $this->connection = mysqli_connect("localhost", "root", "", "preschooldb");
                        if (mysqli_connect_errno()) {
                            echo "Connection Fail" . mysqli_connect_error();
                        }
                    }

                    public function getConnection()
                    {
                        return $this->connection;
                    }

                    public function closeConnection()
                    {
                        mysqli_close($this->connection);
                    }
                }

                class SessionValidator
                {
                    public function __construct()
                    {
                        error_reporting(0);
                    }

                    public function validateSession()
                    {
                        if (strlen($_SESSION['aid']) == 0) {
                            header('location:index.php');
                            exit();
                        }
                    }
                }

                class VisitorsPage
                {
                    private $db;

                    public function __construct()
                    {
                        $this->db = new Database();
                    }

                    public function renderPage()
                    {
                        $sessionValidator = new SessionValidator();
                        $sessionValidator->validateSession();
                        $con = $this->db->getConnection();

                        $this->db->closeConnection();
                    }
                }

                // Usage
                $visitorsPage = new VisitorsPage();
                $visitorsPage->renderPage();
                ?>
