<?php  include('top.php');?>


<section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Update Admin:</h1>
                    <br/><br/>
                    <?php

                    $id = $_GET['id'];
                    $q ="select * from tbl_admin where id=$id";
                    $qs = mysqli_query($link,$q);

                    $row = mysqli_fetch_assoc($qs);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $password = $row['password'];

                    ?>
                    <form class="form-group" method="post" action="">
                    <label>Full Name:</label>
                    <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>" placeholder="Enter Your Name" required />
                    <br/>
                    <label> Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Enter User Name" required />
                    <br/>
                    <label>Password:</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Enter Your password" required />
                    <br/>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>

                    </form>

                </div>
            </div>

        </section>
     
    <!-- Main content end -->
<?php 

if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql="UPDATE tbl_admin SET
    full_name='$full_name', 
    username='$username', 
    password='$password' 
    where id='$id'
    ";
    $qr = mysqli_query($link,$sql);
    if($qr){
        $_SESSION['update'] = "Admin deleted";
        header("location:".SITEURL.'admin/admin.php');
    }
    else{
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Record has not  been Updated !
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
        <?php
    }
    
    }
    ?>    
<?php include('bottom.php');?>


