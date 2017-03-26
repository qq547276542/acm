<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include 'headfile.php';?>
<body>
  <?php include 'nav.php';?>

<div class="row"> 
  <div class="col-md-6 col-md-offset-3"> <div class="panel panel-default">
   <div class="panel-heading"><div class="text-info">修改信息</div></div>
      <div class="panel-body">
       <div class="col-md-10 col-md-offset-1">
        <form  action="edit_user_info_check.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
       </div>
     </div>
   </div>

 </div>
</div>
</body>

</html>           
