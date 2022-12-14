<?php
    require_once("hub.php");
    $result = mysqli_query($conn,"SELECT * from img");

    if(isset($_POST["cancel"])){
        unset($_SESSION["shopping"]);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

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
                    <h6 class="m-0">Shopping Cart</h6>
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
                            <a href="checkout.php" class="nav-item nav-link">Checkout</a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="home.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php     
                    $total = 0;
                    if(isset($_SESSION['shopping'])){
                        foreach($_SESSION['shopping'] as $index=> $shop){
                        $x = $shop["jumlah"];

                    ?>
                        <tr>
                            <td class="align-middle"><img src="<?= $shop["nama"]?>" style="width: 50px;"><?= $shop["namaItem"]?></td>
                            <td class="align-middle">Rp.<?=$shop["harga"]?></td>

                            <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <p class="form-control form-control-sm bg-secondary text-center"><?= $x?></p>
                                        <!-- <button type="submit" class="btn btn-sm btn-secondary" name="add">Add</button> -->
                                    </div>
                                   
                            </td>
                            <td class="align-middle"><?= $shop["harga"]*$x?></td>
                            <td class="align-middle">
                                <form action="" method="get">
                                    <input type="hidden" name="index"value="<?=$index?>">
                                    <button type="submit" class="btn btn-sm btn-secondary" name="delete" value="<?=$index?>"><i class="fa fa-times"></i></button>
                                </form>
                            
                            </td>
                        </tr>
                    <?php
                        $total = $total+($shop["harga"]*$x);
                        unset($_SESSION['total']);
                        $_SESSION['total'] = $total;
                        }
                        if (isset($_GET['delete'])){
                            $index = $_GET['index'];
                            $_SESSION["shopping"] = array_values($_SESSION["shopping"]);
                            unset($_SESSION["shopping"][$index]);
                            //waktu delete, array_values digunakan untuk mengurutkan index dari array lagi
                            $_SESSION["shopping"] = array_values($_SESSION["shopping"]);

                           echo"<script> alert('$index')</script>";
                        }                                                                                               
                        
                        
                    }else{
                       
                    ?>
                    <tr>
                        <td class="align-middle"><img src="" style="width: 50px;">-</td>
                        <td class="align-middle">Rp.-</td>
                        <td class="align-middle">
                            <form action="" method="get">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <p class="form-control form-control-sm bg-secondary text-center">-</p>
                                </div> 
                            </form>
                        </td>
                        <td class="align-middle">-</td>
                        <td class="align-middle"><a href="index.php"><button class="btn btn-sm btn-secondary">Buy Now</button></a></td>
                    </tr>
                    <?php
                    }
                        
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rp.<?=$total?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rp.10.000</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rp. <?=$total+=10000?></h5>
                        </div>
                        <?php
                        unset($_SESSION["total"]);
                        $_SESSION["total"] = $total;
                        ?>
                        <a href="checkout.php" class="btn btn-block btn-secondary my-3 py-3">Proceed To Checkout</a>
                   
                        <form action="" method="post">
                            <button name="cancel"class="btn btn-block btn-primary my-3 py-3"style="color: black" >
                                <b>Cancel All Items</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


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



    <script>


    </script>
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