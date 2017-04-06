
<nav class="navbar navbar-default" role="navigation" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
       
      </button>
      <a class="navbar-brand" href="#">中国石油大学ACM集训管理平台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">主页</a></li>
        <li ><a href="#">查看组队信息</a></li>
        <li ><a href="#">Oj传送门</a></li>
        <li ><a href="#">队员管理*</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#" id="login_button" data-toggle="modal" data-target="#loginModal"></a></li>
          <li><a href="sign_up.php" id="sign_up_button"></a></li>
          <li><a href="user_info.php" id="user_info_button"></a></li>
          <li><a href="logout.php" id="logout_button"></a></li>
        <li><p>&nbsp&nbsp</p></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>


<?php include 'login.php';?>

<script type="text/javascript">
  $(document).ready(function(){ //动态更新导航栏的按钮状态
   var login_user="<?php echo $_COOKIE['login_user']; ?>";
   if(login_user!=""){
      document.getElementById("login_button").innerHTML="";
      document.getElementById("sign_up_button").innerHTML="";
      document.getElementById("user_info_button").innerHTML="个人信息";
      document.getElementById("logout_button").innerHTML="退出登录";
      document.getElementById("user_info_button").innerHTML="<span class='glyphicon glyphicon-user' aria-hidden='true'></span>&nbsp"+login_user;
      $("#user_info_button").show();
      $("#logout_button").show();
      $("#login_button").hide();
      $("#sign_up_button").hide();
    }else{
      document.getElementById("login_button").innerHTML="登陆";
      document.getElementById("sign_up_button").innerHTML="注册";
      document.getElementById("user_info_button").innerHTML="";
      document.getElementById("logout_button").innerHTML="";
      $("#user_info_button").hide();
      $("#logout_button").hide();
      $("#login_button").show();
      $("#sign_up_button").show();
    }
  });
  
</script>
