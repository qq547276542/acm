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
      $conn = get_connect();
      if ($conn->connect_error)
      {
         die("connect failed: " . $conn->connect_error);
      }
      $sql = "SELECT password
        FROM person
        WHERE username='".$username."'";
      
      $result= $conn->query($sql);
      if ($result->num_rows > 0){
         // 输出每行数据
         while($row = $result->fetch_assoc()) { //while只会执行一次
          if($row["password"]==$password){
            setcookie("login_user", $username, time()+3600,'/');  //设置登陆状态
            header("Location:../index.php");  
          }else{
            echo "密码错误！";
          }
         }
      } else {
        echo "用户名不存在";
      }
      $conn->close();
      
  ?>
</body>
</html>


