<?php include ("auser1.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>H & C's Blog</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- 登录、注册弹出css -->
    <link href="http://www.js-css.cn/jscode/jscode.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="static/css/ui2.css?2013032917">
</head>
<style>
    input[type=text] {
        width: 40%;
        color: #fff;
        box-sizing: border-box;
        border: 1px solid #fff;
        font-size: 14px;
        background-color: transparent;
        padding: 8px 10px 8px 10px;
    }
    

</style>

<body>

    <!-- 登录、注册弹出js -->
    <script src="static/js/landing-min.js?2013032917"></script>

    <div class="public-header">
        <div class="header-logo"><a href="Auser.php?signType= ">&nbsp&nbspH & C</a></div>
        <div class="header-nav">
            <div class="slogan">欢迎<?php echo $_SESSION['username'];?>来到H & C !</div>
            <div class="btn">
                <a role="button" style=" color:#fff; background:#EE6363; display:block; width:50px; height:35px; font-size:14px; font-weight:lighter; letter-spacing:2px;  line-height:35px; text-align:center;" data-category="UserAccount" data-action="login" data-toggle="modal"
                    href="#signup-modal">注册</a>
            </div>

            <div class="btn">
                <a role="button" style="color:#fff; background: transparent; display:block; width:50px; height:35px;    border: 1px solid #fff;font-size:14px; font-weight:lighter; letter-spacing:2px;  line-height:35px; text-align:center;" data-category="UserAccount"
                    data-action="login" data-toggle="modal" href="#login-modal">登录</a>
            </div>



        </div>

        <div class="header-welcome">H & C,专属于你的潮流blog</div>
        <form class="header-search" action="Auser.php" method="post">
			<input type="hidden" name="signType" value="search">
            <input results="s" type="text" name="name" placeholder="搜索你喜欢的" />
            <button class="btn" border:none;type="button" name="submit">🔍</button>
        </form>
        <div class="header-hot">
            <a href='Auser.php'>热门搜索：明星icon</a>
        </div>

    </div>
    <div class="index-banner">—————————————————————————&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp大家正在关注&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp —————————————————————————</div>
	<div class="public-container">
    <div class="index-classify">
    <?php 
        $i = 1;
        foreach ($signType as $key=>$val){
		echo "<div class='type".$i."'>
                   <a href='Auser.php?signType=".$val['name']."'>".$val['name']."</a>
              </div>";
		$i++;
		if ($i>=5){
		    $i = $i-3;
		}
	}
	?>
	
	  </div>
<!--         <div class="type1"> -->
<!--             <p>Fashion single</p> -->
<!--         </div> -->

<!--         <div class="type2"> -->
<!--             <p>Icon</p> -->
<!--         </div> -->

<!--         <div class="type3"> -->
<!--             <p>Art appreciation</p> -->
<!--         </div> -->

<!--         <div class="type4"> -->
<!--             <p>News</p> -->
<!--         </div> -->
     
    </div>
    <div class="index-banner2">————————&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp为您推荐&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ————————</div>

    <div class="index-list">
        <div class="public-container">
        <?php foreach ($blogList->res_array as $key=>$val){
            echo "<div class='box-item'>
                        <div style='width:350px;height:220px;background:url(./B/".$val['pic'].")'></div>
                        <div class='content'>
                            <h3>".substr($val['title'],0,20)."</h3>
                            <p>".substr($val['content'],0,200)."</p>
                            <a href='Abrowse.php?blog_id=".$val['id']."'>Read More...</a>
                            <br><br>
                            <span>".$val['uptime']." &nbsp;by&nbsp; ".$val['author']."</span><br>
                            <div class='logo'>
                                <p>";
                                    foreach ($val['signType'] as $key1=>$val1){ echo $val1."&nbsp;"; }
                                    echo "
                                </p>
                            </div>
                            <br>
                            <div class='tag'>
                                <p>";
                                    foreach ($val['sign'] as $key1=>$val1){ echo $val1."&nbsp;"; }
                                    echo "
                                </p>
                            </div>
                        </div>
                    </div>";
            
            } 
        ?>
        
<!--             <div class="box-item"> -->
<!--                 <div class="img"></div> -->
<!--             <div class="content"> -->
<!--                 <h3>She Said Yes!</h3> -->
<!--                 <p>Nunc eu velit metus. Donec in massa libero. Donec bibendum orci a lorem scelerisque luctus. Aliquam et ante quis erat semper pretium. Pellentesque vehicula.</p> -->
<!--                 <a href="browse.html">Read More...</a> -->
<!--                 <br><br> -->
<!--                 <span>MAY 21, 2014 BY VAFPRESS</span><br> -->
<!--                 <div class="logo"> -->
<!--                     <p>News</p> -->
<!--                 </div> -->
<!--                 <br> -->
<!--                 <div class="tag"> -->
<!--                     <p>Useful</p> -->
<!--                 </div> -->
<!--             </div> -->

<!--         </div> -->

<!--         <div class="box-item"> -->
<!--             <div class="img" /></div> -->
<!--         <div class="content"> -->
<!--             <h3>She Said Yes!</h3> -->
<!--             <p>Nunc eu velit metus. Donec in massa libero. Donec bibendum orci a lorem scelerisque luctus. Aliquam et ante quis erat semper pretium. Pellentesque vehicula.</p> -->
<!--             <a href="browse.html">Read More...</a> -->
<!--             <br><br> -->
<!--             <span>MAY 21, 2014 BY VAFPRESS</span><br> -->
<!--             <div class="logo"> -->
<!--                 <p>News</p> -->
<!--             </div> -->
<!--             <br> -->
<!--             <div class="tag"> -->
<!--                 <p>Useful</p> -->
<!--             </div> -->
<!--         </div> -->

<!--     </div> -->



<!--     <div class="box-item"> -->
<!--         <div class="img" /></div> -->
<!--     <div class="content"> -->
<!--         <h3>She Said Yes!</h3> -->
<!--         <p>Nunc eu velit metus. Donec in massa libero. Donec bibendum orci a lorem scelerisque luctus. Aliquam et ante quis erat semper pretium. Pellentesque vehicula.</p> -->
<!--         <a href="browse.html">Read More...</a> -->
<!--         <br><br> -->
<!--         <span>MAY 21, 2014 BY VAFPRESS</span><br> -->
<!--         <div class="logo"> -->
<!--             <p>News</p> -->
<!--         </div> -->
<!--         <br> -->
<!--         <div class="tag"> -->
<!--             <p>Useful</p> -->
<!--         </div> -->
<!--     </div> -->



<!--     </div> -->

<!--     <div class="box-item"> -->
<!--         <div class="img" /></div> -->
<!--     <div class="content"> -->
<!--         <h3>She Said Yes!</h3> -->
<!--         <p>Nunc eu velit metus. Donec in massa libero. Donec bibendum orci a lorem scelerisque luctus. Aliquam et ante quis erat semper pretium. Pellentesque vehicula.</p> -->
<!--         <a href="browse.html">Read More...</a> -->
<!--         <br><br> -->
<!--         <span>MAY 21, 2014 BY VAFPRESS</span><br> -->
<!--         <div class="logo"> -->
<!--             <p>News</p> -->
<!--         </div> -->
<!--         <br> -->
<!--         <div class="tag"> -->
<!--             <p>Useful</p> -->
<!--         </div> -->
<!--     </div> -->



<!--     </div> -->


<!--     <div class="box-item"> -->
<!--         <div class="img" /></div> -->
<!--     <div class="content"> -->
<!--         <h3>She Said Yes!</h3> -->
<!--         <p>Nunc eu velit metus. Donec in massa libero. Donec bibendum orci a lorem scelerisque luctus. Aliquam et ante quis erat semper pretium. Pellentesque vehicula.</p> -->
<!--         <a href="browse.html">Read More...</a> -->
<!--         <br><br> -->
<!--         <span>MAY 21, 2014 BY VAFPRESS</span><br> -->
<!--         <div class="logo"> -->
<!--             <p>News</p> -->
<!--         </div> -->
<!--         <br> -->
<!--         <div class="tag"> -->
<!--             <p>Useful</p> -->
<!--         </div> -->
<!--     </div> -->

<!--     </div> -->



<!--     <div class="box-item"> -->
<!--         <div class="img" /></div> -->
<!--     <div class="content"> -->
<!--         <h3>She Said Yes!</h3> -->
<!--         <p>Nunc eu velit metus. Donec in massa libero. Donec bibendum orci a lorem scelerisque luctus. Aliquam et ante quis erat semper pretium. Pellentesque vehicula.</p> -->
<!--         <a href="browse.html">Read More...</a> -->
<!--         <br><br> -->
<!--         <span>MAY 21, 2014 BY VAFPRESS</span><br> -->
<!--         <div class="logo"> -->
<!--             <p>News</p> -->
<!--         </div> -->
<!--         <br> -->
<!--         <div class="tag"> -->
<!--             <p>Useful</p> -->
<!--         </div> -->
<!--     </div> -->



<!--     </div> -->


    </div>
    <div class="paging">
    <span>
	<?php echo $blogList->navigate; ?></span>
    </div>
    </div>

    <div class="index-pannel">
        <div class="final">H & C 首页</div>
        <div class="blank4"></div>
        <div class="final">联系与合作</div>
    </div>
    <div class="public-footer">Copyright [2017.2.15] by [HowCome & Clever]</div>

    <div class="modal in" id="login-modal" }> <a class="close" data-dismiss="modal">×</a>
        <h1>登录</h1>

        <form class="login-form clearfix" action="userProcess.php" method="post">
            <div class="form-arrow"></div>
            <input type="text" name="name" placeholder="用户名：">
            <input name="password" type="password" name="password" placeholder="密码：">
            <input type="submit" name="submit" class="button-blue login" value="登录">
            <input type="hidden" name="flag" value="login">
            <div class="clearfix"></div>
            <label class="remember">
     <input name="remember" type="checkbox" checked/>
     下次自动登录 </label>
            <a class="forgot">忘记密码？</a>
        </form>
    </div>

    <div class="modal in" id="signup-modal"> <a class="close" data-dismiss="modal">×</a>
        <h1>注册</h1>
