<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include 'headfile.php';?>
<?php include 'config/database.php';
include 'tool/tool.php'
?>
<body>
  <?php include 'nav.php';?>
  <?php 
    // 创建连接
  $conn = get_connect();
// 检测连接
  if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
  }
  $username=$password=$usertype=$email=$score=$teamname="";
  $lastdate=$name=$gender=$Tshirtsize=$studyyear=$major=$tel=$blog="";
  $sql = "SELECT username, password,usertype,email,score,teamname,lastdate,name,gender,Tshirtsize,major,tel,blog FROM person WHERE username='".$_COOKIE['login_user']."'";
  $conn->query("set names utf8");
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username=$row["username"];$password=$row["password"];$usertype=$row["usertype"];$email=$row["email"];
      $score=$row["score"];$teamname=$row["teamname"];$lastdate=$row["lastdate"];
      $name=$row["name"];$gender=$row["gender"];$Tshirtsize=$row["Tshirtsize"];
      $major=$row["major"];$tel=$row["tel"];$blog=$row["blog"];
    }
  } else {
    echo $_COOKIE['login_user'];
  }
  $conn->close();
  ?>
  <div class="row"> 
    <div class="col-md-6 col-md-offset-3"> 
     <div class="panel panel-default">
       <div class="panel-heading">
        <div class="text-info">修改个人信息</div></div>
        <div class="panel-body">
          <form  action="form_check/edit_user_info_check.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="password">当前密码<nobr class="text-danger">&nbsp*</nobr></label>
              <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
              <label for="update_email" class="control-label">Email<nobr class="text-danger">&nbsp*</nobr></label>
              <input  class="form-control" id="email" name="email" value=<?php echo "'".$email."'"?>>
            </div>
            <div class="form-group">
              <label for="name" class="control-label">真实姓名</label>
              <input  class="form-control" id="name" name="name"  value=<?php echo "'".$name."'"?>>
            </div>
            <div class="form-group">
              <label for="avatar" class="control-label">上传头像</label>
              <input type="file" class="form-control" id="avatar" name="avatar" />
            </div>
            <div class="form-group">
              <label for="gender" class="control-label">性别</label>
              <select class="form-control" id="gender" name="gender">
                <option value="男">男</option>
                <option value="女">女</option>
              </select> 
            </div>
            <div class="form-group">
              <label for="Tshirtsize" class="control-label">T恤尺码</label>
              <select class="form-control" id="Tshirtsize" name="Tshirtsize">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
              </select> 
            </div>
            <div class="form-group">
              <label for="major" class="control-label">专业</label>
              <input  class="form-control" id="major" name="major" value=<?php echo "'".$major."'"?>>
            </div>
            <div class="form-group">
              <label for="tel" class="control-label">联系电话</label>
              <input  class="form-control" id="tel" name="tel" value=<?php echo "'".$tel."'"?>>
            </div>
            <div class="form-group">
              <label for="blog" class="control-label">blog</label>
              <input  class="form-control" id="blog" name="blog" value=<?php echo "'".$blog."'"?>>
            </div>
            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block">确认修改</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</body>

</html>           
<script type="text/javascript">
 function getCookie(cname){
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=ca.length-1; i>=0; i--) 
  {
    var c = ca[i].trim();
    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
  return "";
}
function setCookie(cname,cvalue){
  var d = new Date();
  d.setTime(d.getTime()+(60*60*1000));
  var expires = "expires="+d.toGMTString();
  document.cookie = cname + "=" + cvalue + "; " + expires+"; path=/";
}
  ////////////////////////////////////////////////////////////////////////
  
  $(document).ready(function(){ 
    if(getCookie("login_user")==""){
      alert("您已长时间没有进行操作，请重新登陆！");
      window.location.assign("index.php");
    }else{
    }
    if(getCookie("update_info")=="false"){
      setCookie("update_info","");   
      alert("密码输入有误，更新失败,请重新输入密码！");
    }else{
    }

   //设置select标签缺省值
   document.getElementById("gender")[1].selected=true;
   document.getElementById("Tshirtsize")[2].selected=true; 
 });

</script>
