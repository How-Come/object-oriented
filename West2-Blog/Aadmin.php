<?php include ("aadmin1.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>H & C's Blog (logined)</title>
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
        color: #000;
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
        <div class="header-logo"><a href="Aadmin.php?signType= ">&nbsp&nbspH & C</a></div>
        <div class="header-nav1">
            <div class="slogan">欢迎您! <?php echo $_SESSION['username'];?></div>
            <div class="article"><a href="Apublish.php">发表文章</a></div>

            <div class="article"><a href="Aclass.php">管理分类</a></div>
            <div class="article"><a href="Atab.php">管理标签</a></div>

            <div class="article"><a href="Auser.php">注销</a></div>





        </div>

        <div class="header-welcome">H & C,专属于你的潮流blog</div>
        <form class="header-search" action="Aadmin.php" method="post">
        	<input type="hidden" name="signType" value="search">
            <input results="s" type="text" name="name" placeholder="搜索你喜欢的" />
            <button class="btn" border:none;type="button" name="submit">🔍</button>
        </form>
        <div class="header-hot">
            <a href='Aadmin.php'>热门搜索：明星icon</a>
        </div>

    </div>
    <div class="index-banner">—————————————————————————&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp大家正在关注&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp —————————————————————————</div>
	
	<div class="public-container">
    <div class="index-classify">
    <?php 
        $i = 1;
        foreach ($signType as $key=>$val){
		echo "<div class='type".$i."'>
                   <a href='Aadmin.php?signType=".$val['name']."'>".$val['name']."</a>
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
                            <div class='select'>
                                <a href='Amodify.php?blog_id=".$val['id']."'>修改</a>
                                <a href='blogProcess.php?flag=blogDel&&id=".$val['id']."'>删除</a>
                            </div>
                        </div>
                    </div>";
            
            } 
        ?>
<!--             <div class="box-item"> -->
<!--                 <div class="img" /></div> -->
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
<!--                 <div class="select"> -->
<!--                     <a href="modify.html">修改</a> -->
<!--                     <a href="">删除</a> -->
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
<!--             <div class="select"> -->
<!--                 <a href="modify.html">修改</a> -->
<!--                 <a href="">删除</a> -->
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
<!--         <div class="select"> -->
<!--             <a href="modify.html">修改</a> -->
<!--             <a href="">删除</a> -->
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
<!--         <div class="select"> -->
<!--             <a href="modify.html">修改</a> -->
<!--             <a href="">删除</a> -->
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
<!--         <div class="select"> -->
<!--             <a href="modify.html">修改</a> -->
<!--             <a href="">删除</a> -->
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
<!--         <div class="select"> -->
<!--             <a href="modify.html">修改</a> -->
<!--             <a href="">删除</a> -->
<!--         </div> -->
<!--     </div> -->



    </div>

<div class="paging">
	<?php echo $blogList->navigate; ?>
    </div>
    </div>
	
    </div>
	
    <div class="index-pannel">
        <div class="final">H & C 首页</div>
        <div class="blank4"></div>
        <div class="final">联系与合作</div>
    </div>
    <div class="public-footer">Copyright [2017.2.15] by [HowCome & Clever]</div>




</body>

</html>
