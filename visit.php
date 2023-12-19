<?php
include_once('includes/config.php');

class VisitorHandler {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function handleFormSubmission() {
        if(isset($_POST['submit'])){
            $gname = $this->sanitizeInput($_POST['gname']);
            $emailid = $this->sanitizeInput($_POST['emailid']);
            $cname = $this->sanitizeInput($_POST['cname']);
            $cage = $this->sanitizeInput($_POST['agegroup']);
            $vtime = $this->sanitizeInput($_POST['visittime']);
            $message = $this->sanitizeInput($_POST['message']);

            $query = "INSERT INTO tblvisitor(gurdianName, gurdianEmail, childName, childAge, message, visitTime) VALUES ('$gname','$emailid','$cname','$cage','$message','$vtime')";
            $result = mysqli_query($this->con, $query);

            if($result){
                $this->redirect('index.php', 'Details sent successfully.');
            } else {
                $this->redirect('index.php', 'Something went wrong. Please try again.');
            }
        }
    }

    private function sanitizeInput($input){
        // Implement input sanitization logic if required
        // Example: $input = mysqli_real_escape_string($this->con, $input);
        return $input;
    }

    private function redirect($url, $message){
        echo "<script>alert('$message');</script>";
        echo "<script type='text/javascript'> document.location = '$url'; </script>";
        exit();
    }
}

// Usage
$visitorHandler = new VisitorHandler($con);
$visitorHandler->handleFormSubmission();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gannate Nursery Enrollment System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

 
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/style.css" rel="stylesheet">
</head>

<body>
 <?php include_once('includes/header.php');?>



        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Schedule a Visit</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Schedule a Visit</li>
                    </ol>
                </nav>
            </div>
        </div>



        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Schedule a Visit</h1>
                                <form method="post">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="gname" name="gname" placeholder="Gurdian Name" required>
                                                <label for="gname">Gurdian Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="emailid" name="emailid" placeholder="Gurdian Email" required>
                                                <label for="gmail">Gurdian Email</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="cname" name="cname" placeholder="Child Name" required>
                                                <label for="cname">Child Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                         <select class="form-control" id="agegroup" name="agegroup"  required>
<option value="">Select</option>
<option value="18 Month-3 Year">18 Month-2 Year</option>
<option value="2-3 Year">2-3 Year</option>
<option value="3-4 Year">3-4 Year</option>
<option value="4-5 Year">4-5 Year</option>
<option value="5-6 Year">5-6 Year</option>
</select>
                                                <label for="cage">Child Age</label>
                                            </div>
                                        </div>


                      <div class="col-sm-6">
  <label for="cage">Visit Time</label>
                                        </div>                        

      <div class="col-sm-6">
                                            <div class="form-floating">
 <input type="datetime-local" id="visittime" name="visittime" required >
                                          
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px" name="message" required></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="img/img-1.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




            <?php include_once('includes/footer.php');?>       




        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <script src="js/main.js"></script>
</body>

</html>
