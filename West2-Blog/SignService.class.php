<?php

require_once 'SqlHelper.class.php';
class SignService{
    
    //检查标签是存在
    public function SignCheck($name, $type){
    
        $sql = "select name from sign where type='{$type}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        while ( $row = $res->fetch_assoc() ){
            if ( $row['name'] == $name ){
                return false;
            }
        }
        $res->free();
        return true;
    }
    
    //添加类别和标签
    public function SignAdd($name, $type){
        
        $sql = "insert into sign (name,type) values ('{$name}','{$type}')";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;
    }
    
    //查询类别 type=1 为类别
    public function SignTypeView(){
        
        $sql = "select * from sign where type=1 ";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $arr = array();
        while ( $row = $res->fetch_assoc() ){
            $arr[] = $row;
        }
        $res->free();
        $sqlHelper->close();
        return $arr;
    }
    
    //查询标签type=2 为标签
    public function SignView(){
        
        $sql = "select * from sign where type=2 ";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $arr = array();
        while ( $row = $res->fetch_assoc() ){
            $arr[] = $row;
        }
        $res->free();
        $sqlHelper->close();
        return $arr;
    }
    
    //查询标签，通过id
    public function GetSignById($id){

        $sql = "select name from sign where id='{$id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        if ( $row = $res->fetch_assoc() ){
            return $row['name'];
        }
        $res->free();
        return false;
    }
    
    
    //删除标签和类别
    public function SignDel($name, $type){
        
        $sql = "delete from sign where name='{$name}' and type='{$type}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;
    }
    
    //取得标签和类别的id
    public function GetId($name, $type){
    
        $sql = "select id from sign where name='{$name}' and type='{$type}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        if ( $row = $res->fetch_assoc() ){
            return $row['id'];
        }
        $res->free();
        return true;
    }
    
    //通过类别名，返回该类别的文章id
    public function GetBlogIdByName($signType){
        
        $type = 1;
        $sign_id = self::GetId($signType, $type);
//         die($sign_id);
//         var_dump($signType);
//         var_dump($sign_id);
//         var_dump($type);
        $sql = "select blog_id from blog_sign where sign_id='{$sign_id}' and type='{$type}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        $arr = array();
        while ( $row = $res->fetch_assoc() ){
//             var_dump($row);
            $arr[] = $row;
        }
//         var_dump($arr);
//         die();
        return $arr;
        $res->free();
    }
    
    
    
    
    
    
    
}