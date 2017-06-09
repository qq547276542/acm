
<?php include '../config/database.php';
include '../tool/tool.php'
?>
<?php 
      header('content-type:text/html;charset=utf-8;');//统一字符集，防止乱码
      error_reporting(0);//屏蔽错误信息
      $conn = get_connect();
      if ($conn->connect_error){
       die("connect failed: " . $conn->connect_error);
     }
     $sql = "INSERT INTO clawer (username, ojname, ojusername)
     VALUES ('".$_COOKIE['login_user']."','".$_POST['choose_oj']."','".$_POST['ojusername']."')";
     if ($conn->query($sql) === TRUE) {
      echo "<script>location.href='../user_info.php';</script>";
    } else {
      echo "<script>location.href='../user_info.php';</script>";
    }
    
    $conn->close();
?>