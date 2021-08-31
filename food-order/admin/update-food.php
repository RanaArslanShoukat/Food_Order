<?php  include('top.php');?>


<section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Update Food:</h1>
                    <br/><br/>
                    <?php

                    $id = $_GET['id'];
                    $q ="select * from tbl_food where id=$id";
                    $qs = mysqli_query($link,$q);

                    $row2 = mysqli_fetch_assoc($qs);
                    $title = $row2['title'];
                    $description = $row2['description'];
                    $price = $row2['price'];
                    $current_image = $row2['image_name'];
                    $cuurent_category = $row2['category_id'];
                    $featured = $row2['featured'];
                    $active = $row2['active'];

                    ?>
                    <?php 

                        if(isset($_POST['submit']))
                        {
                            $id = $_POST['id'];
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $category = $_POST['category'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];
                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];
                                $source_path = $_FILES['image']['tmp_name'];
                                $destination_path  = "../images/food/".$image_name;

                                $upload = move_uploaded_file($source_path,$destination_path);

                                if($upload==false)
                                {
                                    $_SESSION['upload'] = "failed";
                                    header("location:".SITEURL.'admin/food.php');
                                    die();
                                }
                            }
                            else
                            {
                            $image_name = "";
                            }
                            $sql="UPDATE tbl_food SET
                            title='$title', 
                            description='$description', 
                            price='$price', 
                            image_name='$image_name', 
                            category_id='$category',
                            featured='$featured',
                            active='$active' 
                            where id='$id'
                            ";
                            $qr = mysqli_query($link,$sql);
                            if($qr){
                                $_SESSION['update'] = "Food deleted";
                                header("location:".SITEURL.'admin/food.php');
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
                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"  required />
                    <br/>
                    <label>Description:</label>
                    <textarea class="form-control" name="description"  style="height: 100px"><?php echo $description; ?></textarea>
                    <br/>
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" value="<?php echo $price; ?>"   required />
                    <br/>
                    <label for="formFile" class="form-label">Current Image:</label>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="60px">
                    <br/>
                    <label for="formFile" class="form-label">New Image:</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                    <br/>
                    <select name="category" class="form-select" required>
                                <?php
                                
                                    //get category which are active from data base
                                    $sql="select * from tbl_category where active='Yes'";
                                    $res=mysqli_query($link,$sql);
                                    $count=mysqli_num_rows($res);
                                    if($count>0)
                                    {
                                        while ($row = mysqli_fetch_assoc($res))
                                        {
                                           $category_id=$row['id'];
                                           $category_title=$row['title'];
                                           ?>
                                             <option <?php if($cuurent_category==$category_id){ echo "selected"; } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                           <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                           <option value="0">No category found</option>
                                        <?php
                                    }
                                
                                ?>
                    </select>
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
                    <br/><br/>
                </div>
            </div>

        </section>
     
    <!-- Main content end -->  
<?php include('bottom.php');?>


