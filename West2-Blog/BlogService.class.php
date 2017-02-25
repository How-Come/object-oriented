<?php

require_once 'SqlHelper.class.php';
require_once 'Blog_SignService.class.php';
require_once 'SignService.class.php';

class BlogService{
   
    
    //发表博文
    public function BlogWrite($title, $author, $content, $statue, $num, $pic){
    
        $sql = "insert into blog (title, author, content, statue, num, uptime, pic) values ('{$title}', '{$author}', '{$content}', '{$statue}', '{$num}', NOW(), '{$pic}' )";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;    
    }
    
    //更新博文
    public function BlogUpdate($title, $author, $content, $statue, $num, $pic, $blog_id){
    
        $sql = "update blog set title='{$title}', author='{$author}', content='{$content}', statue='{$statue}', num='{$num}', uptime= NOW(), pic='{$pic}' where id='{$blog_id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;
    }
    
    //取得博文的id
    public function GetId($num){
        
        $sql = "select id from blog where num='{$num}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        if ( $row = $res->fetch_assoc() ){
            return $row['id'];
        }
        $res->free();
        return true;
    }
    
    //文章列表
    public function BlogList($getType, $fenyePage, $name){
        
        $sqlHelper = new SqlHelper();
        $signService = new SignService();
        if ($getType == ''){
            $sql1 = "select * from blog where id order by id desc limit ".($fenyePage->pageNow - 1)* $fenyePage->pageSize.",".$fenyePage->pageSize;
            //echo $sql1;
            $sql2 = "select count(id) from blog";
        }elseif ($getType == 'search'){
            $name = trim($name); //去除两端空格
            $name=htmlspecialchars($name); //把html标签转为实体
            $name=addslashes($name); //转义字符串
            $sql="select * from blog where title like '%$name%' or content like '%$name%' or author like '%$name%'"; //模糊查询
            $sql2 = $sqlHelper->effect_row($sql);
            $sql1 = $sql."order by id desc limit ".($fenyePage->pageNow - 1)* $fenyePage->pageSize.",".$fenyePage->pageSize;
            //echo $sql1;
        }else {
            $arr = $signService->GetBlogIdByName($getType);
//             var_dump($arr);
            $sql1 = "select * from blog where ";
            $i = 0;
//             var_dump($arr);
            foreach ($arr as $key=>$val){
                $i++;
                $sql1 .= " id='{$val['blog_id']}' or ";
            }
            if ($arr != false){
                $needle = 'or';
                $pos = strripos($sql1, $needle);
                $sql1 = substr($sql1, 0, $pos);
            }else{
                $sql1 .= 'id';
            }
            $sql1 .= " order by id desc limit ".($fenyePage->pageNow - 1)* $fenyePage->pageSize.",".$fenyePage->pageSize;
            if ($arr == false){
                $sql1 = 'select * from blog where id order by id desc limit 0,0' ;
            }
//             var_dump($sql1);
//             die();
            $sql2 = $i;
            //echo $sql1;
//             var_dump($sql1);
        }
        
        
        //取得文章分页列表
        //echo $sql1;
        $res = $sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
        
        $blog_signService = new Blog_SignService();
        
        
        //查找类别
        $i = 0;
        foreach ($res->res_array as $key=>$val){
            $arr = $blog_signService->GetSignType_idByBlog_id($val['id']);
//             var_dump($arr);
            $arr2 = array();
            foreach ($arr as $key1=>$val1){
                $arr1 = $signService->GetSignById($val1);
//                 var_dump($arr1);
                $arr2[] = $arr1;
            }
//             var_dump($arr2);
            $res->res_array["{$i}"]['signType'] = $arr2;
            $i++;
        }
        
        //查找标签
        $i = 0;
        foreach ($res->res_array as $key=>$val){
            $arr = $blog_signService->GetSign_idByBlog_id($val['id']);
//             var_dump($arr);
            $arr2 = array();
            foreach ($arr as $key1=>$val1){
                $arr1 = $signService->GetSignById($val1);
//                 var_dump($arr1);
                $arr2[] = $arr1;
            }
//             var_dump($arr2);
            $res->res_array["{$i}"]['sign'] = $arr2;
            $i++;
        }
        
//         var_dump($res);
        return $res;
    }
    
    //删除文章
    public function BlogDel($blog_id){

        $sql = "delete from blog where id='{$blog_id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;
    }
    
    
    //文章详情
    public function BlogView($blog_id ){
    
        $sqlHelper = new SqlHelper();
        $signService = new SignService();
        $blog_signService = new Blog_SignService();
        
        $sql = "select * from blog where id='{$blog_id}'";
        $res = $sqlHelper->execute_dql($sql);
        //var_dump($res);
        if ($row = $res->fetch_assoc()){
            //var_dump($row);
            //查找类别
            $arr = $blog_signService->GetSignType_idByBlog_id($row['id']);
            $arr2 = array();
            foreach ($arr as $key1=>$val1){
                $arr1 = $signService->GetSignById($val1);
                //                 var_dump($arr1);
                $arr2[] = $arr1;
            }
            $row['signType'] = $arr2;
            
            //查找标签
            $arr = $blog_signService->GetSign_idByBlog_id($row['id']);
            //             var_dump($arr);
            $arr2 = array();
            foreach ($arr as $key1=>$val1){
                $arr1 = $signService->GetSignById($val1);
                //                 var_dump($arr1);
                $arr2[] = $arr1;
            }
            $row['sign'] = $arr2;
        }
    
//         var_dump($row);
        return $row;
    }
    
    
    
    
}