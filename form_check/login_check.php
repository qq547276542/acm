<html>
<body>
  <?php include '../config/database.php';
        include '../tool/tool.php'
  ?>
  <?php 
      header('content-type:text/html;charset=utf-8;');//统一字符集，防止乱码
      error_reporting(0);//屏蔽错误信息
      $username=$password="";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
      }
     
       
  ?>
</body>
</html>

