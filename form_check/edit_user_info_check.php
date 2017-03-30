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
     /////////检查密码是否错误
     $sql = "SELECT password
     FROM person
     WHERE username='".$_COOKIE['login_user']."'";
     $result= $conn->query($sql);
     if ($result->num_rows > 0){
         // 输出每行数据
         while($row = $result->fetch_assoc()) { //while只会执行一次
          if($row["password"]==$password){
            setcookie("update_info", "", time()+3600,'/');  //设置是否成功更新用户信息

            ///update  用户信息///////////////////////////
            $sql="UPDATE person SET ";
            $sql=$sql."email='".$_POST["email"];
            $sql=$sql."', name='".$_POST["name"];
            $sql=$sql."', gender='".$_POST["gender"];
            $sql=$sql."', Tshirtsize='".$_POST["Tshirtsize"];
            $sql=$sql."', major='".$_POST["major"];
            $sql=$sql."', tel='".$_POST["tel"];
            $sql=$sql."', blog='".$_POST["blog"];
            $sql=$sql."' WHERE username='".$_COOKIE['login_user']."'";
            $conn->query("set names utf8");
            $conn->query($sql);

            //update 用户头像/////////////////////////////////
            // 允许上传的图片后缀
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["avatar"]["name"]);
            $extension = end($temp);     // 获取文件后缀名
            if ((($_FILES["avatar"]["type"] == "image/gif")
              || ($_FILES["avatar"]["type"] == "image/jpeg")
              || ($_FILES["avatar"]["type"] == "image/jpg")
              || ($_FILES["avatar"]["type"] == "image/pjpeg")
              || ($_FILES["avatar"]["type"] == "image/x-png")
              || ($_FILES["avatar"]["type"] == "image/png"))
              && in_array($extension, $allowedExts)){
              if ($_FILES["avatar"]["error"] > 0){
                echo "错误：: " . $_FILES["avatar"]["error"] . "<br>";
              }
              else{
                echo "上传文件名: " . $_FILES["avatar"]["name"] . "<br>";
                echo "文件类型: " . $_FILES["avatar"]["type"] . "<br>";
                echo "文件大小: " . ($_FILES["avatar"]["size"] / 1024) . " kB<br>";
                echo "文件临时存储的位置: " . $_FILES["avatar"]["tmp_name"] . "<br>";
             // 判断当期目录下的 upload 目录是否存在该文件
             // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
             // 修改用户头像文件名
                $avatar_filename=$_COOKIE['login_user']."_avatar".".".$extension;
                if (file_exists("../picture/" .$avatar_filename)){
                  move_uploaded_file($_FILES["avatar"]["tmp_name"], "../picture/" .$avatar_filename);
                  chmod("../picture/" .$avatar_filename,0777);
                  echo $avatar_filename. " 文件已经存在。,覆盖原文件 ";
                }
                else{
             // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                  move_uploaded_file($_FILES["avatar"]["tmp_name"], "../picture/" .$avatar_filename);
                  chmod("../picture/" .$avatar_filename,0777);
                  echo "文件存储在: " . "../picture/" . $avatar_filename;
                }
                $sql="UPDATE person SET ";
                $sql=$sql."avatar='".$avatar_filename;
                $sql=$sql."' WHERE username='".$_COOKIE['login_user']."'";
                $conn->query("set names utf8");
                $conn->query($sql);
              }
            }
            else{
              echo "非法的文件格式";
            }
          ///update 图片 over
            header("Location:../user_info.php");  
          }else{
            echo "<script>alert('密码输入有误，更新失败,请重新输入密码！'); history.go(-1);</script>";
          }
        }
      } else {
        echo "用户名不存在";
      }  

      echo  $_FILES['avatar']['upload'];;
      $conn->close();

      ?>
    </body>
    </html>

