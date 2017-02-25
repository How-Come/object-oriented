<?php

require_once 'SignService.class.php';
require_once 'BlogService.class.php';
require_once 'SqlHelper.class.php';
require_once 'FenyePage.class.php';
require_once 'UserService.class.php';


        session_start();
        if (isset($_SESSION['id'])){
            $userService = new UserService();
            $username = $userService->GetNameById($_SESSION['id']);
            $_SESSION['username'] = $username;
            //echo "欢迎".$username."用户登录";
        }else{
            $_SESSION['username'] = "游客";
            //echo "<p>欢迎游客登录</p>";
        }

	   
	   //取得所有标签和类别
	   $signService = new SignService();
	   $blogService = new BlogService();
	   $sign = $signService->SignView();
	   $signType = $signService->SignTypeView();
	   //var_dump($sign);
	   //var_dump($signType);
// 	   foreach ($signType as $key=>$val){
//     	   $blogId = $signService->GetBlogIdByName($val['name']);
//     	   var_dump($blogId);
// 	   }
	   
	   
	   
	   //初始化分页
	   $fenyePage = new FenyePage();
/* 	   if (!isset($_SESSION['pageNow'])){
	       $_SESSION['pageNow'] = 1;
	   } */
	   if (isset($_REQUEST['pageNow'])){
	       $fenyePage->pageNow = $_REQUEST['pageNow'];
// 	       $_SESSION['pageNow'] = $_REQUEST['pageNow'];
	   }else {
	       $fenyePage->pageNow = 1;
// 	       $fenyePage->pageNow = $_SESSION['pageNow'];
	   }
       $fenyePage->gotoUrl = 'Auser.php';
	   
	   
	   
	   //取得文章列表
	   if (!isset($_SESSION['signType'])){
	       $_SESSION['signType'] = '';
	   }
	   if (isset($_REQUEST['signType'])){
	       $_SESSION['signType'] = $_REQUEST['signType'];
	   }
	   $getType = $_SESSION['signType'];
	   if (isset($_REQUEST['name'])){
	       $name = $_REQUEST['name'];
	   }else {
	       $name = '';
	   }
	   $blogList = $blogService->BlogList($getType, $fenyePage, $name);
	   //var_dump($blogList);
	   
	?>