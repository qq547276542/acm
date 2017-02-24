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
	    $username=$password=$email="";
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	      $username = test_input($_POST["username"]);
	      $email = test_input($_POST["email"]);
	      $password = test_input($_POST["password"]);
      }
      $con = mysql_connect("localhost","upcacm","upcacm");
      if (!$con)
      {
         die('Could not connect: ' . mysql_error());
      }
      
      mysql_select_db("acmdb", $con);  
      $sql="INSERT INTO person (username, password, email,usertype)
      VALUES
      ('$username','$password','$email','student')";
      
      if (!mysql_query($sql,$con))
        {
       // echo "<script type='text/javascript'> alert('该用户名已经存在！'); </script>";
        echo "<script>history.back();alert('该用户名已经存在！');</script>";
       // header("Location:../sign_up.php"); 
       // die('Error: ' . mysql_error());
        mysql_close($con);
        }
        else{
        header("Location:../index.php"); 
         mysql_close($con);
      }
     
      //注册成功，跳转
       
  ?>
</body>
</html>

