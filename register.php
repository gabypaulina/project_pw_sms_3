<?php
    require_once("hub.php");
$result = mysqli_query($conn,"SELECT * from user");


if(isset($_POST["register"])){
    $ada = false;
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];  
    while($row = mysqli_fetch_array($result)){
        if($_POST["email"] == $row["email"]){
            $ada = true;
        }
    } 
    if($nama=="" || $email=="" || $password==""|| $confirm==""){
      echo "<script>alert('Please all the form');</script>";
    }else if($password!=$confirm){
      echo "<script>alert('Confrim password doesn't match');</script>";
    }else if(!$ada){
      if($password==$confirm && $email!="admin"){
        mysqli_query($conn,"INSERT INTO `user` ( `nama`, `email`, `password`) VALUES ('$nama', '$email', '$password')");
        header("Location: login.php");
        die();
        }
    }else if($email=="admin"){
      echo "<script>alert('Error');</script>";
    }else if($ada){
      echo "<script>alert('Email is already registered');</script>";
    }   
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .nav{
            height:30%;
            background-color: darkblue;

        }
        .log{
            margin-top: 8%;
            margin-left: 25%;
            margin-right: 25%;
            background-color: lightblue;
            border-radius: 30px;
        }
        input{
            border-radius: 30px;
            padding: 1%;
            border: 0px;
        }
        h3{
            padding-top: 20px;
        }
        button{
            border-radius: 20px;
        }
    </style>
    <link rel="stylesheet" href="index.css">

</head>
<body>
<div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5 justify-content-end">
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="index.php">
                        Go To Shop
                    </a>
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
        
    </div>
    <div class="log" style="text-align: center">
        <form action="" method="post">
            <h3>Register</h3> <br>
            <input type="text" name="nama" placeholder="Nama"><br><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="text" name="password" placeholder="Password"><br><br>
            <input type="text" name="confirm" placeholder="Confirm Password"><br><br>
            <button name="register" style="border:0px">Register</button><br><br>
            Already have an account? <a href="login.php">click here!</a><br>
        </form>
    </div>
</body>
</html>