<?php include('top.php'); ?>
    <!-- Main content start -->
        
        <section class="main">
            <div class="container">
                <div class="dash">
                    <h1 class="h1">Manage Food:</h1>
                    <br/>
                    <?php
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
                    <br><br/>
                    <table class="table table-hover">
                        <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Update</th>
                        </tr>
                        
                        <?php
                        $sql = "select * from tbl_order order by id desc";
                        $res = mysqli_query($link,$sql);
                        $count=mysqli_num_rows($res);
                        if($count>0)
                        { 
                            $sn=1;
                            while ($row = mysqli_fetch_assoc($res)){
                                $id=$row['id'];
                                $food=$row['food'];
                                $price=$row['price'];
                                $quantity=$row['qty'];
                                $total=$row['total'];
                                $order_date=$row['order_date'];
                                $status=$row['status'];
                                $customer_name=$row['customer_name'];
                                $customer_contact=$row['customer_contact'];
                                $customer_email=$row['customer_email'];
                                $customer_addresss=$row['customer_address'];
                            ?>
                            <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $food; ?></td>
                            <td>$<?php echo $price; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td>$<?php echo $total; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_addresss; ?></td>
                            <td><a href="update-order.php? id=<?php echo $id;?>"><button class="btn btn-success">Update</button></a></td>
                            </tr>
                            <?php
                    
                             }
                        }
                        else
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                There is no Order Available !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> 
                            <?php
                        }
                        
                    
                        ?>
                   </table>
                </div>
            </div>

        </section>
     
    <!-- Main content end -->
    
  <?php include('bottom.php'); ?>  