<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="bg-info py-4">
        <h1 class="text-center text-white">Welcome Admin!</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <ul class="admin-menu p-3">
                    <li><a href="#addProduct">Add Product</a></li>
                    <li><a href="#addUser">Add User</a></li>
                </ul>
            </div>
            <div class="col  py-4">
                <form class="form" action="" method="POST">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control mb-3" placeholder="product name"/>
                    <label for="productPrice">Product Price</label>
                    <input type="text" name="productPrice" class="form-control" placeholder="Rp. 0"/>
                    <label for="productName">Product Price</label>
                    <input type="number" name="productName" class="form-control" placeholder="Rp. 0"/>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../mail/jqBootstrapValidation.min.js"></script>

    <style>
    .admin-menu {
        list-style: none;
        border-right: 2px solid #a4a4a4;
    }

    .admin-menu li {
        padding-top: 4px;
        padding-bottom: 4px;
    }
    </style>
</body>

</html>