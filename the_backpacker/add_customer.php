<?php
    require("dbconnect.php");    
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $customer_name = $_POST['customer_name'];
        $email = $_POST['email'];
        $contact_num = $_POST['contact_num'];
        $checkIn = $_POST['check_in'];
        $checkOut = $_POST['check_out'];
        $dest = $_GET['dest'];
        $bedCount = $_POST['bed_count'];
        $totalPay = $_POST['total_pay'];
        
        
        if(!empty($customer_name) and !empty($email) and !empty($contact_num) and !empty($checkIn) and !empty($checkOut) and !empty($dest))
        { 
            $sql_query = "INSERT INTO `customers` (`customer_name`, `email`, `destination`, `check_in`, `check_out`, `contact_num`, `rooms_book`, `total_pay`) VALUES ('$customer_name', '$email', '$dest', '$checkIn', '$checkOut', '$contact_num', '$bedCount', '$totalPay')"; 
            $result = mysqli_query($conn,$sql_query);
            
            $select_query = "SELECT * FROM `hostels` WHERE `hostel_destination`='$dest'";
            $select_query_result = mysqli_query($conn, $select_query);
            $select_row = mysqli_fetch_assoc($select_query_result);
            
            if($result)
            {
                $update_room = $select_row['num_rooms'] - $bedCount;
                $update_query = "UPDATE `hostels` SET `num_rooms` = '$update_room' WHERE `hostel_id` = '$select_row[hostel_id]'";
                $update_result = mysqli_query($conn,$update_query);
                
                header("location:welcome.php?success=true");
            }
        }
    }



?>