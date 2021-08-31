
<?php 
include('top.php');
$r = "select * from tbl_admin";
$rs = mysqli_query($link,$r); 
?>

    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <h1 class="h1">Manage Admin:</h1>
                    <br/>
                    <a href="Add-Admin.php" class="btn btn-primary">Add Admin</a>
                    <br/><br/><br/>
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

                    <table class="table table-hover">
                        <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>UserName</th>
                        <th>Delete</th>
                        <th>Update</th>
                        </tr>
                        
                        <?php
                        $sn=1;
                        while ($rows = mysqli_fetch_assoc($rs)){
                        ?>
                        <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $rows['full_name']; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><a href="delete-admin.php? id=<?php echo $rows['id'];?>"><button class="btn btn-danger">Delete</button></a></td>
                        <td><a href="update-admin.php? id=<?php echo $rows['id'];?>"><button class="btn btn-success">Update</button></a></td>
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