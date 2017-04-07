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

     $ojname=$ojusername=$recent=$sloved=$problemurl=$rating=null;
     $sql = "SELECT ojname,ojusername,recent,sloved,problemurl,rating FROM clawer WHERE username='".$_COOKIE['login_user']."'";
     $conn->query("set names utf8");
     $result = $conn->query($sql);
     $len=0;
     if ($result->num_rows > 0) {
    // 输出每行数据
      while($row = $result->fetch_assoc()) {
        $ojname[$len]=$row["ojname"];$ojusername[$len]=$row["ojusername"];
        $recent[$len]=$row["recent"];$sloved[$len]=$row["sloved"];$problemurl[$len]=$row["problemurl"];
        $rating[$len]=$row["rating"];
      $recent[$len]=explode(" ", $recent[$len]);   //分解成数组
      $len=$len+1;
    }
  } else {
  }
  $i=$_GET["index"];
  $sql = "DELETE FROM clawer WHERE username='".$_COOKIE['login_user']."' AND ojname='".$ojname[$i]."' AND ojusername='".$ojusername[$i]."'";
  $conn->query($sql);
  $conn->close();
  ?>
