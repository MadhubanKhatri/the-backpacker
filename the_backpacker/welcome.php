<?php
    include "header.php";
    if(isset($_GET['success']))
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> Your booking is successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }    
      
    
?>


<div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="stock-images/img1.jpg" class="d-block w-100" alt="img1">
          </div>
    <?php
        $img_array = ["img2.jpg","img3.jpg","img4.jpg","img5.jpg","img6.jpg","img7.jpg"];
        for ($i=0; $i < count($img_array); $i++) { 
            echo '<div class="carousel-item">
            <img src="stock-images/'.$img_array[$i].'" class="d-block w-100" alt="img1">
          </div>';
        }
    
    ?>
     
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container my-4 bg-dark py-3">
    <table class="table text-light">
        <tr>
            <form action="/the_backpacker/destination.php" method="get">
                <td>
                    <label class="form-label">Select your Destination</label>
                    <select class="form-control" name="dest">
                        <option>Jodhpur</option>
                        <option>Jaisalmer</option>
                        <option>Coorg</option>
                        <option>Bir</option>
                        <option>Jaipur</option>
                        <option>Agra</option>
                        <option>Delhi</option>
                        <option>Kasol</option>
                        <option>Goa</option>
                    </select>
                </td>
                <td>
                    <label class="form-label">Check In</label>
                    <input type="date" name="check_in" id="date1" value="<?php echo date("Y-m-d")?>" min="<?php echo date("Y-m-d")?>" class="form-control" oninput="my_fun()" required/>
                </td>
                <td>
                    <label class="form-label">Check Out</label>
                    <input type="date" name="check_out" id="date2" value="<?php echo date("Y-m-d",strtotime(' +1 day'))?>" min="<?php echo date("Y-m-d")?>" class="form-control" required/>
                </td>
                <td>
                    <label class="form-label"></label>
                    <input type="submit" class="form-control btn btn-outline-primary my-2" value="CHECK NOW"/>
                </td>
            </form>
        </tr>
    </table>
</div>



<div class="container row mx-5" id="top_destinations">
    <h2>Top Destination</h2>
    <hr>
    <?php
        $card_details = [
            'jaisalmer'=>'jaisalmer.jpg', 'jaipur'=>'jaipur.jpg','bir'=>'bir.jpg','jodhpur'=>'jodhpur.jpg','agra'=>'agra.jpg','coorg'=>'coorg.jpg','delhi'=>'delhi.jpg', 'goa'=>'goa.jpg', 'kasol'=>'kasol.jpg'
        ];
        foreach ($card_details as $key => $value) {
            echo '<div class="container-flex col-md-4 my-3">
            <div class="card" style="width: 25rem;">
                <img src="stock-images/'.$value.'" class="card-img-top" height="300px" alt="...">
                <div class="card-body">
                    <a href="/the_backpacker/destination.php?dest='.$key.'&check_in='.date("Y-m-d").'&check_out='.date("Y-m-d",strtotime(' +1 day')).'" style="text-decoration: none;"><h5 class="card-title">'.strtoupper($key).'</h5></a>
                </div>
            </div>
        </div>';
        }
    
    ?>

    <hr>
</div>

<script>
    <?php
    echo 'var d1 = document.getElementById("date1");
        var d2 = document.getElementById("date2");
        console.log(d1.min);

        function my_fun()
        {
            d2.value = d1.value;
            d2.min = d1.value;
        }';
        
    ?>
</script>


<?php
    include "footer.php";

?>
