<?php
    session_start();

    $conn = mysqli_connect("localhost", "rawrcake", "_6v46r(eFE(H8aT9wN", "rawrcake_db");

    if(mysqli_connect_errno()){
        echo mysqli_error($conn);
    }
?>