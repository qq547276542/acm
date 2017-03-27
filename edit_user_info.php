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
    <div class="text-info">修改信息</div></div>
      <div class="panel-body">
        <form  action="edit_user_info_check.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
          <label for="pre_password">当前密码<nobr class="text-danger">&nbsp*</nobr></label>
          <input type="password" class="form-control" id="pre_password" >
          </div>
          
          <div class="form-group">
            <label for="update_email" class="control-label">Email<nobr class="text-danger">&nbsp*</nobr></label>
            <input  class="form-control" id="email" value="Email">
          </div>
          <div class="form-group">
            <label for="name" class="control-label">真实姓名</label>
            <input  class="form-control" id="name" value="王尼玛">
          </div>
          <div class="form-group">
            <label for="gender" class="control-label">性别</label>
            <select class="form-control" id="gender" >
              <option value="男">男</option>
              <option value="女">女</option>
            </select> 
          </div>
          <div class="form-group">
            <label for="Tshirtsize" class="control-label">T恤尺码</label>
            <select class="form-control" id="Tshirtsize" >
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
            <input  class="form-control" id="major" value="数据科学">
          </div>
          <div class="form-group">
            <label for="tel" class="control-label">联系电话</label>
            <input  class="form-control" id="tel" value="13964264552">
          </div>
          <div class="form-group">
            <label for="blog" class="control-label">blog</label>
            <input  class="form-control" id="blog" value="http://blog.csdn.net/qq547276542">
          </div>
          <button type="submit" class="btn btn-default">确认修改</button>
        </form>
     </div>
   </div>

 </div>
</div>
</body>

</html>           
<script type="text/javascript">
   //设置select标签缺省值
   document.getElementById("gender")[1].selected=true;
   document.getElementById("Tshirtsize")[2].selected=true;  
</script>
