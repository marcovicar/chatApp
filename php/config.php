<?php 
    $conn = mysqli_connect("localhost", "root", "", "chatapp");
    if(!$conn){
        echo "Database connection failed" . mysqli_connect_error();
    }
?>