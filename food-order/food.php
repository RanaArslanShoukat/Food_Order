<?php  include('partials-front/navbar.php'); ?>

    <!-- food section start -->
    <section class="food-section">
       <div class="container">
        <h1 class="h1 text-center">Food Menu</h1>
        <div class="row">
            <?php
                $sql1="select * from tbl_food where active='Yes'";
                $res1=mysqli_query($link,$sql1);
                $count1=mysqli_num_rows($res1);
                if($count1>0)
                {
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                      $id=$row1['id'];
                      $title=$row1['title'];
                      $price=$row1['price'];
                      $description=$row1['description'];
                      $image_name=$row1['image_name'];
                      ?>
                      <div class="col-md-5 menu mb-5 ms-5">
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="">
                        <h4 class="h4"><?php echo $title; ?></h4>
                        <h4 class="h4">$<?php echo $price; ?></h4>
                        <p><?php echo $description; ?></p>
                        <button class="btn btn-danger mb-2 ms-3"><a href="order.php" style="text-decoration: none;color: #fff;">Order Now</a></button>
                      </div>
                      <?php
                    }
                }
                else
                {
                    echo "<div class='red'>Not Added Yet</div>";
                }
              
            ?>
            
        </div>
       </div>
    </section>
     <!-- food section end -->

     <?php  include('partials-front/footer.php'); ?>