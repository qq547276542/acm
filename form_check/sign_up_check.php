<html>
<body>
  <?php include '../config/database.php';
        include '../tool/tool.php'
  ?>
	<?php	
      header('content-type:text/html;charset=utf-8;');//统一字符集，防止乱码
      error_reporting(0);//屏蔽错误信息
	    $username=$password=$email=$invitation="";
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	      $username = test_input($_POST["username"]);
	      $email = test_input($_POST["email"]);
	      $password = test_input($_POST["password"]);
        $invitation = test_input($_POST["invitationCode"]);
      }

      $conn2 = get_connect();
      if ($conn2->connect_error)
      {
         die("connect failed: " . $conn2->connect_error);
      }
      $sql="SELECT * FROM Invitation_code  WHERE code='"."$invitation"."'";
      $conn2->query("set names utf8");
      $invitation_ans = $conn2->query($sql)->num_rows;
      $conn2->close();

      if($invitation_ans <= 0){
        echo "<script>alert('邀请码输入有误！');location.href='../sign_up.php'</script>";
      }else{

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
           echo "<script>alert('用户名已经存在！');location.href='../sign_up.php'</script>";
        // header("Location:../sign_up.php"); 
        // die('Error: ' . mysql_error());
      }
     $conn->close();

      }

      
       
  ?>
</body>
</html>

