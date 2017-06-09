<?php
   function get_connect()  
   {
      $conn=mysqli_connect("localhost","upcacm","upcacm","acmdb");
      return $conn;
   }
?>