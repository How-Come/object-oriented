<?php include ("abrowse1.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>browse</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/browse.css" />

</head>


<body>
    <div class="b-header">
        <div class="public-container">
            <div class="logo">
            	<?php if (isset($_SESSION['power'])){echo "<a href='Aadmin.php'>H & C</a>";}else {echo "<a href='Auser.php'>H & C</a>";}?>
<!--                 <a href="">H & C</a> -->
                <div class="wel">|&nbsp&nbsp&nbsp&nbspWelcome to Us !
                </div>
            </div>
            <div style="background: url(./B/<?php echo $arr['pic'];?>)" class="picture"></div>
            <div class="text">
                <h3><?php echo $arr['title']; ?></h3>
                <div class="information"><?php echo "&nbsp;by&nbsp;".$arr['author']."&nbsp;on&nbsp;".$arr['uptime']?></div>
                <div class="classify"><?php foreach ($arr['signType'] as $key=>$val){ echo $val."&nbsp;"; } ?></div>
                <div class="classify"><?php foreach ($arr['sign'] as $key=>$val){ echo $val."&nbsp;"; } ?></div>
                <div class="content">
                	<?php echo $arr['content']; ?>
                </div>
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
