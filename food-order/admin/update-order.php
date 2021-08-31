<?php  include('top.php');?>


<section class="main">
            <div class="container">
                <div class="dash">
                    <br/><br/>
                    <h1 class="h1">Update Food:</h1>
                    <?php
                       if(isset($_GET['id']))
                       {
                           $id=$_GET['id'];
                           $sql="select * from tbl_order where id=$id";
                           $res = mysqli_query($link,$sql);
                           $count=mysqli_num_rows($res);
                           if($count==1)
                           {
                              $row = mysqli_fetch_assoc($res);
                              $food=$row['food'];
                              $price=$row['price'];
                              $quantity=$row['qty'];
                              $status=$row['status'];
                              $customer_name=$row['customer_name'];
                              $customer_contact=$row['customer_contact'];
                              $customer_email=$row['customer_email'];
                              $customer_address=$row['customer_address'];
                           }
                           else
                           {
                              header('location:'.SITEURL.'admin/order.php');
                           }
                       }
                       else
                       {
                           header('location:'.SITEURL.'admin/order.php');
                       }
                    ?>
                    <?php
                       if(isset($_POST['submit']))
                       { 
                            $id=$_POST['id'];
                            $price=$_POST['price'];
                            $quantity=$_POST['quantity'];
                            $total=$quantity*$price;
                            $status=$_POST['status'];
                            $customer_name=$_POST['customer_name'];
                            $customer_contact=$_POST['customer_contact'];
                            $customer_email=$_POST['customer_email'];
                            $customer_address=$_POST['customer_address']; 

                            $sql2="update tbl_order set
                                qty='$quantity',
                                total='$total',
                                status='$status',
                                customer_name='$customer_name',
                                customer_contact='$customer_contact',
                                customer_email='$customer_email',
                                customer_address='$customer_address'
                                where id=$id
                            ";

                            $res2 = mysqli_query($link,$sql2);
                            if($res2)
                            {
                                $_SESSION['update']="order updated";
                                header('location:'.SITEURL.'admin/order.php');

                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Not Updated !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                            }
                       }
                    ?>
                    <form class="form-group" method="post">
                    <label>Food Name:</label>
                    <input type="text" class="form-control" value="<?php echo $food; ?>"  required />
                    <br/>
                    <label>Price:</label>
                    <input type="text" class="form-control" value="$<?php echo $price; ?>"  required />
                    <br/>
                    <label>Quantity:</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Enter The Quantity" value="<?php echo $quantity; ?>" required />
                    <br/>
                    <label>Status:</label>
                    <select class="form-select" name="status">
                        <option <?php if($status=="Ordered"){ echo "selected";} ?> value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivery"){ echo "selected";} ?> value="On Delivery">On Delivery</option>
                        <option <?php if($status=="Delivered"){ echo "selected";} ?> value="Delivered">Delivered</option>
                        <option <?php if($status=="Cancelled"){ echo "selected";} ?> value="Cancelled">Cancelled</option>
                    </select>
                    <br/>
                    <label>Name:</label>
                    <input type="text" class="form-control" name="customer_name" value="<?php echo $customer_name; ?>" placeholder="Enter Your Name" required />
                    <br/>
                    <label>Phone Number:</label>
                    <input type="number" class="form-control" name="customer_contact" value="<?php echo $customer_contact; ?>" placeholder="Enter Phone Number"  required />
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" class="form-control" name="price" value="<?php echo $price; ?>" />
                    <br/>
                    <label>Email:</label>
                    <input type="email" class="form-control" name="customer_email" value="<?php echo $customer_email; ?>" placeholder="Enter Email" required />
                    <br/>
                    <label>Address:</label>
                    <textarea class="form-control" name="customer_address" rows="5"  placeholder="Your Address" id="floatingTextarea"><?php echo $customer_address; ?></textarea>
                    <br/><br/>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    <br/><br/><br/>
                    </form>
                </div>
            </div>
 </section>
     
    <!-- Main content end -->  
<?php include('bottom.php');?>


