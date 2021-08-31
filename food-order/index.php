<?php  include('partials-front/navbar.php'); ?>

    <!-- slider section start -->
    <section class="slider-section">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/slide2.jpg" class="w-100" alt="slide1">
              </div>
              <div class="carousel-item">
                <img src="images/slide1.jpg" class="w-100" alt="slide2">
              </div>
              <div class="carousel-item">
                <img src="images/slide3.jpg" class="w-100" alt="slide3">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- slider section end -->
        
    <!-- categories section start -->
    <section class="categories-section">
        <div class="container category">
            <h1 class="h1 text-center">Explore Foods</h1>
              <div class="row">
                <?php
                  $sql="select * from tbl_category where active='Yes' AND featured='Yes' LIMIT 3";
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
    
    <!-- search section start -->
    <section class="search-section">
             <div class="search">
                <form class="d-flex form" action="search.php">
                    <input class="form-control me-2 w-auto" type="search" placeholder="Search Foods" aria-label="Search" required>
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
             </div>
    </section>
    <?php            
      if(isset($_SESSION['order']))
      {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          Order Placed !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php 
      unset($_SESSION['order']);
      }
        
    ?>
    <!-- search section end -->
          
    <!-- food section start -->
    <section class="food-section">
       <div class="container">
        <h1 class="h1 text-center">Food Menu</h1>
        <div class="row">
            <?php
                $sql1="select * from tbl_food where active='Yes' AND featured='Yes' LIMIT 6";
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
                        <button class="btn btn-danger mb-2 ms-3"><a href="order.php?food_id=<?php echo $id; ?>" style="text-decoration: none;color: #fff;">Order Now</a></button>
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
    
<?php include('partials-front/footer.php'); ?>