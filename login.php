<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="loginModalLabel"><span class="glyphicon glyphicon glyphicon-user"></span>用户登录</h4>
      </div>
      <div class="modal-body" id="login_form">
       <form role="form" id="login_form" action="form_check/login_check.php" method="post">               
         <div class="form-group">
          <label for="username_login">用户名</label>
          <input type="text" class="form-control" id="username_login" placeholder="Username" name='username'>
        </div>
        <div class="form-group">
         <label for="password_login">密码</label>
         <input type="password" class="form-control" id="password_login" placeholder="Password" name='password'>
       </div>
       <div class="row"> 
         <div class="col-md-8"></div>
         <div class="col-md-4">
           <p style="float: left">&nbsp&nbsp忘记密码?&nbsp&nbsp</p> <a href="#">点此找回</a>
         </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp关闭&nbsp</button>
        <button type="submit" class="btn btn-primary">&nbsp登录&nbsp</button>
      </div>
    </form>
  </div> 
</div>
</div>
</div>


