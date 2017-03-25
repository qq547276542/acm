<?php 
   setcookie("login_user", "", time()-3600,'/');  
   header("Location:index.php");  
?>