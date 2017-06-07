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
	      $username = $_COOKIE['login_user'];
	      $old_password = test_input($_POST["old_password"]);
        $new_password = test_input($_POST["new_password"]);
      }
      $conn = get_connect();
      if ($conn->connect_error)
      {
       die("connect failed: " . $conn->connect_error);
     }
     /////////检查密码是否错误
     $sql = "SELECT password
     FROM person
     WHERE username='".$_COOKIE['login_user']."'";

     $result= $conn->query($sql);
     if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) { //while只会执行一次
          if($row["password"]==$old_password){
              $sql="UPDATE person SET ";
              $sql=$sql."password='".$new_password;
              $sql=$sql."' WHERE username='".$_COOKIE['login_user']."'";
              $conn->query("set names utf8");
              $conn->query($sql);
              echo "<script>alert('密码修改成功！');location.href='../index.php'</script>";
          }else{
              echo "<script>alert('当前密码错误,请重新输入！'); history.go(-1);</script>";
          }
        }
     }
     $conn->close();
      
       
  ?>
</body>
</html>

