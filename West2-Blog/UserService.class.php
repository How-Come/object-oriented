<?php

require_once 'SqlHelper.class.php';
class UserService{
    
    //注册时检查用户是否已存在
    public function RegCheck($name){
    
        $sql = "select name from user";
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
    
    //注册用户
    public function Reg($name, $password, $email) {
    
        $sql="insert into user (name, password, email) values ('{$name}', md5('{$password}'), '{$email}')";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        $sqlHelper->close();
        return $res;    
    }
    

    //登录时检查,验证用户是否合法
    public function LoginCheck($name, $password) {
    
        $sql="select id, password, power from user where name='{$name}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        if ( $row = $res->fetch_assoc() ){
            if ($row['password'] == md5($password)){
                if ($row['power'] == 1){
                    $arr = array('id'=>$row['id'], 'power'=>1 );
                    return $arr;
                }
                $id = $row['id'];
                return $id;
            }
        }
        $res->free();
        $sqlHelper->close();
        return false;
    }
    
    //查询用户名，通过id；
    public function GetNameById($id){

        $sql = "select name from user where id='{$id}'";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        $sqlHelper->close();
        if ( $row = $res->fetch_assoc() ){
            return $row['name'];
        }
        $res->free();
        return true;
    }
    

    
    
    
    
}