<?php include('top.php'); ?>

    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Add Food:</h1>
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
                    <?php
                        if(isset($_POST['submit']))
                        {
                            $title=$_POST['title'];
                            $description=$_POST['description'];
                            $price=$_POST['price'];
                            $price=$_POST['price'];
                            $category=$_POST['category'];

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
                                $destination_path  = "../images/food/".$image_name;

                                $upload = move_uploaded_file($source_path,$destination_path);

                                if($upload==false)
                                {
                                    $_SESSION['upload'] = "failed";
                                    header("location:".SITEURL.'admin/Add-food.php');
                                    die();
                                }
                            }
                            else
                            {
                                $image_name = "";
                            }

                            $sql2="insert into tbl_food set
                                  title='$title',
                                  description='$description',
                                  price='$price',
                                  image_name='$image_name',
                                  category_id='$category',
                                  featured='$featured',
                                  active='$active'
                            ";

                            $res2=mysqli_query($link,$sql2);

                            if($res2){
                                
                                $_SESSION['add'] = "food Added";
                                header("location:".SITEURL.'admin/food.php');
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
                    <form class="form-group" method="post" enctype="multipart/form-data">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Food Title" required />
                    <br/>
                    <label>Description:</label>
                    <textarea class="form-control" placeholder="Description" name="description"  style="height: 100px"></textarea>
                    <br/>
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" placeholder="Enter Price" required />
                    <br/>
                    <label for="formFile" class="form-label">Select Image:</label>
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
                                           $id=$row['id'];
                                           $title=$row['title'];
                                           ?>
                                             <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
                     <br/>
                     <br/>
                     <br/>
                     <br/>
                    </form>

                </div>
            </div>

        </section>
     
    <!-- Main content end -->
    
    </body>
</html>