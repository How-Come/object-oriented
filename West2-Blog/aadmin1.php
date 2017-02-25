<?php 


require_once 'SignService.class.php';
require_once 'BlogService.class.php';
require_once 'SqlHelper.class.php';
require_once 'FenyePage.class.php';
require_once 'UserService.class.php';


	   session_start();
	   if (isset($_SESSION['id'])){
	       if (isset($_SESSION['power'])){
            $userService = new UserService();
            $username = $userService->GetNameById($_SESSION['id']);
	           //echo "欢迎".$_SESSION['id']."管理员登录";
	           $_SESSION['username'] = $username;
	       }
	   }else{
	       header("Location:Auser.php");
	   }
	   


	   
	   
	   //取得所有标签和类别
	   $signService = new SignService();
	   $blogService = new BlogService();
	   $sign = $signService->SignView();
	   $signType = $signService->SignTypeView();
	   //var_dump($sign);
	   //var_dump($signType);
	   
	   

	   //初始化分页
	   $fenyePage = new FenyePage();
// 	   if (!isset($_SESSION['pageNow'])){
// 	       $_SESSION['pageNow'] = 1;
// 	   }
	   if (isset($_REQUEST['pageNow'])){
	       $fenyePage->pageNow = $_REQUEST['pageNow'];
// 	       $_SESSION['pageNow'] = $_REQUEST['pageNow'];
	   }else {
	       $fenyePage->pageNow = 1;
	   }
	   $fenyePage->gotoUrl = 'Aadmin.php';
	   
	   
	   
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