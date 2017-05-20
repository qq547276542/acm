<html>
<body>
  <?php include '../config/database.php';
        include '../tool/tool.php'
  ?>
	<?php	
      header('content-type:text/html;charset=utf-8;');//统一字符集，防止乱码
      error_reporting(0);//屏蔽错误信息
	    $username=$password=$email="";
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	      $username = test_input($_POST["username"]);
	      $email = test_input($_POST["email"]);
	      $password = test_input($_POST["password"]);
      }
      $conn = get_connect();
      if ($conn->connect_error)
      {
         die("connect failed: " . $conn->connect_error);
      }
      $sql="INSERT INTO person (username, password, email,usertype,avatar,power_num,power_ds,power_math,power_dp,power_graph,power_cal,power_mn)
      VALUES
      ('$username','$password','$email','正式队员','init_avatar.jpg',10,1,1,1,1,1,1)";
      $conn->query("set names utf8");
      if ($conn->query($sql) === TRUE)
        {
           setcookie("login_user", $username, time()+3600,'/');  //设置登陆状态
           header("Location:../edit_user_info.php"); 
        }
        else{
        // echo "<script type='text/javascript'> alert('该用户名已经存在！'); </script>";
           echo "<script>history.back();alert('该用户名已经存在！');</script>";
        // header("Location:../sign_up.php"); 
        // die('Error: ' . mysql_error());
      }
     $conn->close();
       
  ?>
</body>
</html>

