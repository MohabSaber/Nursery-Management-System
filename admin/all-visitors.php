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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PreSchool Enrollment System | All Visitors</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <?php include_once("includes/navbar.php"); ?>
            <!-- /.navbar -->

            <?php include_once("includes/sidebar.php"); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>All Visitors</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active">All Visitors</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">


                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Visitors Details</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Gurdian Name</th>
                                                        <th>Gurdian Email</th>
                                                        <th>Child Name</th>
                                                        <th>Child Age Group</th>
                                                        <th>Visit Time</th>
                                                        <th>Posting Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $query = mysqli_query($con, "select * from tblvisitor");
                                                    $cnt = 1;
                                                    while ($result = mysqli_fetch_array($query)) {
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $result['gurdianName'] ?></td>
                                                            <td><?php echo $result['gurdianEmail'] ?></td>
                                                            <td><?php echo $result['childName'] ?></td>
                                                            <td><?php echo $result['childAge'] ?></td>
                                                            <td><?php echo $result['visitTime'] ?></td>
                                                            <td><?php echo $result['postingDate'] ?></td>
                                                            <th>
                                                                <a href="visitor-details.php?vid=<?php echo $result['id']; ?>" title="View Details" class="btn btn-primary btn-xm"> View Details</a>
                                                            </th>
                                                        </tr>
                                                    <?php $cnt++;
                                                    } ?>

