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

	   
	   
	   //取得所有标签和类别
	   $signService = new SignService();
	   $sign = $signService->SignView();
	   $signType = $signService->SignTypeView();
	   //var_dump($sign);
	   //var_dump($signType);
	   
	   
?>