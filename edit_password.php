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
  
  ?>
  <div class="row"> 
    <div class="col-md-6 col-md-offset-3"> 
     <div class="panel panel-default">
       <div class="panel-heading">
        <div class="text-info">修改密码</div></div>
        <div class="panel-body">
         <!--表单-->
         <form role="form" id="edit_password_form" action="form_check/edit_password_form.php" method="post">
          
        <div class="form-group">
          <label for="old_password">当前密码<nobr class="text-danger">&nbsp*</nobr></label>
          <input type="password" class="form-control" id="old_password" placeholder="old_password" name="old_password">
        </div>
         <div class="form-group">
          <label for="new_password">新密码<nobr class="text-danger">&nbsp*</nobr></label>
          <input type="password" class="form-control" id="new_password" placeholder="new_password" name="new_password">
        </div>
        <div class="form-group">
          <label for="confirm_new_password">确认密码<nobr class="text-danger">&nbsp*</nobr></label>
          <input type="password" class="form-control" id="confirm_new_password" placeholder="confirm_new_password" name="confirm_new_password">
        </div>
        
        
       <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3"><button type="submit" class="btn btn-primary btn-block">确认修改</button></div>
      </form>
      <!--表单  over-->
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
      setCookie("login_user",getCookie("login_user"));
    }

   //设置select标签缺省值
   document.getElementById("gender").value=<?php echo "'".$gender."'"?>;
   document.getElementById("Tshirtsize").value=<?php echo "'".$Tshirtsize."'"?>; 
 });

  
   $('#edit_password_form').bootstrapValidator({
//        live: 'disabled',
message: 'This value is not valid',
feedbackIcons: {
  valid: 'glyphicon glyphicon-ok',
  invalid: 'glyphicon glyphicon-remove',
  validating: 'glyphicon glyphicon-refresh'
},
fields: {
  old_password: {
    validators: {
      notEmpty: {
        message: '密码不能为空!'
      },
      stringLength: {
        min: 6,
        max: 30,
        message: '密码长度必须在6~30之间!'
      }
    }
  },
  new_password: {
    validators: {
      notEmpty: {
        message: '密码不能为空!'
      },
      stringLength: {
        min: 6,
        max: 30,
        message: '密码长度必须在6~30之间!'
      },
      identical: {
        field: 'confirm_new_password',
        message: '两次输入密码不同!'
      }
    }
  },
  confirm_new_password: {
    validators: {
      notEmpty: {
        message: '密码确认不能为空!'
      },
      identical: {
        field: 'new_password',
        message: '两次输入密码不同!'
      }
    }
  }
  
}
});

    // Validate the form manually
    $('#validateBtn').click(function() {
      $('#sign_up_form').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
      $('#sign_up_form').data('bootstrapValidator').resetForm(true);
    });

</script>
