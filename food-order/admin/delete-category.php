<?php
include('connection.php');
$id = $_REQUEST['id'];

$q ="delete from tbl_category where id=".$id;
$qs = mysqli_query($link,$q);
if($qs)
{
    $_SESSION['delete'] = "category deleted";
    header("location:".SITEURL.'admin/category.php');
}
else{
    
    echo "error in deleting";
} 
include('bottom.php');
?>