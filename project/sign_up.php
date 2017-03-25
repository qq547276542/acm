<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include 'headfile.php';?>
<body>
  <?php include 'nav.php';?>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div>
        <h1>欢迎加入ACM俱乐部!</h1>
      </div>
      <div class="panel panel-default">
       <div class="panel-heading"><div class="text-info">新队员注册</div></div>
       <div class="panel-body">
         <!--表单-->
         <form role="form" id="sign_up_form" action="form_check/sign_up_check.php" method="post">
          <div class="form-group">
            <label for="username_sign_up">用户名</label>
            <input type="text" class="form-control" id="username_sign_up" placeholder="Username" name="username">
          </div>
          <div class="form-group">
           <label for="email_sign_up">电子邮箱</label>
           <input type="email" class="form-control" id="email_sign_up" placeholder="Enter email" name="email">
         </div>
         <div class="form-group">
          <label for="password_sign_up">密码</label>
          <input type="password" class="form-control" id="password_sign_up" placeholder="Password" name="password">
        </div>
        <div class="form-group">
          <label for="confirm_sign_up">确认密码</label>
          <input type="password" class="form-control" id="confirm_sign_up" placeholder="Confirm" name="confirmPassword">
        </div>
        <div class="row"> 
          <div class="col-md-9"></div>
          <div class="col-md-3">
           <p style="float: left">已有账号？</p> <a href="#" data-toggle="modal" data-target="#loginModal">点此登录</a>
         </div>
       </div>
       <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3"><button type="submit" class="btn btn-primary btn-block">注册</button></div>
      </form>
      <!--表单  over-->
    </div>
  </div> 
</div>
<div class="col-md-3"></div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('#sign_up_form').bootstrapValidator({
//        live: 'disabled',
message: 'This value is not valid',
feedbackIcons: {
  valid: 'glyphicon glyphicon-ok',
  invalid: 'glyphicon glyphicon-remove',
  validating: 'glyphicon glyphicon-refresh'
},
fields: {
  firstName: {
    validators: {
      notEmpty: {
        message: 'The first name is required and cannot be empty'
      }
    }
  },
  lastName: {
    validators: {
      notEmpty: {
        message: 'The last name is required and cannot be empty'
      }
    }
  },
  username: {
    message: '用户名无效',
    validators: {
      notEmpty: {
        message: '用户名不能为空!'
      },
      stringLength: {
        min: 6,
        max: 30,
        message: '用户名长度必须在6~30之间!'
      },
      regexp: {
        regexp: /^[a-zA-Z0-9_\.]+$/,
        message: '用户名只能由字母和数字组成!'
      },
      different: {
        field: 'password',
        message: '用户名不能和密码相同!'
      }
    }
  },
  email: {
    validators: {
      emailAddress: {
        message: '该email格式不合法!'
      },notEmpty: {
        message: '邮箱不能为空!'
      }
    }
  },
  password: {
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
        field: 'confirmPassword',
        message: '两次输入密码不同!'
      }
    }
  },
  confirmPassword: {
    validators: {
      notEmpty: {
        message: '密码确认不能为空!'
      },
      identical: {
        field: 'password',
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
  });

</script>
</html>