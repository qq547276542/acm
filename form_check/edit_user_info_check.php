<html>
<body>
  <?php include '../config/database.php';
  include '../tool/tool.php'
  ?>
  <?php 
      header('content-type:text/html;charset=utf-8;');//统一字符集，防止乱码
      error_reporting(0);//屏蔽错误信息
      $password="";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = test_input($_POST["password"]);
      }
      $conn = get_connect();
      if ($conn->connect_error)
      {
       die("connect failed: " . $conn->connect_error);
     }
     $sql = "SELECT password
     FROM person
     WHERE username='".$_COOKIE['login_user']."'";

     $result= $conn->query($sql);
     if ($result->num_rows > 0){
         // 输出每行数据
         while($row = $result->fetch_assoc()) { //while只会执行一次
          if($row["password"]==$password){
            setcookie("update_info", "", time()+3600,'/');  //设置是否成功更新用户信息
            header("Location:../user_info.php");  
          }else{
            setcookie("update_info", "false", time()+3600,'/');  //设置是否成功更新用户信息
            header("Location:../edit_user_info.php"); 
          }
        }
      } else {
        echo "用户名不存在";
      }
      $conn->close();
      
      ?>
    </body>
    </html>

