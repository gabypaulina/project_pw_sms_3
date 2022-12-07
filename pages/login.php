<?php
    require_once("hub.php");
$result = mysqli_query($conn,"SELECT * from user");


if(isset($_POST["login"])){
    $pass = $_POST["password"];
    $email = $_POST["email"];
    if($email=="admin" && $pass=="admin"){
        header("Location: admin.php");
    }
    $ada = false;
  
    while($row = mysqli_fetch_array($result)){
      if($email == $row["email"]){
          $ada = true;
          if($pass == $row["password"]){
            unset($_SESSION["auth"]);
              $_SESSION["auth"] = true;
              header("Location: home.php");
          }else if($user=="" || $pass==""){
            echo "<script>alert('Please fill all the form');</script>";
          }else{
             echo "<script>alert('Password is incorrect');</script>";          
          }
          break;
      }
    }
    if(!$ada){
      echo "<script>alert('Email is not registered');</script>";          
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
            margin-top: 15%;
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
            <h3>Login</h3> <br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <button type="submit" name="login" style="border: 0px">Login</button><br><br>
            Don't have an Account? <a href="register.php">click here!</a>
        </form>
    </div>
</body>
</html>