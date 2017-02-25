<?php

require_once 'SqlHelper.class.php';
class Blog_SignService{
    
    //添加关系
    public function Add($blog_id, $sign_id, $type){
    
        $sql = "insert into blog_sign (blog_id, sign_id, type) values ('{$blog_id}', '{$sign_id}', '{$type}' )";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;   
    }
    
    //通过blog_id查找该文章的标签
    public function GetSign_idByBlog_id($blog_id){

        $sql = "select sign_id from blog_sign where blog_id='{$blog_id}' and type=2";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        $arr = array();
        while ( $row = $res->fetch_assoc() ){
            $arr[] = $row['sign_id'];
        }
        $res->free();
        return $arr;
    }

    //通过blog_id查找该文章的类别
    public function GetSignType_idByBlog_id($blog_id){
    
        $sql = "select sign_id from blog_sign where blog_id='{$blog_id}' and type=1";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        $arr = array();
        while ( $row = $res->fetch_assoc() ){
            $arr[] = $row['sign_id'];
        }
        $res->free();
        return $arr;
    }
    
    //通过sign_id查找对应类别的blog_id
    public function GetBlog_idBySign_id($sign_id){

        $sql = "select blog_id from blog_sign where sign_id='{$sign_id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        $arr = array();
        while ( $row = $res->fetch_assoc() ){
            $arr[] = $row['blog_id'];
        }
        $res->free();
        return $arr;
    }
    
    //删除某类别所有关系
    public function Blog_SignDel($sign_id){

        $sql = "delete from blog_sign where sign_id='{$sign_id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;
    }
    
    //删除某文章的所有关系
    public function Blog_SignDelByBlog_id($blog_id){

        $sql = "delete from blog_sign where blog_id='{$blog_id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;
    }
    
    
    
    
}