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
  $lastdate=$name=$gender=$Tshirtsize=$major=$tel=$blog=$avatar;
  $sql = "SELECT username, usertype,email,score,teamname,lastdate,name,gender,Tshirtsize,major,tel,blog,avatar FROM person WHERE username='".$_COOKIE['login_user']."'";
  $conn->query("set names utf8");
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username=$row["username"];$usertype=$row["usertype"];$email=$row["email"];
      $score=$row["score"];$teamname=$row["teamname"];$lastdate=$row["lastdate"];
      $name=$row["name"];$gender=$row["gender"];$Tshirtsize=$row["Tshirtsize"];
      $major=$row["major"];$tel=$row["tel"];$blog=$row["blog"];$avatar=$row["avatar"];
    }
  } else {
    echo $_COOKIE['login_user'];
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
            <p style="font-size: 18px;"><span class="glyphicon glyphicon-pencil"></span>&nbsp<nobr>blog: </nobr> <nobr  class="text-info" > <a href=<?php echo "'".$blog."'" ?>> <?php echo $blog ?> </a></nobr></p>
          </div>
          <div class="col-md-4">
           <img src=<?php echo "'"."picture/".$avatar."'"; ?> alt="您的照片" class="img-thumbnail"/>
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
        <td width="10%"><h4>帐号</h4></td>
        <td width="10%"><h4>rating</h4></td>
        <td width="10%"><h4>通过数</h4></td>
        <td width="60%"><h4>做题列表</h4></td>
        <td width="5%"><h4>#</h4></td>
      </tr>
      <?php 
       //$i:用户的第i个oj   $j:用户第i个oj解决的第j个题目
       for($i=0;$i<$len;$i++){
         if($rating[$i]==null)
           $rating[$i]="---";
         echo "<tr>";
         echo "  <td> ".$ojname[$i]."</td>";
         echo "  <td >".$ojusername[$i]."</td>";
         echo "  <td >".$rating[$i]."</td>";
         echo "  <td >".$sloved[$i]."</td>";
         echo "  <td >";
         for($j=0;$j<count($recent[$i]);$j++){
            echo "<a href='".$problemurl[$i].$recent[$i][$j]."''>".$recent[$i][$j]."</a> &nbsp";
         }
         echo "  </td >";
         echo "  <td ><button type='button' class='btn btn-danger btn-xs' onClick='delete_item(".$i.");'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></td>";
         echo "</tr>";
       }
      ?>

    </table>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addOjusernameModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添加oj帐号</button>
  </div>
</div>
</div>
</div>
<?php include 'add_ojusername.php' ?>  
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
  $(document).ready(function(){ 
    if(getCookie("login_user")==""){
      alert("您已长时间没有进行操作，请重新登陆！");
      window.location.assign("index.php");
    }else{
      setCookie("login_user",getCookie("login_user"));
    }

  });

  function delete_item(i){
    <?php 
        echo "alert(i)";
    ?>
  }

</script>  
