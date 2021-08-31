<?php

  if(!isset($_SESSION['user']))
  {
      //user is not log in
      $_SESSION['no-login'] = "Login to Access";
      header("location:".SITEURL.'admin/login.php');
  }


?>