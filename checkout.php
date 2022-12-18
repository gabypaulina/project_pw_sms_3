<?php
    require_once("hub.php");
    $result = mysqli_query($conn,"SELECT * from img");
    
    if(isset($_POST['order'])){
        if(isset($_SESSION["auth"])){
            if($_SESSION["auth"]==true){
                header("Location: payment.php");
            }else{
                header("Location: login.php");
            }
        }else{
            header("Location: login.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

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
                    <h6 class="m-0">Checkout</h6>
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


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="home.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <form method="GET">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input name="firstName" class="form-control" type="text" placeholder="Susi">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input name="lastName" class="form-control" type="text" placeholder="Laksamana">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input name="email" class="form-control" type="text" placeholder="susi@gmail.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile Number</label>
                                <input name="mobileNumber" class="form-control" type="text" placeholder="08134572926">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input name="address" class="form-control" type="text" placeholder="Ngagel Madya">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>POS Code</label>
                                <input name="posCode" class="form-control" type="text" placeholder="60284">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Products</h5>
                            <?php
                                foreach($_SESSION['shopping'] as $shop){

                        ?>
                            <div class="d-flex justify-content-between">
                                <p><?=$shop['namaItem']?></p>
                                <p>Rp.<?=$shop['jumlah']*$shop['harga']?></p>
                            </div>
                        <?php
                                }
                        ?>
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">Rp.<?=$_SESSION['total']-10000?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">Rp.10.000</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">Rp.<?=$_SESSION['total']?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="bank">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="COD">
                                    <label class="custom-control-label" for="banktransfer">COD</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button id="btnOrder" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->


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