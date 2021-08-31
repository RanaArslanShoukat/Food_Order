<?php  include('partials-front/navbar.php'); ?>

    <!-- categories section start -->
    <section class="categories-section">
        <div class="container category">
            <h1 class="h1 text-center">Explore Categories</h1>
            <div class="row">
              <?php
                  $sql="select * from tbl_category where active='Yes' ";
                  $res=mysqli_query($link,$sql);
                  $count=mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                        <div class="col-md-4">
                            <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>" class="image" alt="pizza">
                            <h2 class="h2 text-center"><?php echo $title; ?></h2>
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
    <!-- categories section end -->

    <?php  include('partials-front/footer.php'); ?>