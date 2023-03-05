<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "the_backpacker";

    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
        die("connection is not established");
    }
?>