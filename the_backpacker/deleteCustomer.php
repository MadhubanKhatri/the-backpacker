<?php
    require("dbconnect.php");

    $customer_id  =$_GET['cid'];
    
    $sql_query = "DELETE FROM `customers` WHERE `customer_id`='$customer_id'";
    $result = mysqli_query($conn, $sql_query);

    if($result)
    {
        header("location: admin_panel.php");
    }

?>