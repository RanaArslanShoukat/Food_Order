<?php
   include_once('connection.php');


   session_destroy();

   header("location:".SITEURL.'admin/login.php');

?>