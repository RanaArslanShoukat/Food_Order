
<?php include('top.php'); ?>
    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <h1 class="h1">Dashboard:</h1>
                </div>
                   
                <?php
                        
                    if(isset($_SESSION['login']))
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Login  Successful !
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                        <?php
                        unset($_SESSION['login']);
                    }
                
                ?>

                <div class="row">
                    <div class="col-md-3 text-center box">
                        <?php
                           $sql="select * from tbl_category";
                           $res=mysqli_query($link,$sql);
                           $categories=mysqli_num_rows($res);
                        ?>
                        <h5><?php echo $categories; ?></h5>
                        <h6>Categories</h6>
                    </div>
                    <div class="col-md-3 text-center box">
                        <?php
                           $sql1="select * from tbl_food";
                           $res1=mysqli_query($link,$sql1);
                           $foods=mysqli_num_rows($res1);
                        ?>
                        <h5><?php echo $foods; ?></h5>
                        <h6>Foods</h6>
                    </div>
                    <div class="col-md-3 text-center box">
                       <?php
                           $sql2="select * from tbl_order";
                           $res2=mysqli_query($link,$sql2);
                           $orders=mysqli_num_rows($res2);
                        ?>
                        <h5><?php echo $orders; ?></h5>
                        <h6>Total Orders</h6>
                    </div>
                    <div class="col-md-3 text-center box">
                        <?php
                           $sql3="select SUM(total) AS Total from tbl_order where status='Delivered'";
                           $res3=mysqli_query($link,$sql3);
                           $row3=mysqli_fetch_assoc($res3);
                           $revenue=$row3['Total'];
                        ?>
                        <h5>$<?php echo $revenue; ?></h5>
                        <h6>Revenue</h6>
                    </div>
                </div>
            </div>

        </section>
     
    <!-- Main content end -->
    
<?php include('bottom.php'); ?> 