<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include 'headfile.php';?>
<?php include 'config/database.php';
include 'tool/tool.php'
?>
<body>
  <?php include 'nav.php';?>
  <div class="row"> 
   <div class="col-md-6 col-md-offset-3">
     <div class="panel panel-default">
       <div class="panel-body">
           <div class="container" id="index-intro">
            <h1 class="display-3">Online Judge Protal</h1>
            <div class="row">
                <div class="col-md-8 push-md-4">
                    <p style="line-height:22px;">
                        以下是通往各个oj的刷题链接<br/>
                        请大家放心食用 (= . =)<br/>
                    </p>
                    <div id="ojs" style="line-height:22px;">
                        <div class="col-md-3">
                        <span>
                            <a href="http://poj.org/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/poj.ico"/>POJ
                            </a>
                        </span>
                        </div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://acm.zju.edu.cn/onlinejudge/" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/ZOJ_favicon.ico"/>ZOJ
                            </a>
                        </span>
                        </div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://livearchive.onlinejudge.org/index.php" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/UVA_favicon.ico"/>UVALive
                            </a>
                        </span>
                        </div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://acm.sgu.ru/" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/SGU_favicon.ico"/>SGU
                            </a>
                        </span>
                        </div>
                        <div class="col-md-12">&nbsp</div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://acm.timus.ru/" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/URAL_favicon.ico"/>URAL
                            </a>
                        </span>
                        </div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://acm.hust.edu.cn/" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/HUST_icon.jpg"/>HUST
                            </a>
                        </span>
                        </div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://www.spoj.com/" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/SPOJ_favicon.png"/>SPOJ
                            </a>
                        </span>
                        </div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://acm.hdu.edu.cn" target="_blank">
                                <img class="img-rounded" style="width: 20px;" src="picture/ico/HDU_icon.png"/>HDU
                            </a>
                        </span>
                        </div>
                        <div class="col-md-12">&nbsp</div>
                        <div class="col-md-3">
                        <span>
                            <a href="http://www.lydsy.com/JudgeOnline/" target="_blank">
                              <img class="img-rounded" style="width: 20px;" src="picture/ico/HYSBZ_icon.png"/>HYSBZ
                          </a>
                      </span>
                      </div>
                      <div class="col-md-3">
                      <span>
                        <a href="http://uva.onlinejudge.org/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/UVA_favicon.ico"/>UVA
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://codeforces.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/CodeForces_favicon.png"/>CodeForces
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://www.codah.club/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/icon-icpc-small.gif"/>Z-Trening
                        </a>
                    </span>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://judge.u-aizu.ac.jp/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/Aizu_favicon.ico"/>Aizu
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://lightoj.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/icon-icpc-small.gif"/>LightOJ
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acm.uestc.edu.cn/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/UESTC_favicon.png"/>UESTC
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="https://ac.2333.moe/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/NBUT_icon.jpg"/>NBUT
                        </a>
                    </span>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acm.fzu.edu.cn/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/FZU_favicon.gif"/>FZU
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acm.csu.edu.cn/OnlineJudge/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/CSU_favicon.ico"/>CSU
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://cstest.scu.edu.cn/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/SCU_favicon.ico"/>SCU
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acdream.info/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/ACdream_favicon.ico"/>ACdream
                        </a>
                    </span>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://www.codechef.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/codechef.ico"/>CodeChef
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://codeforces.com/gyms/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/CodeForces_favicon.png"/>CF::Gym
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://openjudge.cn/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/poj.ico"/>OpenJudge
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="https://open.kattis.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/Kattis_favicon.ico"/>Kattis
                        </a>
                    </span>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <div class="col-md-3">
                    <span>
                        <a href="https://hihocoder.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/hiho.jpg"/>HihoCoder
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acm.hit.edu.cn/hoj/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/HIT.png"/>HIT
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acm.hrbust.edu.cn/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/hrbust.ico"/>HRBUST
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="http://acm.mipt.ru/judge/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/eijudge.ico"/>EIJudge
                        </a>
                    </span>
                    </div>
                    <div class="col-md-12">&nbsp</div>
                    <div class="col-md-3">
                    <span>
                        <a href="https://atcoder.jp/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/atcoder.png"/>AtCoder
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="https://www.hackerrank.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/hackerrank.png"/>HackerRank
                        </a>
                    </span>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <a href="https://www.51nod.com/" target="_blank">
                            <img class="img-rounded" style="width: 20px;" src="picture/ico/51nod.ico"/>51Nod
                        </a>
                    </span>
                    </div>
                </div>
                <div style="line-height:20px;padding-top:5px;clear:both;">
                    <hr>
                    <div class="vj_nodes" style="padding: 5px;text-align: left; line-height:25px;">
                        目前爬虫功能尚未完善，能够获取刷题信息的oj如下:<br/>
                        <ul>
                            <li>
                                <span>poj</span>
                            </li>
                            <li>
                                <span>hdu</span>
                            </li>
                            <li>
                                <span>codeforces</span>
                            </li>
                            <li>
                                <span>bestcoder</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>


</body>
