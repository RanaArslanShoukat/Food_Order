<?php include_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </head>
<body>
    <!-- Form Start -->

    <div class="container d-flex justify-content-center">
        <div class="outer-panel rounded">
            <div class="inner-panel rounded">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="mt-3">Sign In Form</h3>
                    </div>
                    <div class="form">
                        <?php
                        
                            if(isset($_SESSION['login']))
                            {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username or Password is not correct !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                                unset($_SESSION['login']);
                            }
                            if(isset($_SESSION['no-login']))
                            {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Login to Access ! 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                                unset($_SESSION['no-login']);
                            }
                        
                        ?>
                        <form class="form-group" method="post" action="">
                            <br/>
                            <label>User Name:</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Your User Name" required />
                            <br/>
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Your Pasword" required />
                            <br/>
                            <button class="btn btn-primary" name="sumbit">Sign In</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form End   -->
    
</body>
</html>
<?php

 if(isset($_POST['username']) && isset($_POST['password']))
 {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "select * from tbl_admin where username='$username' and password='$password'";

    $res = mysqli_query($link,$sql);

    $count = mysqli_num_rows($res);

    if($count > 0)
    {
        $_SESSION['login'] = "Login Successful";
        $_SESSION['user'] = $username;
        header("location:".SITEURL.'admin/');
    }
    else
    {
        $_SESSION['login'] = "Login not  Successful";
        header("location:".SITEURL.'admin/login.php');
    }
 }

?>