<?php
   function get_connect()  
   {
   	  echo "test";
      $conn=mysqli_connect("localhost","upcacm","upcacm","acmdb");
      return $conn;
   }
?>