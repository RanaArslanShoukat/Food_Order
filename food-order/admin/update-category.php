<?php  include('top.php');?>


<section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Update Category:</h1>
                    <br/><br/>
                    <?php

                    $id = $_GET['id'];
                    $q ="select * from tbl_category where id=$id";
                    $qs = mysqli_query($link,$q);

                    $row = mysqli_fetch_assoc($qs);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                    ?>
                    <?php 

                        if(isset($_POST['submit']))
                        {
                            $id = $_POST['id'];
                            $title = $_POST['title'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];
                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];
                                $source_path = $_FILES['image']['tmp_name'];
                                $destination_path  = "../images/category/".$image_name;

                                $upload = move_uploaded_file($source_path,$destination_path);

                                if($upload==false)
                                {
                                    $_SESSION['upload'] = "failed";
                                    header("location:".SITEURL.'admin/category.php');
                                    die();
                                }
                            }
                            else
                            {
                            $image_name = "";
                            }
                            $sql="UPDATE tbl_category SET
                            title='$title', 
                            image_name='$image_name', 
                            featured='$featured',
                            active='$active' 
                            where id='$id'
                            ";
                            $qr = mysqli_query($link,$sql);
                            if($qr){
                                $_SESSION['update'] = "Category deleted";
                                header("location:".SITEURL.'admin/category.php');
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
                    <form class="form-group" method="post" action="" enctype="multipart/form-data">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Enter Your Name" required />
                    <br/>
                    <label for="formFile" class="form-label">Current Image:</label>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="60px">
                    <br/>
                    <label for="formFile" class="form-label">New Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                    <br/>
                    <label>Featured:</label>
                    <div class="form-check form-check-inline">
                        <input <?php if($featured=="Yes"){ echo "checked"; } ?> class="form-check-input" type="radio" name="featured" id="inlineRadio1" value="Yes">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input <?php if($featured=="No"){ echo "checked"; } ?>  class="form-check-input" type="radio" name="featured" id="inlineRadio1" value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <br/><br/>
                    <label>Active:</label>
                    <div class="form-check form-check-inline">
                        <input  <?php if($active=="Yes"){ echo "checked"; } ?> class="form-check-input" type="radio" name="active" id="inlineRadio1" value="Yes">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input <?php if($active=="No"){ echo "checked"; } ?>  class="form-check-input" type="radio" name="active" id="inlineRadio1" value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <input type="hidden" class="form-control" name="current_image" value="<?php echo $current_image; ?>" />
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />
                    <br/><br/>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>

                    </form>
                </div>
            </div>

        </section>
     
    <!-- Main content end -->  
<?php include('bottom.php');?>


