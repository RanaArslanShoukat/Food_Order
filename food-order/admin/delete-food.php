<?php
include('connection.php');
$id = $_REQUEST['id'];

$q ="delete from tbl_food where id=".$id;
$qs = mysqli_query($link,$q);
if($qs)
{
    $_SESSION['delete'] = "category deleted";
    header("location:".SITEURL.'admin/food.php');
}
else{
    
    echo "error in deleting";
} 
include('bottom.php');
?>