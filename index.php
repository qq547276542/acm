<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include 'headfile.php';?>
<body>
  <?php include 'nav.php';?>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7"> 
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="page-header">
           <h1>Hello World ! <small>Join us, challenge yourself</small></h1>
         </div>
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol>

          <!--添加项来修改主页展示照片-->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="picture/IMG_2653.JPG" alt="aaa">
              <div class="carousel-caption">
                省赛
              </div>
            </div>
            <div class="item">
              <img src="picture/IMG_2649.JPG" alt="bbb">
              <div class="carousel-caption">
                颁奖
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!--主页文本在此输入-->
        <div  id="introduce">
          <h3>什么是ACM?</h3>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspACM国际大学生程序设计竞赛（英文全称：ACM International Collegiate Programming Contest（简称ACM-ICPC或ICPC））是由美国计算机协会（ACM）主办的，一项旨在展示大学生创新能力、团队精神和在压力下编写程序、分析和解决问题能力的年度竞赛。经过近40年的发展，ACM国际大学生程序设计竞赛已经发展成为全球最具影响力的大学生程序设计竞赛。赛事目前由IBM公司赞助。
          <h3>简要规则</h3>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspACM-ICPC以团队的形式代表各学校参赛，每队由至多3名队员组成。每位队员必须是在校学生，有一定的年龄限制，并且每年最多可以参加2站区域选拔赛。<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp比赛期间，每队使用1台电脑需要在5个小时内使用C、C++、Pascal或Java中的一种编写程序解决7到13个问题。程序完成之后提交裁判运行，运行的结果会判定为正确或错误两种并及时通知参赛队。而且有趣的是每队在正确完成一题后，组织者将在其位置上升起一只代表该题颜色的气球，每道题目第一支解决掉它的队还会额外获得一个“FIRST PROBLEM SOLVED”的气球。<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp最后的获胜者为正确解答题目最多且总用时最少的队伍。每道试题用时将从竞赛开始到试题解答被判定为正确为止，其间每一次提交运行结果被判错误的话将被加罚20分钟时间，未正确解答的试题不记时。<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp与其它计算机程序竞赛（例如国际信息学奥林匹克，IOI）相比，ACM-ICPC的特点在于其题量大，每队需要在5小时内完成7道或以上的题目。另外，一支队伍3名队员却只有1台电脑，使得时间显得更为紧张。因此除了扎实的专业水平，良好的团队协作和心理素质同样是获胜的关键。
          <h3>评分标准</h3>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp竞赛进行5个小时，一般有7道或以上试题，由同队的三名选手使用同一台计算机协作完成。当解决了一道试题之后，将其提交给评委，由评委判断其是否正确。若提交的程序运行不正确，则该程序将被退回给参赛队，参赛队可以进行修改后再一次提交该问题。程序判定结果有如下7种：<br><br>
          1、Accepted. ——通过！(AC)<br><br>
          2、Wrong Answer.——答案错。(WA)<br><br>
          3、RunTime Error.——程序运行出错，意外终止等。(RTE)<br><br>
          4、Time Limit Exceeded. ——超时。程序没在规定时间内出答案。(TLE)<br><br>
          5、Presentation Error. ——格式错。程序没按规定的格式输出答案。(PE)<br><br>
          6、Memory Limit Exceeded. ——超内存。程序没在规定空间内出答案。(MLE)<br><br>
          7、Compile Error. ——编译错。程序编译不过。(CE)<br><br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp竞赛结束后，参赛各队以解出问题的多少进行排名，若解出问题数相同，按照总用时的长短排名。总用时为每个解决了的问题所用时间之和。一个解决了的问题所用的时间是竞赛开始到提交被接受的时间加上该问题的罚时（每次提交通不过，罚时20分钟）。没有解决的问题不记时。例如：A、B两队都正确完成两道题目，其中A队提交这两题的时间分别是比赛开始后1:00和2:45，B队为1:20和2:00，但B队有一题提交了2次。这样A队的总用时为1:00+2:45=3:45而B队为1:20+2:00+0:20=3:40，所以B队以总用时少而获胜。美国英语为竞赛的工作语言。竞赛的所有书面材料(包括试题)将用美国英语写出，区域竞赛中可以使用其它语言。总决赛可以使用的程序设计语言包括pascal，c，c++及java，也可以使用其它语言。具体的操作系统及语言版本各年有所不同。
          <h3>赛事意义</h3>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp竞赛规定每支参赛队伍至多由三名在校大学生组成，他们需要在规定的五个小时内解决八个或更多的复杂实际编程问题。每队使用一台电脑，参赛者争分夺秒，与其他参赛队伍拼比逻辑、策略和心理素质。<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp团队成员将在多名专家裁判的严格督察下通力合作，对问题进行难度分级、推断出要求、设计测试平台并构建软件系统，最终成功地解决问题。对于一名精通计算机科学的学生而言，有些问题只是精确度的问题；而有些则需要学生了解并掌握高级算法；还有一些问题是普通学生无法解决的，不过对于那些最优秀的学生而言，这一切都不在话下。<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp竞赛的评判过程十分严格。我们分发给学生的是问题陈述，而不是要求须知。他们会收到一个测试数据实例，但无法获得裁判的测试数据和接受标准方面的信息。若每次提交的解决方案出现错误，就会受到加时惩罚。毕竟，在处理顶级计算问题时，谁也不想浪费客户的时间。在最短的累计时间内，提交次数最少、解决问题最多的队伍就是最后的胜利者。<br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp在IBM开展的众多学术活动中，赞助ACM-ICPC赛事占有十分重要的位置。此举旨在促进开放源代码编程技巧的发展，培养更具竞争力的IT工作人员，从而推动全球创新和经济增长。
        </div>
      </div>
    </div>
    
  </div>
  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-4 col-md-offset-4"><h4>系统公告</h4></div>
        </div>
      </div>
      <!--系统公告在此输入-->
      <div class="panel-body">
        大家好好刷题好好刷题 ...<br/>
        大家好好刷题好好刷题 ...<br/>
        大家好好刷题好好刷题 ...<br/>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
       <div class="row">
         <div class="col-md-4 col-md-offset-4"><h4>TOP 10</h4></div>
       </div>
     </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <tr>
          <td>#</td>
          <td>队员</td>
          <td>积分</td>
        </tr>
        <tr>
          <td>1</td>
          <td>aaa</td>
          <td>2000</td>
        </tr>
        <tr>
          <td>2</td>
          <td>bbb</td>
          <td>1999</td>
        </tr>
        <tr>
          <td>2</td>
          <td>bbb</td>
          <td>1999</td>
        </tr>
        <tr>
          <td>3</td>
          <td>dsa</td>
          <td>1888</td>
        </tr>
        <tr>
          <td>4</td>
          <td>fewf</td>
          <td>1759</td>
        </tr>
        <tr>
          <td>5</td>
          <td>rbevbr</td>
          <td>1650</td>
        </tr>
        <tr>
          <td>6</td>
          <td>gtjy</td>
          <td>1590</td>
        </tr>
        <tr>
          <td>7</td>
          <td>gegew</td>
          <td>1520</td>
        </tr>
        <tr>
          <td>8</td>
          <td>wwqw</td>
          <td>1500</td>
        </tr>
        <tr>
          <td>9</td>
          <td>vdsaw</td>
          <td>1450</td>
        </tr>
        <tr>
          <td>10</td>
          <td>bexx</td>
          <td>1300</td>
        </tr>
      </table>

    </div>
  </div>
</div>
<div class="col-md-1"></div>
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
  $(document).ready(function(){ 
    if(getCookie("login_user")==""){
      
    }else{
      setCookie("login_user",getCookie("login_user"));
    }

  });
</script>