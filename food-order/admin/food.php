<?php include('top.php'); ?>
    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <h1 class="h1">Manage Food:</h1>
                    <br/>
                    <?php
                      
                      if(isset($_SESSION['add']))
                        {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                             Record has been Saved !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> 
                            <?php
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['delete']))
                        {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                             Record has been Deleted !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> 
                            <?php
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['update']))
                        {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                             Record has been Updated !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> 
                            <?php
                            unset($_SESSION['update']);
                        }
                    
                    ?>
                    <a href="Add-food.php" class="btn btn-primary">Add Food</a>
                    <br><br/>
                    <table class="table table-hover">
                        <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Delete</th>
                        <th>Update</th>
                        </tr>
                        
                        <?php
                        $r = "select * from tbl_food";
                        $rs = mysqli_query($link,$r);
                        $sn=1;
                        while ($rows = mysqli_fetch_assoc($rs)){
                        ?>
                        <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $rows['title']; ?></td>
                        <td>$<?php echo $rows['price']; ?></td>
                        <td>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $rows['image_name'] ?>" width="60px" height="40px">
                        </td>
                        <td><?php echo $rows['featured']; ?></td>
                        <td><?php echo $rows['active']; ?></td>
                        <td><a href="delete-food.php? id=<?php echo $rows['id'];?>"><button class="btn btn-danger">Delete</button></a></td>
                        <td><a href="update-food.php? id=<?php echo $rows['id'];?>"><button class="btn btn-success">Update</button></a></td>
                        </tr>
                        <?php
                    
                        }
                    
                        ?>
                   </table>
                </div>
            </div>

        </section>
     
    <!-- Main content end -->
    
  <?php include('bottom.php'); ?>  