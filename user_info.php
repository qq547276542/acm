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
$power_list=null; $power_num=0;
$sql = "SELECT username, usertype,email,score,teamname,lastdate,name,gender,Tshirtsize,major,tel,blog,avatar,power_num,power_ds,power_math,power_dp,power_graph,power_cal,power_mn FROM person WHERE username='".$_COOKIE['login_user']."'";
$conn->query("set names utf8");
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username=$row["username"];$usertype=$row["usertype"];$email=$row["email"];
      $score=$row["score"];$teamname=$row["teamname"];$lastdate=$row["lastdate"];
      $name=$row["name"];$gender=$row["gender"];$Tshirtsize=$row["Tshirtsize"];
      $major=$row["major"];$tel=$row["tel"];$blog=$row["blog"];$avatar=$row["avatar"];
      $power_num=$row["power_num"];$power_list[0]=$row["power_ds"];$power_list[1]=$row["power_math"];$power_list[2]=$row["power_dp"];
      $power_list[3]=$row["power_graph"];$power_list[4]=$row["power_cal"];$power_list[5]=$row["power_mn"];
  }
} else {

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
} 

//获取用户积分曲线
$date=$score_list=null;
$sql = "SELECT date,score FROM score_record WHERE username='".$_COOKIE['login_user']."' ORDER BY date " ;
$conn->query("set names utf8");
$result = $conn->query($sql);
$score_len=0;
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      $date[$score_len]=$row["date"];$score_list[$score_len]=$row["score"];
      $score_len=$score_len+1;
    }
}

//获取全平台平均曲线
$aver_date=$aver_score_list=null;
$sql = "SELECT date,score FROM score_record  ORDER BY date" ;
$conn->query("set names utf8");
$result = $conn->query($sql);
$aver_score_len=0;
if($result->num_rows > 0){
    $sum_score=0;$cur_date='---';$cur_num=0;
    while($row = $result->fetch_assoc()) {
      if($cur_date!=$row["date"]){
        if($cur_num>0){
          $aver_score_list[$aver_score_len]=intval($sum_score/$cur_num);
          $aver_date[$aver_score_len]=$cur_date;
          $aver_score_len++;
        }
        $sum_score=0;
        $cur_num=0;
        $cur_date=$row["date"];
      }
      $sum_score=$sum_score+$row["score"];
      $cur_num++;
    }
    if($cur_num>0)
          $aver_score_list[$aver_score_len]=intval($sum_score/$cur_num);
    $aver_date[$aver_score_len]=$cur_date;
    $aver_score_len++;
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
        <div class="panel-heading"><div class="text-info"> 做题情况（每天刷新） </div></div>
        <div class="panel-body">
        <div id="line_graph" ></div>
        <div id="bar_graph"></div>
        <div  >&nbsp</div>
           <table class="table table-bordered table-striped">
              <tr>
                <td width="10%"><h4>OJ</h4></td>
                <td width="10%"><h4>帐号</h4></td>
                <td width="10%"><h4>rating</h4></td>
                <td width="10%"><h4>通过数</h4></td>
                <td width="60%"><h4>近期比赛/做题列表</h4></td>
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

function delete_item(i){  //ajax 传递参数
    if (window.XMLHttpRequest){
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else{
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            location.href='user_info.php';
        }
    }
    xmlhttp.open("GET","form_check/delete_ojusername_check.php?index="+i,true);
    xmlhttp.send();
}

$(document).ready(function() {
     var title = {
      text: '近期刷题曲线'   
    };
    var subtitle = {
      text: 'Source: python crawler'
    };
    var xAxis = {
      categories: [<?php 
     $end=$aver_score_len;
     $begin=$end-12;
     if($begin<0)
      $begin=0;
     for($i=$begin;$i<$end;$i++){
        echo "'".$aver_date[$i]."'";
        if($i+1!=$end)
          echo ",";
     }
   ?>]
    };
    var yAxis = {
      title: {
       text: 'score'
     },
     plotLines: [{
       value: 0,
       width: 1,
       color: '#808080'
     }]
   };   

   var tooltip = {
    valueSuffix: ' 分'
  }

  var legend = {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle',
    borderWidth: 0
  };

  var series =  [
  {
   name: <?php echo "'".$_COOKIE['login_user']."'" ?>,
   data: [<?php 
     $end=$aver_score_len;
     $begin=$end-12;
     if($begin<0)
      $begin=0;
     $cur_s=0;
     $point=0;
     while($date[$point]!=$aver_date[$begin]){
      $point++;
      if($point>=$aver_score_len)
        break;
     }
     if($point==$aver_score_len)
      $point=0;
     for($i=$begin;$i<$end;$i++){
        if($date[$point]==$aver_date[$i]){
            $cur_s=$score_list[$point];
            $point++;
        }
        echo $cur_s;
        if($i+1!=$end)
          echo ",";
     }
   ?>],
   color: '#058DC7'
 }
 ,
 {
   name: '实验室平均值',
   data: [<?php 
     $end=$aver_score_len;
     $begin=$end-12;
     if($begin<0)
      $begin=0;
     for($i=$begin;$i<$end;$i++){
        echo $aver_score_list[$i];
        if($i+1!=$end)
          echo ",";
     }
   ?>],
   color: '#50B432'
 }
 ];

 var credits = {
  enabled: 'false',
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

    $(document).ready(function() {  
     var chart = {
      type: 'bar'
    };
    var title = {
      text: '能力分析'   
    };
    var subtitle = {
      text: 'Source: DIY'  
    };
    var xAxis = {
      categories: ['数据结构', '数学', '动态规划', '图论', '计算几何', '模拟'],
      title: {
       text: null
     }
   };
   var yAxis = {
    min: 0,
    title: {
     text: ' ',
     align: 'high'
   }, 
   labels: {
     overflow: 'justify'
   }
 };
 var tooltip = {
  valueSuffix: ' '
};
var plotOptions = {
  bar: {
   dataLabels: {
    enabled: true
  }
}
};
var legend = {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'top',
  x: -40,
  y: 100,
  floating: true,
  borderWidth: 1,
  backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
  shadow: true
};
var credits = {
  enabled: false
};

var series= [{
 name: '能力值',
 data: [10, 2, 5, 2, 8,1]
}
];     

var json = {};   
json.chart = chart; 
json.title = title;   
json.subtitle = subtitle; 
json.tooltip = tooltip;
json.xAxis = xAxis;
json.yAxis = yAxis;  
json.series = series;
json.plotOptions = plotOptions;
json.legend = legend;
json.credits = credits;
$('#bar_graph').highcharts(json);

});
</script>  
