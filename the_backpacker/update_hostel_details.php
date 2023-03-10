<?php
    require("dbconnect.php");
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $dest = $_POST['dest'];
        $address = $_POST['address'];
        $rooms = $_POST['rooms'];
        $price = $_POST['price'];
        $hostel_id = $_GET['hostelId'];
        
        if(!empty($dest) and !empty($address) and !empty($rooms) and !empty($price))
        {
            // UPDATE `hostels` SET `num_rooms` = '10' WHERE `hostels`.`hostel_id` = 1;
            $sql_query = "UPDATE `hostels` SET `hostel_destination`='$dest',`address`='$address', `num_rooms` = '$rooms',`price`='$price' WHERE `hostel_id` = '$hostel_id'";
            $result = mysqli_query($conn, $sql_query);
            if($result)
            {
                header("location: admin_panel.php ");
            }
        }
        else
        {
            echo "not set";
        }
    }




?>