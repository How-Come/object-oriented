<?php include ("apublish1.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Publish</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/publish.css" />
</head>

<style>
    input[type="text"],
    #area {
        box-sizing: border-box;
        font-size: 22px;
        border-radius: 3px;
        border: 2px solid #c8cccf;
        color: #4F4F4F;
        -web-kit-appearance: none;
        -moz-appearance: none;
        display: block;
        outline: 0;
        padding: 0 1em;
        text-decoration: none;
    
    }

    input[type="text"]:focus {
        border: 2px solid #00E5EE;
    }

    input[type="checkbox"] {
        margin-top: 38px;
        margin-left: 20px;
    }

    input[type="submit"] {
        margin-top: 55px;
        margin-left: 280px;
        font-size: 22px;
        border-radius: 3px;
        border: 2px solid #c8cccf;
        color: #FF0000;
        display: block;
        outline: 0;
        padding: 0 1em;
    }

    #area {
        margin-top: 20px;
        margin-left: 50px;
    }
</style>

<body>
    <div onerror="" class="p-header">
        <div class="public-container">
            <div class="logo">
                <a href="Aadmin.php">H & C</a>
                <div class="wel">|&nbsp&nbsp&nbsp&nbspWelcome to Us !
                </div>
            </div>
            <div class="blank">
            </div>

            <div class="main">
                <form action="blogProcess.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="flag" value="blogWrite">
                    <div class="title">Title:</div>
                    <input class="title1" type="text" name="title">
                    <br><br><br><br>
                    <div class="content">Picture:</div>
                    <input class="pic" type="file" name="pic">
                    <br><br><br><br>
                    <div class="content1">Content:</div>
                    <textarea id="area" name="content" cols="55" rows="16"></textarea>
                    <div class="author">Author:</div>
                    <input class="a-input"type="text" name="author"/><br><br><br><br>
                    <div class="label1">Select Type:</div>
                    <?php foreach ($signType as $key=>$val){ 
                            echo "<label><input type='checkbox' name='signType[]' value='".$val['name']."'>".$val['name']."</label>";
                    }?>
                    <br><br><br>
                    <div class="label">Select Label:</div>
                    <?php foreach ($sign as $key=>$val){ 
			                echo "<label><input type='checkbox' name='sign[]' value='".$val['name']."'>".$val['name']."</label>";
                    }?>
<!--                     <label><input name="label1" type="checkbox" value="" />Fashion single </label> -->
<!--                     <label><input name="label2" type="checkbox" value="" />Icon </label> -->
<!--                     <label><input name="label3" type="checkbox" value="" />Art appreciation </label> -->
<!--                     <label><input name="label4" type="checkbox" value="" />News </label> -->
                    <br>
        			<input type="submit" name="submit" value="Publish"/>
                

                </form>

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
