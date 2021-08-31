<?php  include('partials-front/navbar.php'); ?>

    <!-- Form Start -->
    <?php
       if(isset($_GET['food_id']))
       {
            $food_id=$_GET['food_id'];
            $sql="select * from tbl_food where id=$food_id";
            $res=mysqli_query($link,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
       }
       else
       {
            header('location:'.SITEURL);
       }
    
    ?>
    <div class="container d-flex justify-content-center">
        <div class="outer-panel rounded">
            <div class="inner-panel rounded">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="mt-3">Order Form</h3>
                        <h6 class="h6">Cash on Delivery</h6>
                    </div>
                    <div class="form">
                        <?php
                            if(isset($_POST['food']) && isset($_POST['price']) && isset($_POST['quantity']))
                            {
                                $food=$_POST['food'];
                                $price=$_POST['price'];
                                $quantity=$_POST['quantity'];
                                $total=$quantity*$price;
                                $order_date=date("Y-m-d h:i:sa");
                                $status="ordered";
                                $customer_name=$_POST['name'];
                                $customer_contact=$_POST['contact'];
                                $customer_email=$_POST['email'];
                                $customer_address=$_POST['address'];
                                
                                $sql2="insert into tbl_order set
                                food='$food',
                                price='$price',
                                qty='$quantity',
                                total='$total',
                                order_date='$order_date',
                                status='$status',
                                customer_name='$customer_name',
                                customer_contact='$customer_contact',
                                customer_email='$customer_email',
                                customer_address='$customer_address'
                                ";
                                $res2=mysqli_query($link,$sql2);
                                if($res2)
                                {
                                    $_SESSION['order']="ordered";
                                    header('location:'.SITEURL);
                                }
                                else
                                {
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Order didn't Placed !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                                }
                            }
                        
                        ?>
                        <script>
                            function myfunction(){

                            var myname = document.getElementById("name").value.trim();
                            var mypnumber = document.getElementById("contact").value.trim();
                            var myemail = document.getElementById("email").value.trim();
                            var span1 = document.getElementById("1");
                            var span2 = document.getElementById("2");
                            var span3 = document.getElementById("3");
                            if(myname == ""){

                            span1.style.display="block";
                            document.getElementById("name").className="form-control name321";
                            }
                            if(!isNaN(myname) && myname != ""){
                                alert("Enter alphabets only in Name");
                            }
                            if(mypnumber == ""){

                            span2.style.display="block";
                            document.getElementById("pnumber").className="form-control name321";
                            }
                            if(myemail == ""){

                            span3.style.display="block";
                            document.getElementById("email").className="form-control name321";
                            }
                            else{
                                span3.style.display="none";
                                var atposition=myemail.indexOf("@");  
                                var dotposition=myemail.lastIndexOf(".");  
                                if (atposition<1 || dotposition<atposition+2 || dotposition+2>=myemail.length){  
                                        alert("Please enter a valid e-mail address");  
                                }  

                            }
                            }
                         </script>
                         <style>
                            .name123{
                            outline: none;
                            background: transparent;
                            }


                            .name321{
                            outline: none;
                            background: transparent;
                            border: 2px solid red;
                            }

                        </style>
                        <form class="form-group" method="post" action="">
                            <fieldset>
                                <legend>Selected Food</legend>
                                <div>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" >
                                </div>
                                <div>
                                    <h4 class="h4"><?php echo $title; ?></h4>
                                    <input type="hidden" name="food" value="<?php echo $title; ?>">
                                    <h4 class="h4">$<?php echo $price; ?></h4>
                                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                                </div>

                            </fieldset>
                            <br/>
                            <label>Quantity:</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Enter The Quantity" value="1" required />
                            <br/>
                            <label>Name:</label>
                            <input type="text" class="form-control name123" id="name" name="name" placeholder="Enter Your Name" required />
                            <span id="1" style="color: red;display: none;">*Enter Name</span>
                            <br/>
                            <label>Phone Number:</label>
                            <input type="number" class="form-control name123" id="contact" name="contact" placeholder="Enter Phone Number"  required />
                            <span id="2" style="color: red;display: none;">*Enter Numbers only</span>
                            <br/>
                            <label>Email:</label>
                            <input type="email" class="form-control name123" id="email" name="email" placeholder="Enter Email" required />
                            <span id="3" style="color: red;display: none;">*Enter email</span>
                            <br/>
                            <label>Address:</label>
                            <textarea class="form-control" name="address" rows="5" placeholder="Your Address" id="floatingTextarea"></textarea>
                            <br/>
                            <button class="btn btn-primary" onclick="myfunction()">Confirm Order</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End   -->
  </body>
</html>