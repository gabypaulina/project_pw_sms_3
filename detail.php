<?php
ob_start();
    require_once("hub.php");
    $result = mysqli_query($conn,"SELECT * from img");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

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
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
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
                            <a href="#" class="nav-item nav-link active">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <?php
        // $data = "";
        // $data = $_SESSION["det"];
        // unset($_SESSION["det"]);
        if(isset($_REQUEST["detail"])){
            $data = $_REQUEST["data"];
            unset($_SESSION["det"]);
            $_SESSION["det"] = $data;            
        }
        $query="SELECT * FROM img WHERE nama = '$data'";
        $rs_result = mysqli_query ($conn, $query);       
        $row = mysqli_fetch_array($rs_result);        
    ?>
    <!-- Shop Detail Start -->
    <form method="POST">
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="<?=$row['nama']?>" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold" ><?=$row['namaItem']?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <!-- <small class="pt-1">(50 Reviews)</small> -->
                </div>
                <h3 class="font-weight-semi-bold mb-4">Rp. <?=$row['harga']?></h3>
                
                
                <div class="d-flex align-items-center mb-4 pt-2 quantity">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <input name="qtyItem" type="text" class="form-control bg-secondary text-center" value="1">
                    </div>
                    <input type="hidden" name="datas" value="<?=$row['namaItem']?>">
                    <button name="cart" class="btn btn-primary px-3">
                        <i class="fa fa-shopping-cart mr-1"></i>
                        Add To Cart
                    </button>
                </div>
                <?php
                    //  unset($_SESSION["shopping"]);
                        if(isset($_POST['cart'])){
                            $datas = $_POST["datas"];
                            $querys="SELECT * FROM img WHERE namaItem = '$datas'";
                            $rs_results = mysqli_query ($conn, $querys);       
                            $rows = mysqli_fetch_array($rs_results);
                            $namaItem = $rows["namaItem"];
                            $nama = $rows["nama"];
                            $harga = $rows["harga"];
                            $jumlah = $_POST['qtyItem'];
                            $new = [
                                "nama" => $nama,
                                "namaItem" => $namaItem,
                                "harga" => $harga,
                                "jumlah" => $jumlah
                            ];
                            if(isset($_SESSION["shopping"])){
                                array_push($_SESSION["shopping"],$new);
                            }else{
                                $_SESSION["shopping"] = [];
                                array_push($_SESSION["shopping"],$new);
                            }
                            
                            header('Location: cart.php');
                            die();
                        };
                    ?>
            </div>
        </div>
    </form>
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
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="module" src="../lib/js.cookie.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>