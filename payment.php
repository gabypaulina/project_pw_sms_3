<?php
    require_once("hub.php");
    $result = mysqli_query($conn,"SELECT * from img");

    if(isset($_GET['method'])) {
        $orderId = $_GET["orderId"];
        $nama = $_COOKIE["user"];
        $paymentMethod = $_GET["method"];
        $totalHarga = $_GET["price"];

        mysqli_query( $conn,"INSERT INTO `dtrans` (`nama`, `paymentMethod`, `totalHarga`) VALUES ( '$nama', '$paymentMethod', '$totalHarga')");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5 justify-content-between">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Rawr</span>Cake</h1>
                </a>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <?php
                    $logout = "Login";
                    $register = "Register";
                    if(isset($_SESSION["auth"])){
                        if($_SESSION["auth"]==true){
                            $logout = "Logout";
                            if(isset($_COOKIE["user"])) {
                                $register = $_COOKIE["user"];
                            }
                        }
                    }

                    if(isset($_POST["logout"])) {
                        if(isset($_SESSION["auth"])){
                            session_destroy();
                            $logout = "Login";
                            $register = "Register";
                        } else {
                            ?><script type="text/javascript">location.href = 'login.php';</script><?php
                        }
                    }
                    ?>
                    <form action="" method="post" class="d-flex">
                        <a href="register.php" class="nav-item nav-link" style="text-transform: capitalize;"><?=$register?></a>
                        <button name="logout" class="btn btn-naked"><?=$logout?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Payment</h6>
                </a>
                
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Rawr</span>Cake</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="home.php" class="nav-item nav-link">Home</a>
                            <a href="index.php" class="nav-item nav-link">Shop</a> 
                            <a href="cart.php" class="nav-item nav-link">Shopping Cart</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Payment Start -->
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col text-center">
                <?php
                    if($_GET['method'] == 'COD') {
                        echo "<img src='./img/thanks.jpg' alt='thanks image' width='30%' />";
                    }
                ?>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <?php
                if($_GET['method'] == 'COD') {
                    echo "<h2 class='text-center'>Berhasil membeli dengan metode COD.</h2>";
                } else {
                    echo "<h2 class='text-center'>Virtual Account</h2>";
                }
                ?>
            </div>
            <?php
                   if(isset($_POST['']))
            ?>
        </div>
    </div>
    <!-- Payment End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-2">
            <h1 class="mb-4 display-5 font-weight-semi-bold">
                <span class="text-primary font-weight-bold border border-white px-3 mr-1">Rawr</span>Cake
            </h1>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    All Rights Reserved. Designed by
                    <span class="text-dark font-weight-semi-bold">Rawrcake</span>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>