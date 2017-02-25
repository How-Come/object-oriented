<?php

require_once 'SignService.class.php';
require_once 'BlogService.class.php';
require_once 'Blog_SignService.class.php';

//判断是否设置操作标志位
if (!empty($_REQUEST['flag'])){

    $flag = $_REQUEST['flag'];
    //如果标志位为signAdd,进行标签或类别插入
    if ($flag=="signAdd"){
        //判断标签名或类别名是否为空
        if ( isset($_POST['name']) ){
            //判断标签名或类别名是否只有空格
            if ( trim($_POST['name']) != ""){
                $name = strip_tags($_POST['name']);
                $type = $_POST['type'];
                $signService = new SignService();
                //判断是否已有该标签或类别
                if ($signService->SignCheck($name, $type)){
                    //没有该标签或类别，则进行标签或类别插入
                    if ( $signService->SignAdd($name, $type) ){
                        //echo "注册成功";
                        header("location:".$_SERVER['HTTP_REFERER']);
                        //header("Location:Aadmin.php?errno=0");
                    }else {
                        //echo "注册失败";
                        header("location:".$_SERVER['HTTP_REFERER']);
                        //header("Location:Aadmin.php?errno=4");
                    }
                }else {
                    //echo "该用户名已存在，请输入其它用户名";
                    header("location:".$_SERVER['HTTP_REFERER']);
                    //header("Location:Aadmin.php?errno=1");
                }
            }else {
                //echo "用户名或密码为空";
                header("location:".$_SERVER['HTTP_REFERER']);
                //header("Location:Aadmin.php?errno=2");
            }
        }else {
            //echo "传递参数失败";
            header("location:".$_SERVER['HTTP_REFERER']);
            //header("Location:Aadmin.php?errno=3");
        }
    }
    
    //如果标志位为signDel,则进行标签或类别删除
    elseif ($flag=="signDel"){
        $name = $_REQUEST['name'];
        $type = $_REQUEST['type'];
        
        $signService = new SignService();
        $blogService = new BlogService();
        $blog_signService = new Blog_SignService();
        //取得该标签或类别的id
        $sign_id = $signService->GetId($name, $type);
//         var_dump($name);
//         var_dump($sign_id);
//         var_dump($type);
        //如果该操作对应类别，即$type=1;
        if ($type == 1){
            //查找属于该类别的所有文章的id集合
            $res = $blog_signService->GetBlog_idBySign_id($sign_id);
            foreach ($res as $key=>$val){
                //删除属于该类别的所有文章的标签和类别
                $blog_signService->Blog_SignDelByBlog_id($val);
                //删除属于该类别的所有文章
                $blogService->BlogDel($val);
            }
        }
        if ($type == 2){
            $res = $blog_signService->Blog_SignDel($sign_id);
        }
        $res = $signService->SignDel($name, $type);
//         die($res);
        if ($res == 1){
            //echo "删除成功";
            header("location:".$_SERVER['HTTP_REFERER']);
            //header("Location:Aadmin.php?errno=0");
        }elseif ($res == 2){
            //echo "删除无效";
            header("location:".$_SERVER['HTTP_REFERER']);
            //header("Location:Aadmin.php?errno=1");
        }else {
            //echo "删除出错";
            header("location:".$_SERVER['HTTP_REFERER']);
            //header("Location:Aadmin.php?errno=2");
        }
    }
}