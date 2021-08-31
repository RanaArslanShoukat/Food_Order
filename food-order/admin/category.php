<?php
 include('top.php');
 $r = "select * from tbl_category";
 $rs = mysqli_query($link,$r);
?>
    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <h1 class="h1">Manage Category:</h1>
                    <br/>
                    <a href="Add-category.php" class="btn btn-primary">Add Category</a>
                    <br/> <br/><br/>
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
                        if(isset($_SESSION['upload']))
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                             Record has not been Uploaded !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> 
                            <?php
                            unset($_SESSION['upload']);
                        }
                    ?>
                    <table class="table table-hover">
                        <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Delete</th>
                        <th>Update</th>
                        </tr>
                        
                        <?php
                        $sn=1;
                        while ($rows = mysqli_fetch_assoc($rs)){
                        ?>
                        <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $rows['title']; ?></td>
                        <td>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $rows['image_name'] ?>" width="60px" height="40px">
                        </td>
                        <td><?php echo $rows['featured']; ?></td>
                        <td><?php echo $rows['active']; ?></td>
                        <td><a href="delete-category.php? id=<?php echo $rows['id'];?>"><button class="btn btn-danger">Delete</button></a></td>
                        <td><a href="update-category.php? id=<?php echo $rows['id'];?>"><button class="btn btn-success">Update</button></a></td>
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