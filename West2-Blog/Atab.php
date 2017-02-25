<?php include ("atab1.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Management tag</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/browse.css" />
    <link rel="stylesheet" href="css/management.css" />

</head>

<style>
    input[type=text] {
        width: 180px;
        color: #000;
        box-sizing: border-box;
        border: 1px solid #000;
        font-size: 14px;
        background-color: transparent;
        padding: 8px 10px 8px 10px;
    }
</style>



<body>

    <div class="b-header">
        <div class="public-container">
            <div class="logo">
                <a href="Aadmin.php">H & C</a>
                <div class="wel">|&nbsp&nbsp&nbsp&nbspWelcome to Us !
                </div>
            </div>
            <div class="sort">
           
            	<form action="signProcess.php" method="post">
            			<input type="hidden" name="flag" value="signAdd">
            			<input type="hidden" name="type" value="2">
                       	<input type="text" name="name" />&nbsp&nbsp&nbsp
                       	<button class="btn" border:none;type="button">Add</button>
<!--                         <input type="submit" name="submit" value="添加标签"/>&nbsp; -->
                </form>
                <br><br>
                <ul>
                	<?php 
                    	foreach ($sign as $key=>$val){
                            echo "<li>".$val['name']."</li>
                                  <p><a href='signProcess.php?flag=signDel&&name=".$val['name']."&&type=".$val['type']."'>删除</a></p>";
                    	}
                	?>
<!--                     <li>Useful</li> -->
<!--                     <p>删除</p> -->
<!--                     <li>Innovative</li> -->
<!--                     <p>删除</p> -->
<!--                     <li>Retro</li> -->
<!--                     <p>删除</p> -->
<!--                     <li>Hot</li> -->
<!--                     <p>删除</p> -->
                </ul>
                <br>
                
<!--                 <input type="text" name="new-tag" />&nbsp&nbsp&nbsp<button class="btn" border:none;type="button">Add</button> -->
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
