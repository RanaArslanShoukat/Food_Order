<?php
include('connection.php');
$id = $_REQUEST['id'];

$q ="delete from tbl_admin where id=".$id;
$qs = mysqli_query($link,$q);
if($qs)
{
    $_SESSION['delete'] = "Admin deleted";
    header("location:".SITEURL.'admin/admin.php');
}
else{
    
    echo "error in deleting";
} 
include('bottom.php');
?>