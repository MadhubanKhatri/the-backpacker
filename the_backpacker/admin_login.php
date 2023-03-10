<?php
    include("header.php");
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user_name  = $_POST['username'];   
        $pwd  = $_POST['password'];   
        if($user_name=='admin' and $pwd=='admin@2023')
        {
            $_SESSION['user'] = $user_name;
            header("location: admin_panel.php");
        }
        else
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error !</strong> Wrong Credentials. Try Again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    

?>
<?php
    if(!isset($_SESSION['user']))
    {
         
    

?>
<div class="container my-5">

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="stock-images/login.jpg" class="img-thumbnail rounded-start h-100" alt="...">
            </div>
            <div class="col-md-8 my-5">
                <div class="card-body">
                    <h3 class="card-title">Admin Login</h3>
                    <hr>
                    <form class="form-control" action="/the_backpacker/admin_login.php" method="post">
                        <div class="mb-3 my-5">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control border border-primary" id="exampleFormControlInput1" required>
                        </div>
                        <div class="mb-3  my-5">
                            <label for="exampleFormControlInput2" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control  border border-primary" id="exampleFormControlInput2" required>
                        </div>
                        <div class="mb-3  my-5">
                            <input type="submit" class="form-control btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
    }
    else
    {
        header('location: admin_panel.php');
    }
?>
<?php
include("footer.php");
?>