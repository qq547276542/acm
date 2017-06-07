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
  $username=$score=$teamname=null;
  $sql = "SELECT username,score,teamname,name FROM person ORDER BY score DESC";
  $conn->query("set names utf8");
  $result = $conn->query($sql);
  $len=0;
  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username[$len]=$row["username"];$score[$len]=$row["score"];$teamname[$len]=$row["teamname"];
      $name[$len]=$row["name"];
      if($name[$len]=="")
        $name[$len]="---";
      $len++;
    }
  } else {

  }
  $conn->close();
  ?>
  <div class="row"> 
   <div class="col-md-8 col-md-offset-2">

     <div class="panel panel-default">
       <div class="panel-body">
         <div class="page-header">
           <h1>Ranking List &nbsp&nbsp<a href="#" data-toggle="modal" data-target="#explainScoreModal"><small>tips：如何计算积分?</small></a> </h1>
         </div>

         <table class="table table-hover table-bordered ">
           <tr class="info">
             <td width="10%"><p style="font-size: 18px;"  >rank</p></td>
             <td width="30%"><p style="font-size: 18px;"  >用户名</p></td>
             <td width="30%"><p style="font-size: 18px;"  >真实姓名</p></td>
             <td width="15%"><p style="font-size: 18px;"  >积分</p></td>
             <td width="15%"><p style="font-size: 18px;"  >查看详细信息</p> </td>
           </tr>
           <form role="form" id="other_user_info_form"  method="get">
             <?php 
             for($i=0;$i<$len;$i++){
               echo "<tr>";
               echo "<td> <p style='font-size: 15px;' >".strval($i+1)."</p></td>";
               echo "<td> <p style='font-size: 15px;' >".strval($username[$i])."</p></td>";
               echo "<td> <p style='font-size: 15px;' >".strval($name[$i])."</p></td>";
               echo "<td> <p style='font-size: 15px;' >".strval($score[$i])."</p></td>";
               echo "<td><a type='submit'  class='btn btn-success btn-sm btn-block' href='other_user_info.php?username=".strval($username[$i])."'>See More..</a></td>";
               echo "</tr>";
             }   
             ?>
           </form>

         </table>
       </div>
     </div>

   </div> 
 </div>

 <div class="modal fade" id="explainScoreModal" tabindex="-1" role="dialog" aria-labelledby="explainScoreModalLabel" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="explainScoreModalLabel">积分计算方式</h4>
      </div>
      <div class="modal-body" id="login_form">
      <p>
       <strong>积分由cf和bc的rating以及所有oj的刷题数决定,具体计算方法如下:</strong><br/><br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp用户积分 = cf的rating + cf的rating超过1400的部分×1 + cf的rating超过1600的部分×3 + cf的rating超过1800的部分×5<br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp用户积分 += bc的rating + bc的rating超过1600的部分×1 + bc的rating超过1800的部分×4<br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp用户积分 += poj过题数×2 + hdu过题数×1.5 + cf正式赛过题数×6 + bc正式赛过题数×6 + upc过题数×1 + vj过题数×6<br/><br/><br/>

       
       <strong>为了防止用户积分差距过大，通过以下方法减小数据方差：</strong><br/><br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp计算所有用户的积分平均值<br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp用户积分 = 平均值 + (用户积分-平均值)×0.7<br/><br/><br/>

       <strong>Tips:</strong><br/><br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1. 若用户在同一oj添加了多个账号，只会统计过题数最多的那个账号<br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2. 统计的是题目ac数而不是submit数，对于cf和bc只统计正式赛ac数<br/>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp3. 刷题积分更新有延迟，由服务器每天定期更新<br/><br/><br/>
       
       <strong>oj缩写对应网址：</strong><br/><br/>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsppoj:&nbsp&nbsp&nbsp&nbsp<a href="http://poj.org">http://poj.org</a><br/>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsphdu:&nbsp&nbsp&nbsp&nbsp<a href="http://acm.hdu.edu.cn">http://acm.hdu.edu.cn</a><br/>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspcf:&nbsp&nbsp&nbsp&nbsp<a href="http://codeforces.com/">http://codeforces.com/</a><br/>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspbc:&nbsp&nbsp&nbsp&nbsp<a href="http://bestcoder.hdu.edu.cn/">http://bestcoder.hdu.edu.cn/</a><br/>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspupc:&nbsp&nbsp&nbsp&nbsp<a href="http://code.upc.edu.cn/">http://code.upc.edu.cn/</a><br/>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspvj:&nbsp&nbsp&nbsp&nbsp<a href="https://vjudge.net">https://vjudge.net</a><br/>
       
      </p>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp我知道了&nbsp</button>
       </div>
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
  
</script>