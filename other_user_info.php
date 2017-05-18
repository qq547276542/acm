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
$sql = "SELECT username, usertype,email,score,teamname,lastdate,name,gender,Tshirtsize,major,tel,blog,avatar FROM person WHERE username='".$_GET['username']."'";
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

}

$ojname=$ojusername=$recent=$sloved=$problemurl=$rating=null;
$sql = "SELECT ojname,ojusername,recent,sloved,problemurl,rating FROM clawer WHERE username='".$_GET['username']."'";
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

$conn->close();
?>
<div class="row"> 
    <div class="col-md-6 col-md-offset-3"> <div class="panel panel-default">
      <div class="panel-heading"><div class="text-info">个人信息 </div></div>
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
        <div class="panel-heading"><div class="text-info"> 做题情况（每10分钟刷新） </div></div>
        <div class="panel-body">
        <div id="line_graph" ></div>
        <div  >&nbsp</div>
           <table class="table table-bordered table-striped">
              <tr>
                <td width="12%"><h4>OJ</h4></td>
                <td width="14%"><h4>帐号</h4></td>
                <td width="12%"><h4>rating</h4></td>
                <td width="12%"><h4>通过数</h4></td>
                <td width="60%"><h4>近期比赛/做题列表</h4></td>
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
                if($ojname[$i]=='codeforces'||$ojname[$i]=='bestcoder'){
                     echo "&nbsp&nbsp&nbsp<a href='".$problemurl[$i].$recent[$i][$j+1]."''>".$recent[$i][$j]."</a> ";
                     $j++;   //第奇数个元素为比赛名，偶数个元素为比赛的url编号
                }else{
                     echo "&nbsp&nbsp&nbsp<a href='".$problemurl[$i].$recent[$i][$j]."''>".$recent[$i][$j]."</a> ";
                 }
                if($ojname[$i]=='codeforces'||$ojname[$i]=='bestcoder'){
                   echo "<br/>";
                }
            }
            echo "  </td >";
            echo "</tr>";
        }
        ?>

    </table>
   
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

$(document).ready(function() {
   var title = {
      text: '近期刷题曲线'   
   };
   var subtitle = {
      text: 'Source: python crawler'
   };
   var xAxis = {
      categories: ['2017/5/1','2017/5/2','2017/5/3','2017/5/4','2017/5/5','2017/5/6','2017/5/7','2017/5/8','2017/5/9','2017/5/10','2017/5/11','2017/5/12','2017/5/13','2017/5/14']
   };
   var yAxis = {
      title: {
         text: ''
      },
      plotLines: [{
         value: 0,
         width: 1,
         color: '#808080'
      }]
   };   

   var tooltip = {
      valueSuffix: '分'
   }

   var legend = {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
   };

   var series =  [
      {
         name: '做题积分',
         data: [{name: '做题情况：  poj:50题 hdu:80题 codeforces20场 codeforces100场 ',y: 1900},{name: '做题情况：\npoj:50题\nhdu:80题\ncodeforces500\n',y: 1950},{name: '做题情况：\npoj:50题\nhdu:80题\ncodeforces500\n',y: 2000},{name: '做题情况：\npoj:50题\nhdu:80题\ncodeforces500\n',y: 2100},{name: '做题情况：\npoj:50题\nhdu:80题\ncodeforces500\n',y: 2200}]
      }
   ];

   var credits = {
      enabled: 'false'
   }

   var chart= {
      borderWidth: 0,
      defaultSeriesType: 'line'
   }

   var json = {};

   json.title = title;
   json.subtitle = subtitle;
   json.xAxis = xAxis;
   json.yAxis = yAxis;
   json.tooltip = tooltip;
   json.legend = legend;
   json.series = series;
   json.credits = credits;
   json.chart = chart;

   $('#line_graph').highcharts(json);
});
</script>  
