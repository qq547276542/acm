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
  $sql = "SELECT username,score,teamname FROM person ORDER BY score DESC";
  $conn->query("set names utf8");
  $result = $conn->query($sql);
  $len=0;
  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username[$len]=$row["username"];$score[$len]=$row["score"];$teamname[$len]=$row["teamname"];
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
           <h1>Ranking List <small> </small></h1>
         </div>

         <table class="table table-hover table-bordered ">
           <tr class="info">
             <td width="10%"><p style="font-size: 18px;"  >rank</p></td>
             <td width="30%"><p style="font-size: 18px;"  >用户名</p></td>
             <td width="30%"><p style="font-size: 18px;"  >队伍</p></td>
             <td width="15%"><p style="font-size: 18px;"  >积分</p></td>
             <td width="15%"><p style="font-size: 18px;"  >查看详细信息</p> </td>
           </tr>
           <form role="form" id="other_user_info_form"  method="get">
             <?php 
             for($i=0;$i<$len;$i++){
               echo "<tr>";
               echo "<td> <p style='font-size: 15px;' >".strval($i+1)."</p></td>";
               echo "<td> <p style='font-size: 15px;' >".strval($username[$i])."</p></td>";
               echo "<td> <p style='font-size: 15px;' >".strval($teamname[$i])."</p></td>";
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