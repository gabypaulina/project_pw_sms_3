<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "items");

    if(mysqli_connect_errno()){
        echo mysqli_error($conn);
    }

   
?>