<!--     	<form action="userProcess.php" method="post"> -->
<!--     			<input type="hidden" name="flag" value="reg"> -->
<!--                	户　名：<input type="text" name="name"/><br> -->
<!--                	密　码：<input type="password" name="password"/><br> -->
<!--                	邮&nbsp;件：<input type="text" name="email"/><br> -->
<!--                	<input type="reset" value="重新填写"/>&nbsp; -->
<!--                 <input type="submit" name="submit" value="用户注册"/>&nbsp; -->
<!--                 <a href="userLogin.php">前往登录</a> -->
<!--         </form> -->

        <form class="signup-form clearfix" action="userProcess.php" method="post">
            <p class="error"></p>
            <input type="hidden" name="flag" value="reg">
            <input name="email" type="text" placeholder="邮箱：">
            <input name="name" type="text" placeholder="用户名：">
            <input name="password" type="password" placeholder="密码：">
            <!-- 
            <input name="password1" type="password" placeholder="确认密码：">
             -->
<!--             <input type="hidden" name="title" value=""> -->
<!--             <input type="hidden" name="url" value=""> -->
            <div class="clearfix"></div>
            <input type="submit" name="submit" value="用户注册"/>
<!--             <input type="button" name="submit" class="button-blue reg" value="注册"> -->
        </form>
    </div>

</body>

</html>
