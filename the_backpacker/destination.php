<?php
    include("header.php");  
    if(!isset($_GET['dest']) and !isset($_GET['check_in']) and !isset($_GET['check_out']))
    {
        header("location:welcome.php");
    } 
?>



<?php    
    
    $dest = $_GET['dest'];

    $sql_query = "SELECT * FROM `hostels` WHERE `hostel_destination`='$dest'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_assoc($result);
    
    echo '<div class="container-flex text-center text-capitalize" >
    <img src="stock-images/'.strtolower($dest).'.jpg" class="img-fluid w-100 opacity-75" alt="'.$dest.'">
            <h1 class="centered" style="text-shadow: 2px 2px 2px black;">'.$dest.'</h1>
        </div>';
    

?>

<div class="container-fluid my-5">
    <h2>Hostel in <?php echo strtoupper($dest);?></h2>
    <div class="card mb-3 w-100">
        <div class="row g-0">
            <div class="col-md-4">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="stock-images/room1.jpg" class="img-fluid rounded-start">
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        </div>
                        <div class="carousel-item">
                            <img src="stock-images/room2.jpg" class="img-fluid rounded-start">
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        </div>
                        <div class="carousel-item">
                            <img src="stock-images/room3.jpg" class="img-fluid rounded-start">
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        </div>
                    </div>
                    
                </div>
            
            </div>
            <div class="col-md-8 my-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h5 class="card-title text-decoration-underline">Mixed Bed Dormitory</h5>
                        </div>

                        <div class="col-md-5">
                            <h1 class="card-title text-end"><?php echo $row['price'];?>Rs.</h1>
                        </div>
                    </div>

                    <div class="row">
                            <b>Address</b>
                            <p class="card-text"><?php echo $row['address'];?></p>
                    </div>  

                    <div class="row my-3">
                        <div class="col-md-8">
                            <b>Amenties</b>
                            <p class="card-text"><i>Wi-Fi | Cafe | CCTV Camera | Common Area | Indoor games | Parking | Pet friendly |</i></p>
                        </div>

                        <div class="col-md-4">
                            <p class="card-text text-end text-success"><b><?php echo $row['num_rooms']?> beds available</b></p>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-8">
                            <b>Important Timings</b><br>
                            <span class="card-text"> Cafe - <b>9AM to 11PM</b> | Reception - <b>24 Hours</b> | Guest Visit - <b>10AM to 8PM</b> | Common Area - <b>24 Hours</b></span>
                            
                        </div>

                        <div class="col-md-4 text-end">
                            <?php 
                                if($row['num_rooms']==0)
                                {
                                    echo '<button class="btn btn-primary text-end" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Sold Out</button>';
                                }
                                else
                                {
                                    echo '<button class="btn btn-primary text-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Bed</button>';
                                }
                                
                            ?>
                            
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Booking</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/the_backpacker/add_customer.php?dest=<?php echo $dest?>&check_in=<?php echo $_GET['check_in']?>&check_out=<?php echo $_GET['check_out']?>" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="fname" class="form-label">Full Name</label>
                                                <input type="text" name="customer_name" class="form-control" id="fname" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control" id="email" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="contact" class="form-label">Contact Number</label>
                                                <input type="number" name="contact_num" class="form-control" id="contact" required>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row my-1">
                                                    <div class="col-md-8 py-3 border border-primary">
                                                        Check In
                                                    </div>
                                                    <div class="col-md-4 py-3 border border-primary">
                                                        <input type="date" name="check_in" value="<?php echo $_GET["check_in"]?>" class="form-control"/> 
                                                    </div>
                                                </div>

                                                <div class="row my-1">
                                                    <div class="col-md-8 py-3 border border-primary">
                                                        Check Out
                                                    </div>
                                                    <div class="col-md-4 py-3 border border-primary">
                                                        <input type="date" name="check_out" value="<?php echo $_GET["check_out"]?>" class="form-control"/>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <h5>Add Beds</h5>
                                                <div class="row">
                                                    <div class="col-md-9 py-3 border border-primary">
                                                        <span onclick="remove_bed()" class="btn btn-primary btn-sm">-</span>

                                                        <input type="text" class="text-center" name="bed_count" id="bed_count" value="1" size="1" style="border: none; outline: none" readonly/>

                                                        <span onclick="add_bed()"  class="btn btn-primary btn-sm">+</span>
                                                    </div>

                                                    <div class="col-md-3 py-3 text-end border border-primary">
                                                        <input type="text" id="amnt_text" class="form-control text-center" name="total_pay" value="<?php echo $row['price']?>Rs." size="1" style="border: none; outline: none" readonly/>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row my-1">
                                                    <button type="submit" class="btn btn-outline-primary">Confirm Booking</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
<?php
    
    echo '
        var a = document.getElementById("bed_count");
        var total_beds = '.$row["num_rooms"].'
        var amntText = document.getElementById("amnt_text");
        
        function add_bed(){
            if(a.value<total_beds)
            {
                a.value++;
                var total_amount = a.value*'.$row["price"].'
                amntText.value = total_amount+" Rs.";
            }
            
            a.value = a.value; 
            
        }

        function remove_bed(){
            if(a.value>1)
            {
                a.value--;
                var total_amount = a.value*'.$row["price"].'
                amntText.value = total_amount+" Rs.";
            }
            a.value = a.value; 
                       
        }
    ';
        
    
?>
</script>


<?php
    include("footer.php");
?>