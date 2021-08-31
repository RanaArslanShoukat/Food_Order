<?php include('top.php'); ?>

    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Add Admin:</h1>
                    <br/><br/>
                    <form class="form-group" method="post" action="">
                    <label>Full Name:</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter Your Name" required />
                    <br/>
                    <label> Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter User Name" required />
                    <br/>
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your password" required />
                    <br/>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                    </form>

                </div>
            </div>

        </section>
     
    <!-- Main content end -->
    
    </body>
</html>
  <?php 
if(isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['password'])){
   $full_name = $_POST['full_name'];
   $username = $_POST['username'];
   $password = md5($_POST['password']);//for encrpt password

$q = "insert into tbl_admin (full_name,username,password) value ('$full_name','$username','$password')";
$rs = mysqli_query($link,$q);

if($rs){
    
    $_SESSION['add'] = "Admin Added";
    header("location:".SITEURL.'admin/admin.php');
}
else{
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Record has not  been Saved !
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
    <?php
}

}
?>