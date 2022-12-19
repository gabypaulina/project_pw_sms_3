<?php
    require_once("hub.php");
$result = mysqli_query($conn,"SELECT * from img");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rawr Cake</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">Rawr</span>Cake</h1>
                </a>
            </div>

        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <a href="home.php" class="nav-item nav-link">Home</a>

                        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                            data-toggle="collapse" href="#navbar-vertical"
                            style="height: 65px; margin-top: -1px; padding: 0 30px;">
                            <h6 class="m-0">Shop</h6>
                            <i class="fa fa-angle-down text-dark"></i>
                        </a>
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
                                class="text-primary font-weight-bold border px-3 mr-1">Rawr</span>Cake</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="col-lg-6 col-6 text-left">
                            <form action="" method="get">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <input type="text" class="form-control border-none"
                                                placeholder="Search for products" name="search">
                                            <button class="btn btn-outline"><img src="img/search.svg"
                                                alt="" width="24px" /></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">Welcome!!</h1>
                    </div>
                </div>
            </div>


            <!-- Navbar End -->
            <form action="" method="post">
                <div class="container-fluid pt-5">
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        <?php
                            $ctr = 1;
                            $per_page_record = 12;  // Number of entries to show in a page.   

                            $page=1;
                            if (isset($_GET["page"])) {    
                                $page  = $_GET["page"];    
                            }    
                            else {    
                            $page=1;    
                            }  
                            $start_from = ($page-1) * $per_page_record;
                            if(isset($_GET["search"])) {
                                $keyword = $_GET["search"];
                                $query = "SELECT * FROM img WHERE namaItem LIKE '%$keyword%' LIMIT $start_from, $per_page_record";
                            } else {
                                $query = "SELECT * FROM img LIMIT $start_from, $per_page_record";     
                            }
                            $rs_result = mysqli_query ($conn, $query);       

                            while($row = mysqli_fetch_array($rs_result)){  
                            unset($_SESSION["det"]);
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
                                            class="btn btn-sm text-dark p-0">
                                            View Detail
                                        </button>
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
                        // if(isset($_POST["kick"])){
                        //     $cust = $_POST['kick'];
                        //     mysqli_query($conn, "DELETE FROM dataroom WHERE cust = '$cust'");
                        // }'
       
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
                                array_push($_SESSION["shopping"],$new);
                            }else{
                                $_SESSION["shopping"] = [];
                                array_push($_SESSION["shopping"],$new);
                            }
                        }; 
                    ?>
                    </div>
                </div>
            </form>
            <div class="col-12 pb-1">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mb-3">
                        <?php
                            $keyword = '';
                            if(isset($_GET["search"])) {
                                $keyword = $_GET["search"];
                                $query = "SELECT COUNT(*) FROM img WHERE namaItem LIKE '%$keyword%'";
                            } else {
                                $query = "SELECT COUNT(*) FROM img";     
                            }
                            $rs_result = mysqli_query($conn, $query); 
                            $row = mysqli_fetch_row($rs_result);   

                            $total_records = $row[0];     
                            echo "</br>";     
                            // Number of pages required.   
                            $total_pages = ceil($total_records / $per_page_record);     
                            $pagLink = "";

                            // prev button
                            if($page>=2){   
                                if(isset($_GET["search"])) {
                                    echo "<a class='page-link' href='index.php?search=$keyword&page=".($page-1)."'>  Prev </a>";   
                                }
                                else {
                                    echo "<a class='page-link' href='index.php?page=".($page-1)."'>  Prev </a>";   
                                }
                            }    
                             
                            $i = 1;           
                            while ($i<=$total_pages ) {      
                                $pagLink=$i;
                                if(isset($_GET["search"])) {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?search=$keyword&page=".($pagLink)."'>$pagLink</a></li>";   
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".($pagLink)."'>$pagLink</a></li>";
                                }
                       
                            $i++;
                            }; 

                            // next button
                            if($page<$total_pages){   
                                if(isset($_GET["search"])) {
                                    echo "<a class='page-link' href='index.php?search=$keyword&page=".($page+1)."'>  Next </a>";   
                                } else {
                                    echo "<a class='page-link' href='index.php?page=".($page+1)."'>  Next </a>";   
                                }
                            }   
                        ?>
                    </ul>
                </nav>
            </div>

            <!-- Footer -->
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
            function go2Page() {
                var page = document.getElementById("page").value;
                page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
                window.location.href = 'index1.php?page=' + page;
            }
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
            <script src="js/main.js"></script>

</body>

</html>