<?php

require_once 'UserService.class.php';

if (!empty($_REQUEST['flag'])){
    
    $flag = $_REQUEST['flag'];
    if ($flag=="reg"){
        if ( isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) ){
            if ( trim($_POST['name']) != "" && trim($_POST['password']) != "" && trim($_POST['email']) != ""){
                $name = strip_tags($_POST['name']);
                $password = strip_tags($_POST['password']);
                $email = strip_tags($_POST['email']);
                $userService = new UserService();
                if ($userService->RegCheck($name)){
                    if ( $userService->Reg($name, $password, $email) ){
                        //echo "注册成功";
                        header("Location:Auser.php?errno=0");
                    }else {
                        //echo "注册失败";
                        header("Location:Auser.php?errno=4");
                    }
                }else {
                    //echo "该用户名已存在，请输入其它用户名";
                    header("Location:Auser.php?errno=1");
                }
            }else {
                //echo "用户名或密码为空";
                header("Location:Auser.php?errno=2");
            }
        }else {
            //echo "传递参数失败";
            header("Location:Auser.php?errno=3");
        }
    }elseif ($flag=="login"){
        if ( isset($_POST['name']) && isset($_POST['password']) ){
            if ( trim($_POST['name']) != "" && trim($_POST['password']) != "" ){
                $name = $_POST['name'];
                $password = $_POST['password'];
                $userService = new UserService();
                $res = $userService->LoginCheck($name, $password);
                if (is_array($res)){
                    session_start();
                    $_SESSION['id']=$res['id'];
                    $_SESSION['power']=$res['power'];
                    //echo "管理员注册成功";
                    header("Location:Aadmin.php");
                }else {
                    if ($res){
                        session_start();
                        $_SESSION['id']=$res;
                        //echo "用户登录成功";
                        header("Location:Auser.php");
                    }else{
                        //echo "用户名或密码出错";
                        header("Location:Auser.php?errno=1");
                    }
                }
            }else {
                //echo "用户名或密码为空";
                header("Location:Auser.php?errno=2");
            }
        }else {
            //echo "传递参数失败";
            header("Location:Auser.php?errno=3");
        }
    }
}