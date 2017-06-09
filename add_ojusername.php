<!-- Modal -->
<div class="modal fade" id="addOjusernameModal" tabindex="-1" role="dialog" aria-labelledby="addOjusernameModalLabel" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="addOjusernameModalLabel">添加您的oj帐号</h4>
      </div>
      <div class="modal-body" id="login_form">
       <form role="form" id="login_form" action="form_check/add_ojusername_check.php" method="post">               
         <div class="form-group">
          <label for="choose_oj">选择一个oj</label>
          <select  class="form-control" id="choose_oj" value='upc' name='choose_oj'>
             <option>upc</option>
             <option>vj</option>
             <option>poj</option>
             <option>hdu</option>
             <option>codeforces</option>
             <option>bestcoder</option>
          </select>
        </div>
        <div class="form-group">
          <label for="input_ojusername">输入您的oj帐号</label>
          <input type="text" class="form-control" id="input_ojusername" placeholder="input your oj_id" name='ojusername'>
        </div>
       <div class="modal-footer">
        <button type="submit" class="btn btn-primary">添加</button>
      </div>
    </form>
  </div> 
</div>
</div>
</div>


