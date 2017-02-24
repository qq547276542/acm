<html>
<body>
  <?php 
      header('content-type:text/html;charset=utf-8;');//统一字符集，防止乱码
      error_reporting(0);//屏蔽错误信息
      function test_input($data) {  
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $username=$password="";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
      }
      $con = mysql_connect("localhost","upcacm","upcacm");
      if (!$con)
      {
         die('Could not connect: ' . mysql_error());
      }
       
  ?>
</body>
</html>

