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
  $power_list=null; $power_num=0;
  $sql = "SELECT username, password,usertype,email,score,teamname,lastdate,name,gender,Tshirtsize,major,tel,blog,avatar,power_num,power_ds,power_math,power_dp,power_graph,power_cal,power_mn FROM person WHERE username='".$_COOKIE['login_user']."'";
  $conn->query("set names utf8");
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
      $username=$row["username"];$password=$row["password"];$usertype=$row["usertype"];$email=$row["email"];
      $score=$row["score"];$teamname=$row["teamname"];$lastdate=$row["lastdate"];
      $name=$row["name"];$gender=$row["gender"];$Tshirtsize=$row["Tshirtsize"];
      $major=$row["major"];$tel=$row["tel"];$blog=$row["blog"];
      $power_num=$row["power_num"];$power_list[0]=$row["power_ds"];$power_list[1]=$row["power_math"];$power_list[2]=$row["power_dp"];
      $power_list[3]=$row["power_graph"];$power_list[4]=$row["power_cal"];$power_list[5]=$row["power_mn"];
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
          <form  action="form_check/edit_user_info_check.php" id="edit_user_info_form" enctype="multipart/form-data" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="update_email" class="control-label">Email<nobr class="text-danger">&nbsp*</nobr></label>
              <input  class="form-control" id="email" name="email" value=<?php echo "'".$email."'"?>>
            </div>
            <div class="form-group">
              <label for="name" class="control-label">真实姓名</label>
              <input  class="form-control" id="name" name="name"  value=<?php echo "'".$name."'"?>>
            </div>
            <div class="form-group">
              <label for="avatar" class="control-label">上传头像 (只支持png/jpg/jpeg/gif格式)</label>
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
            <h4>分配能力值(单项取值0-9)</h4>
             <div class="panel panel-default">
             <div class="panel-body">
            <div class="form-group">
              <label for="blog" class="control-label">数据结构</label>
              <input class="form-control" id="power_ds" name="power_ds" value= <?php echo "'".$power_list[0]."'" ?> >
            </div>
            <div class="form-group">
              <label for="blog" class="control-label">数学</label>
              <input class="form-control" id="power_math" name="power_math" value= <?php echo "'".$power_list[1]."'" ?> >
            </div>
            <div class="form-group">
              <label for="blog" class="control-label">动态规划</label>
              <input class="form-control" id="power_dp" name="power_dp" value= <?php echo "'".$power_list[2]."'" ?> >
            </div>
            <div class="form-group">
              <label for="blog" class="control-label">图论</label>
              <input class="form-control" id="power_graph" name="power_graph" value= <?php echo "'".$power_list[3]."'" ?> >
            </div>
            <div class="form-group">
              <label for="blog" class="control-label">计算几何</label>
              <input class="form-control" id="power_cal" name="power_cal" value= <?php echo "'".$power_list[4]."'" ?> >
            </div>
            <div class="form-group">
              <label for="blog" class="control-label">模拟</label>
              <input class="form-control" id="power_mn" name="power_mn" value= <?php echo "'".$power_list[5]."'" ?> >
            </div>
            </div>
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
      setCookie("login_user",getCookie("login_user"));
    }

   //设置select标签缺省值
   document.getElementById("gender").value=<?php echo "'".$gender."'"?>;
   document.getElementById("Tshirtsize").value=<?php echo "'".$Tshirtsize."'"?>; 
 });

  
   $('#edit_user_info_form').bootstrapValidator({
//        live: 'disabled',
message: 'This value is not valid',
feedbackIcons: {
  valid: 'glyphicon glyphicon-ok',
  invalid: 'glyphicon glyphicon-remove',
  validating: 'glyphicon glyphicon-refresh'
},
fields: {
  
  email: {
    validators: {
      emailAddress: {
        message: '该email格式不合法!'
      },notEmpty: {
        message: '邮箱不能为空!'
      }
    }
  },
  power_ds: {
    validators: {
      regexp: {
        regexp: /^[0-9]+$/,
        message: '能力值只能是数字!'
      },
      stringLength: {
        min: 0,
        max: 1,
        message: '单项能力值不能超过9!'
      }
    }
  },
  power_math: {
    validators: {
      regexp: {
        regexp: /^[0-9]+$/,
        message: '能力值只能是数字!'
      },
      stringLength: {
        min: 0,
        max: 1,
        message: '单项能力值不能超过9!'
      }
    }
  },
  power_dp: {
    validators: {
      regexp: {
        regexp: /^[0-9]+$/,
        message: '能力值只能是数字!'
      },
      stringLength: {
        min: 0,
        max: 1,
        message: '单项能力值不能超过9!'
      }
    }
  },
  power_graph: {
    validators: {
      regexp: {
        regexp: /^[0-9]+$/,
        message: '能力值只能是数字!'
      },
      stringLength: {
        min: 0,
        max: 1,
        message: '单项能力值不能超过9!'
      }
    }
  },
  power_cal: {
    validators: {
      regexp: {
        regexp: /^[0-9]+$/,
        message: '能力值只能是数字!'
      },
      stringLength: {
        min: 0,
        max: 1,
        message: '单项能力值不能超过9!'
      }
    }
  },
  power_mn: {
    validators: {
      regexp: {
        regexp: /^[0-9]+$/,
        message: '能力值只能是数字!'
      },
      stringLength: {
        min: 0,
        max: 1,
        message: '单项能力值不能超过9!'
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
