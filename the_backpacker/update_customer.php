<?php
    require("dbconnect.php");
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        $name = $_POST['c_name'];
        $contact = $_POST['contact_num'];
        $dest = $_POST['dest'];
        $rooms = $_POST['room_booked'];
        $total_pay = $_POST['total_pay'];
        $cid = $_GET['cid'];
        
        if(!empty($name) and !empty($contact) and !empty($dest) and !empty($rooms) and !empty($total_pay))
        {
            // UPDATE `hostels` SET `num_rooms` = '10' WHERE `hostels`.`hostel_id` = 1;
            $sql_query = "UPDATE `customers` SET `customer_name`='$name', `destination`='$dest',`contact_num`='$contact', `rooms_book` = '$rooms',`total_pay`='$total_pay' WHERE `customer_id` = '$cid'";
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