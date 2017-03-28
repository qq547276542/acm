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
  $username=$usertype=$email=$score=$teamname="";
  $lastdate=$name=$gender=$Tshirtsize=$major=$tel=$blog="";
  $sql = "SELECT username, usertype,email,score,teamname,lastdate,name,gender,Tshirtsize,major,tel,blog FROM person WHERE username='".$_COOKIE['login_user']."'";
  $conn->query("set names utf8");
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username=$row["username"];$usertype=$row["usertype"];$email=$row["email"];
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
    <div class="col-md-6 col-md-offset-3"> <div class="panel panel-default">
      <div class="panel-heading"><div class="text-info">个人信息 <a href="edit_user_info.php"><span class="glyphicon glyphicon-edit"></span>编辑</a></div></div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-8">
            <!-- usertype：教练 退役队员 正式队员 后备队员-->
            <div class="page-header">
              <h1><a href="#"><?php echo $username ?></a>&nbsp<small><?php echo $usertype ?></small></h1>
            </div>
            <!-- 做题积分 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-stats"></span>&nbsp<nobr>做题积分: </nobr> <nobr  class="text-info" > <?php echo $score ?> </nobr> </p>
            <!-- 队伍 --> 
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-tasks"></span>&nbsp<nobr>队伍: </nobr> <nobr  class="text-info" > <?php echo $teamname ?> </nobr></p>
            <!-- 真实姓名 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-user"></span>&nbsp<nobr>真实姓名: </nobr> <nobr  class="text-info" > <?php echo $name ?> </nobr></p>
            <!-- 电子邮箱 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-envelope"></span>&nbsp<nobr>email: </nobr> <nobr  class="text-info" > <?php echo $email ?> </nobr></p>
            <!-- 性别 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-record"></span>&nbsp<nobr>性别: </nobr> <nobr  class="text-info" > <?php echo $gender ?> </nobr></p>
            <!-- T恤尺码 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-dashboard"></span>&nbsp<nobr>T恤尺码: </nobr> <nobr  class="text-info" > <?php echo $Tshirtsize ?> </nobr></p>
            <!-- 专业 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-book"></span>&nbsp<nobr>专业: </nobr> <nobr  class="text-info" ><?php echo $major ?> </nobr></p>
            <!-- 手机号码 -->
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-earphone"></span>&nbsp<nobr>联系电话: </nobr> <nobr  class="text-info" > <?php echo $tel ?> </nobr></p>
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-pencil"></span>&nbsp<nobr>blog: </nobr> <nobr  class="text-info" > <a href="http://blog.csdn.net/qq547276542"> <?php echo $blog ?> </a></nobr></p>
          </div>
          <div class="col-md-4">
           <img src="picture/photo.jpg" alt="您的照片" class="img-thumbnail"/>
         </div>
       </div>

     </div>
   </div>


 </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
   <div class="panel panel-default">
    <div class="panel-heading"><div class="text-info"> 做题情况 </div></div>
    <div class="panel-body">
     <table class="table table-bordered table-striped">
      <tr>
        <td width="10%"><h4>OJ</h4></td>
        <td width="10%"><h4>做题数</h4></td>
        <td width="15%"><h4>用户名</h4></td>
        <td width="60%"><h4>最近通过</h4></td>
        <td width="5%"><h4>#</h4></td>
      </tr>
      <tr>
        <td >poj</td>
        <td >123</td>
        <td >eason</td>
        <td ><a href="#">1011</a> <a href="#">1021</a> <a href="#">2021</a></td>
        <td ><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
      </tr>
    </table>
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加oj</button>
  </div>
</div>
</div>
</div>
</body>

</html>           
