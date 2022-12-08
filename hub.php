<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "rawrcake_db");

    if(mysqli_connect_errno()){
        echo mysqli_error($conn);
    }

   
?>