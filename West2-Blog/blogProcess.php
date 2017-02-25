<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php

require_once 'BlogService.class.php';
require_once 'Blog_SignService.class.php';
require_once 'SignService.class.php';

if (!empty($_REQUEST['flag'])){

    $flag = $_REQUEST['flag'];
    if ($flag=="blogWrite"){
//         die(var_dump($_POST['signType']));
//         die(var_dump($_FILES['pic']));
//         var_dump($_POST['signType']);
//         var_dump($_POST['title']);
//         var_dump($_POST['content']);
//         die($_FILES['pic']);
        if (  isset($_POST['signType'])&& isset($_POST['title'])&& isset($_POST['content'])){
            if ( trim($_POST['title']) != "" && trim($_POST['content']) != ""){
                $sign = array();
                if (isset($_POST['sign'])){
                    $sign = $_POST['sign'];
                }
                $signType = $_POST['signType'];
                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content']);
                $author = strip_tags($_POST['author']);
//                 var_dump($signType);
//                 var_dump($title);
//                 var_dump($content);
//                 var_dump($author);
//                 var_dump($_FILES['pic']);
//                 die();
                
                
                $statue = 1;
                $num = time().rand(0,10000);
//                 die(var_dump($num));
                

                $user_path = $_SERVER['DOCUMENT_ROOT']."workspaces/westTwo/3.1/B";
                if (!file_exists($user_path)){
                    mkdir($user_path);
                }
                if ($_FILES['pic']['name'] != ''){
                    if (is_uploaded_file($_FILES['pic']['tmp_name'])){
                        $houzhui = substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.'));
                        $upload_file = $_FILES['pic']['tmp_name'];
                        $filename = $num.$houzhui;
                        $move_to_file = $user_path.'/'.$filename;
                        if (!move_uploaded_file($upload_file, iconv("utf-8","gb2312",$move_to_file))){
                            echo "图片转移失败";
                        }
                        $pic = iconv("utf-8","gb2312",$filename);
                    }else {
                        echo "图片上传失败";
                    }
                }else {
                    $pic = '';
                }
                print_r($pic);
                
                
                $blogService = new BlogService();
                if ( $blogService->BlogWrite($title, $author, $content, $statue, $num, $pic)){
                    $blog_id = $blogService->GetId($num);
                    if ($blog_id){
//                         $a = 1;
//                         $b = 1;
                        $signService = new SignService();
                        $blog_signService = new Blog_SignService();
                        foreach ($signType as $key=>$val){
                            $type = 1;
                            $sign_id=$signService->GetId($val,$type);
                            $a = $blog_signService->Add($blog_id, $sign_id, $type);
//                             if ($a){
//                                 echo "添加类别成功<br>";
//                             }
                        }
                        foreach ($sign as $key=>$val){
                            $type = 2;
                            $sign_id=$signService->GetId($val,$type);
                            $b = $blog_signService->Add($blog_id, $sign_id, $type);
//                             if ($b){
//                                 echo "添加标签成功<br>";
//                             }
                        }
                        //echo "获取文章id成功".$blog_id;
                        header("Location:Aadmin.php?errno=0");
                    }
                }else {
                    //echo "文章添加失败";
                    header("location:".$_SERVER['HTTP_REFERER']);
                    //header("Location:Aadmin.php?errno=1");
                }
            }else {
                //echo "标题或内容为空";
                header("location:".$_SERVER['HTTP_REFERER']);
                //header("Location:Aadmin.php?errno=2");
            }
        }else {
            //echo "文章类别未选";
            header("location:".$_SERVER['HTTP_REFERER']);
            //header("Location:Aadmin.php?errno=3");
        }
    }elseif ($flag=="blogDel"){
        $blog_id = $_REQUEST['id'];
        $blog_signService = new Blog_SignService();
        $blogService = new BlogService();
        $blog_signService->Blog_SignDelByBlog_id($blog_id);
        $res = $blogService->BlogDel($blog_id);
        if ($res == 1){
            //echo "删除成功";
            header("Location:Aadmin.php?errno=0");
        }elseif ($res == 2){
            //echo "删除无效";
            header("Location:Aadmin.php?errno=1");
        }else {
            //echo "删除出错";
            header("Location:Aadmin.php?errno=2");
        }
    }elseif ($flag=="modify"){
        if (  isset($_POST['signType'])&& isset($_POST['title'])&& isset($_POST['content'])){
            if ( trim($_POST['title']) != "" && trim($_POST['content']) != ""){
                $sign = array();
                if (isset($_POST['sign'])){
                    $sign = $_POST['sign'];
                }
                $signType = $_POST['signType'];
                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content']);
                $author = strip_tags($_POST['author']);
                $blog_id = $_POST['blog_id1'];
                
                $statue = 1;
                if ($_FILES['pic'] != ''){
                    $num = time().rand(0,10000);
    //                 die(var_dump($num));
                    
    
                    $user_path = $_SERVER['DOCUMENT_ROOT']."workspaces/westTwo/3.1/B";
                    if (!file_exists($user_path)){
                        mkdir($user_path);
                    }
                    if ($_FILES['pic']['name'] != ''){
                        if (is_uploaded_file($_FILES['pic']['tmp_name'])){
                            $houzhui = substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.'));
                            $upload_file = $_FILES['pic']['tmp_name'];
                            $filename = $num.$houzhui;
                            $move_to_file = $user_path.'/'.$filename;
                            if (!move_uploaded_file($upload_file, iconv("utf-8","gb2312",$move_to_file))){
                                echo "图片转移失败";
                            }
                            $pic = iconv("utf-8","gb2312",$filename);
                        }else {
                            echo "图片上传失败";
                        }
                    }else {
                        $pic = $_POST['pic1'];
                    }
                    //print_r($pic);
                }else {
                    $pic = $_POST['pic1'];
                }
                
                
                $blogService = new BlogService();
                if ( $blogService->BlogUpdate($title, $author, $content, $statue, $num, $pic, $blog_id)){
                        $signService = new SignService();
                        $blog_signService = new Blog_SignService();
                        $blog_signService->Blog_SignDelByBlog_id($blog_id);
                        foreach ($signType as $key=>$val){
                            $type = 1;
                            $sign_id=$signService->GetId($val,$type);
                            $a = $blog_signService->Add($blog_id, $sign_id, $type);
//                             if ($a){
//                                 echo "添加类别成功<br>";
//                             }
                        }
                        foreach ($sign as $key=>$val){
                            $type = 2;
                            $sign_id=$signService->GetId($val,$type);
                            $b = $blog_signService->Add($blog_id, $sign_id, $type);
//                             if ($b){
//                                 echo "添加标签成功<br>";
//                             }
                        }
                        //echo "获取文章id成功".$blog_id;
                        header("Location:Aadmin.php?errno=0");
                }else {
                    //echo "文章添加失败";
                    header("location:".$_SERVER['HTTP_REFERER']);
                    //header("Location:Aadmin.php?errno=1");
                }
            }else {
                //echo "标题或内容为空";
                header("location:".$_SERVER['HTTP_REFERER']);
                //header("Location:Aadmin.php?errno=2");
            }
        }else {
            //echo "文章类别未选";
            header("location:".$_SERVER['HTTP_REFERER']);
            //header("Location:Aadmin.php?errno=3");
        }
        
    }
}
?>
</body>
</html>