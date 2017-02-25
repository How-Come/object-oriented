<?php
    if (isset($_REQUEST['blog_id'])){
        require_once 'BlogService.class.php';
        $blog_id = $_REQUEST['blog_id'];
        $blogService = new BlogService();
        $arr = $blogService->BlogView($blog_id);
        //var_dump($arr);
        //echo $arr['signType']['0'];
    }else {
        header("Location:Auser.php?errno=10");
    }
?>