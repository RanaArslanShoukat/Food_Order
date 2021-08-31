<?php include('top.php'); ?>
    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Add Category:</h1>
                    <br/><br/>
                    <?php
                       
                       if(isset($_SESSION['upload']))
                       {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           Record has not  been Uploaded !
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        unset($_SESSION['upload']);
                       }
                    
                    ?>
                    <form class="form-group" method="post" action="" enctype="multipart/form-data">
                    <?php 
                        if(isset($_POST['title']))
                        {
                            $title = $_POST['title'];
                            if(isset($_POST['featured']))
                            {
                                $featured = $_POST['featured'];
                            }
                            else
                            {
                                $featured = 'No';
                            }
                            if(isset($_POST['active']))
                            {
                                $active = $_POST['active'];
                            }
                            else
                            {
                                $active = 'No';
                            }
                            if(isset($_FILES['image']['name']))
                            {
                            $image_name = $_FILES['image']['name'];
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path  = "../images/category/".$image_name;

                            $upload = move_uploaded_file($source_path,$destination_path);

                            if($upload==false)
                            {
                                $_SESSION['upload'] = "failed";
                                header("location:".SITEURL.'admin/Add-category.php');
                                die();
                            }
                            }
                            else
                            {
                            $image_name = "";
                            }

                            $q = "insert into tbl_category (title,image_name,featured,active) value ('$title','$image_name','$featured','$active')";
                            $rs = mysqli_query($link,$q);
                            if($rs){
                                
                                $_SESSION['add'] = "Category Added";
                                header("location:".SITEURL.'admin/category.php');
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

                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Food Title" required />
                    <br/>
                    <label for="formFile" class="form-label">Select Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                    <br/>
                    <label>Featured:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="inlineRadio1" value="Yes">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="inlineRadio1" value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <br/><br/>
                    <label>Active:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="Yes">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    
                    <br/><br/>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                    </form>
                    
                </div>
            </div>

        </section>
     
    <!-- Main content end -->
    
    </body>
</html>