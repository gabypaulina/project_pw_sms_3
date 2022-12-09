<?php
    require_once("hub.php");
    require_once("toast.php");
$result = mysqli_query($conn,"SELECT * from img");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5 justify-content-end">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <img src="img/line.svg" alt="" width="24px">
                    </a>
                    <a class="text-dark px-2" href="">
                        <img src="img/instagram.svg" alt="" width="24px">
                    </a>
                    <a class="text-dark pl-2" href="">
                        <img src="img/whatsapp.svg" alt="" width="24px">
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">Cake</span>Zone</h1>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Home</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <a href="index.php" class="nav-item nav-link">Shop</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.php" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-lg-6 col-6 text-left">
                        <form action="" method="get">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <input type="text" class="form-control border-none"
                                            placeholder="Search for products" name="search">
                                        <button class="btn btn-outline"><img src="img/search.svg" alt=""
                                                width="24px" /></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto py-0">
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
                </nav>
                <div class="container-fluid bg-secondary mb-5">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">Welcome to our Homepage</h1>
                        <div class="d-inline-flex">
                            <p class="m-0"><a href="index.php">Shop</a></p>
                            <p class="m-0 px-2">-</p>
                            <p class="m-0">Home</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-5">
                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2">Recommended For You</span></h2>
                </div>
                <div class="row px-xl-5 pb-3">
                    <?php  
                            if(isset($_GET["search"])) {
                                $keyword = $_GET["search"];
                                $query = "SELECT * FROM img WHERE namaItem LIKE '%$keyword%' order by id ASC LIMIT 8";
                            } else {
                                $query = "SELECT * FROM img order by id ASC LIMIT 8";  
                            }   
                        $rs_result = mysqli_query ($conn, $query);       
                        while($row = mysqli_fetch_array($rs_result)){  

                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?= $row['nama']?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?= $row['namaItem']?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rp. <?= $row['harga']?></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <form action="detail.php">
                                    <input type="hidden" name="data" value="<?=$row['nama']?>">
                                    <button type="submit" name="detail" style="border: 0px"
                                        class="btn btn-sm text-dark p-0">View Detail</button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="datas" value="<?=$row['nama']?>">
                                    <button id="add-to-cart" style="border: 0px" class="btn btn-sm text-dark p-0">Add To
                                        Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    //  unset($_SESSION["shopping"]);
                        }
                        if(isset($_POST['cart'])){
                            $datas = $_POST["datas"];
                            $querys="SELECT * FROM img WHERE nama = '$datas'";
                            $rs_results = mysqli_query ($conn, $querys);       
                            $rows = mysqli_fetch_array($rs_results);
                            $namaItem = $rows["namaItem"];
                            $nama = $rows["nama"];
                            $harga = $rows["harga"];
                            $jumlah = 1;
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
                        };
                    ?>
                </div>


                <!-- Subscribe Start -->
                <div class="container-fluid bg-secondary my-5">
                    <div class="row justify-content-md-center py-5 px-xl-5">
                        <div class="col-md-6 col-12 py-5">
                            <div class="text-center mb-2 pb-2">
                                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span>
                                </h2>
                                <p>We will send you updates of our products when a new one just arrived!</p>
                            </div>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-4"
                                        placeholder="Email Goes Here">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary px-4">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Subscribe End -->

                <!-- just arrived -->
                <div class="container-fluid pt-5">
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        <?php  
                            if(isset($_GET["search"])) {
                                $keyword = $_GET["search"];
                                $query = "SELECT * FROM img WHERE namaItem LIKE '%$keyword%' order by id DESC LIMIT 6";
                            } else {                             
                                $query = "SELECT * FROM img order by id DESC LIMIT 6";     
                            } 
                            $rs_result = mysqli_query ($conn, $query);       
                            while($row = mysqli_fetch_array($rs_result)){  
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="<?= $row['nama']?>" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?= $row['namaItem']?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>Rp. <?= $row['harga']?></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <form action="detail.php">
                                        <input type="hidden" name="data" value="<?=$row['nama']?>">
                                        <button type="submit" name="detail" style="border: 0px"
                                            class="btn btn-sm text-dark p-0">View Detail</button>
                                    </form>
                                    <form action="" method="post">
                                        <input type="hidden" name="datass" value="<?=$row['nama']?>">
                                        <button type="submit" name="carts" style="border: 0px"
                                            class="btn btn-sm text-dark p-0">Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
        }
        if(isset($_POST['carts'])){
            $datas = $_POST["datass"];
            $querys="SELECT * FROM img WHERE nama = '$datas'";
            $rs_results = mysqli_query ($conn, $querys);       
            $rows = mysqli_fetch_array($rs_results);
            $namaItem = $rows["namaItem"];
            $nama = $rows["nama"];
            $harga = $rows["harga"];
            $jumlah = 1;
            $new = [
                "nama" => $nama,
               "namaItem" => $namaItem,
                "harga" => $harga,
                "jumlah" => $jumlah
            ];
            if(isset($_SESSION["shopping"])){
                // echo"<script>alert('berhasil')</script>";
                array_push($_SESSION["shopping"],$new);
            }else{
                $_SESSION["shopping"] = [];
                array_push($_SESSION["shopping"],$new);
            }
        };
    ?>
                    </div>
                    <!-- just arrived end -->

                    <!-- Footer -->
                    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
                        <div class="row px-xl-5 pt-5">
                            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                                <a href="" class="text-decoration-none">
                                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                                            class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper
                                    </h1>
                                </a>
                                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem
                                    et magna ipsum dolore amet erat.</p>
                                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New
                                    York, USA</p>
                                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="row">
                                    <div class="col-md-4 mb-5">
                                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                                        <div class="d-flex flex-column justify-content-start">
                                            <a class="text-dark mb-2" href="home.php"><i
                                                    class="fa fa-angle-right mr-2"></i>Home</a>
                                            <a class="text-dark mb-2" href="index.php"><i
                                                    class="fa fa-angle-right mr-2"></i>Our Shop</a>
                                            <a class="text-dark mb-2" href="cart.php"><i
                                                    class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                                            <a class="text-dark mb-2" href="checkout.php"><i
                                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                                            <a class="text-dark" href="contact.php"><i
                                                    class="fa fa-angle-right mr-2"></i>Contact Us</a>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-5">
                                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                                        <form action="">
                                            <div class="form-group">
                                                <input type="email" class="form-control border-0 py-4"
                                                    placeholder="Your Email" required="required" />
                                            </div>
                                            <div>
                                                <button class="btn btn-primary btn-block border-0 py-3"
                                                    type="submit">Subscribe Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-light mx-xl-5 py-4">
                            <div class="col-md-6 px-xl-0">
                                <p class="mb-md-0 text-center text-md-left text-dark">
                                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All
                                    Rights Reserved. Designed
                                    by
                                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML
                                        Codex</a>
                                </p>
                            </div>
                            <div class="col-md-6 px-xl-0 text-center text-md-right">
                                <img class="img-fluid" src="img/payments.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Footer End -->




                    <!-- JavaScript Libraries -->
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
                    </script>
                    <script src="lib/easing/easing.min.js"></script>
                    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

                    <!-- Contact Javascript File -->
                    <script src="mail/jqBootstrapValidation.min.js"></script>
                    <script src="mail/contact.js"></script>

                    <!-- Template Javascript -->
                    <script src="js/main.js"></script>

</body>

</html>