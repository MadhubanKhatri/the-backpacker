<?php
    include("header.php");
    if(!isset($_SESSION['user']))
    {
        
        header("location: admin_login.php");
    
    }
?>







<div class="container my-5">
        <div class="row">
            <div class="col-5">
                <h1 class="text-center border border-success">Rooms</h1>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total Rooms</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql_query = "SELECT * FROM `hostels`";
                        $result = mysqli_query($conn,$sql_query);
                        if($result)
                        {
                            $room_counter = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>
                                    <th scope="row">'.$room_counter.'</th>
                                    <td>'.$row["hostel_destination"].'</td>
                                    
                                    <td>'.$row["address"].'</td>
                                    <td>'.$row["num_rooms"].'</td>
                                    <td>'.$row["price"].'</td>                                  
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#hostelModal'.$row["hostel_id"].'">Edit</a></td> 
                                </tr>';
                                $room_counter++;


                                // Hostel Modal
                                echo '<div class="modal fade" id="hostelModal'.$row["hostel_id"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">'.$row["hostel_destination"].'\'s Hostel Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/the_backpacker/update_hostel_details.php?hostelId='.$row["hostel_id"].'" method="post">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="dest" class="form-control" id="floatingName" placeholder="Destination Name" value="'.$row["hostel_destination"].'">
                                                        <label for="floatingName">Destination Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="address" class="form-control" id="floatingAddress" placeholder="Address" value="'.$row["address"].'">
                                                        <label for="floatingAddress">Address</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" name="rooms" class="form-control" id="floatingRooms" placeholder="Total Rooms" value="'.$row["num_rooms"].'">
                                                        <label for="floatingRooms">Total Rooms</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="number" name="price" class="form-control" id="floatingPrice" placeholder="Price" value="'.$row["price"].'">
                                                        <label for="floatingPrice">Price</label>
                                                    </div>
                                                
                                                
                                            </div>
                                            <div class="modal-footer">                                    
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>';
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            
            <div class="col-7">
                <h1 class="text-center border border-success">Customers</h1>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Room Book</th>
                            <th scope="col">Total Pay</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql_query = "SELECT * FROM `customers`";
                        $result = mysqli_query($conn,$sql_query);
                        if($result)
                        {
                            $customer_counter = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>
                                    <th scope="row">'.$customer_counter.'</th>
                                    <td>'.$row["customer_name"].'</td>
                                    <td>'.$row["contact_num"].'</td>
                                    <td>'.$row["destination"].'</td>
                                    <td>'.$row["rooms_book"].'</td>
                                    <td>'.$row["total_pay"].'</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#customerModal'.$row["customer_id"].'">Edit</a> / <a href="/the_backpacker/deleteCustomer.php?cid='.$row["customer_id"].'">Delete</a></td>
                                </tr>';                                
                                $customer_counter++;


                                // Customer Modal
                                echo '<div class="modal fade" id="customerModal'.$row["customer_id"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Customer Details</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/the_backpacker/update_customer.php?cid='.$row['customer_id'].'" method="post">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="c_name" class="form-control" id="floatingName" placeholder="Name" value="'.$row["customer_name"].'">
                                                        <label for="floatingName">Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" name="contact_num" class="form-control" id="floatingName" placeholder="Contact" value="'.$row["contact_num"].'">
                                                        <label for="floatingName">Contact</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="dest" class="form-control" id="floatingDest" placeholder="Destination" value="'.$row["destination"].'">
                                                        <label for="floatingDest">Destination</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" name="room_booked" class="form-control" id="floatingRooms" placeholder="Total Rooms" value="'.$row["rooms_book"].'">
                                                        <label for="floatingRooms">Room Booked</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="number" name="total_pay" class="form-control" id="floatingPay" placeholder="Total Pay" value="'.$row["total_pay"].'">
                                                        <label for="floatingPay">Total Pay</label>
                                                    </div>
                                                
                                                
                                            </div>
                                            <div class="modal-footer">                                    
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>';
                            }
                        }
                    ?>
                        
                    </tbody>
                </table>
            </div>
    
        </div>
        
    
</div>
    
<?php

    include("footer.php");

?>
