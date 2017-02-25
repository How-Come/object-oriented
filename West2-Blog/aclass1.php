<?php 
 	   session_start();
// 	   if (isset($_SESSION['id'])){
// 	       if (isset($_SESSION['power'])){
// 	           echo "欢迎".$_SESSION['id']."管理员登录";
// 	       }
// 	   }else{
// 	       header("Location:index.php");
// 	   }
	   if (!isset($_SESSION['power'])){
	       header("Location:Auser.php");
	   }
	   
	   
	   
	   require_once 'SignService.class.php';
	   require_once 'BlogService.class.php';
	   require_once 'SqlHelper.class.php';
	   require_once 'FenyePage.class.php';

	   
	   
	   //取得所有标签和类别
	   $signService = new SignService();
	   $blogService = new BlogService();
	   $signType = $signService->SignTypeView();
	   //var_dump($signType);
	   ?>