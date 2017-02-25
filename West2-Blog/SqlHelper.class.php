<?php

class SqlHelper {
    
    public $mysqli;
    public static $host = "localhost";
    public static $dbname = "wt_blog";
    public static $username = "root";
    public static $password = "";
    
    //构造函数
    public function __construct(){
        
        $this->mysqli = new  mysqli( self::$host, self::$username, self::$password, self::$dbname );
        if ( $this->mysqli->connect_error ){
            die( "连接失败" . $this->mysqli->connect_error );
        }
        $this->mysqli->query("set names utf8");
    }
    
    //执行dql语句
    public function execute_dql($sql){
        
        $res = $this->mysqli->query($sql) or die( "操作dql".$this->mysqli->error );
        return $res;
    }
    
    //执行dml语句
    public function execute_dml($sql){
        
        $res = $this->mysqli->query($sql) or die( "操作dml".$this->mysqli->error );
        if (!$res){
            return 0;
        }else {
            if ($this->mysqli->affected_rows > 0){
                return 1;//执行OK
            }else {
                return 2;//操作无效
            }
        }
    }
    
    //关闭连接
    public function close(){
        
        $this->mysqli->close();
    }
    
    //查询条数和影响条数
    public function effect_row($sql){
        
        $res = $this->mysqli->query($sql) or die( "操作dql".$this->mysqli->error );
        $i = 0;
        while ($row = $res->fetch_assoc()){
            $i++;
        }
        return $i;
    }
    
    //分页查询
    public function execute_dql_fenye($sql1, $sql2, $fenyePage){
        
        //echo '1';
        //echo "sql1".$sql1."<br>";
        
        //echo "sql2".$sql2."<br>";
        $res = $this->mysqli->query($sql1) or die($this->mysqli->error );
        $arr = array();
        while ($row = $res->fetch_assoc()){
            $arr[] = $row;
        }
        $res->free();
        
        if (!is_int($sql2)){
            $res2 = $this->mysqli->query($sql2) or die($this->mysqli->error);
            if ($row = $res2->fetch_row()){
                $fenyePage->pageCount = ceil($row[0]/$fenyePage->pageSize);
                $fenyePage->rowCount = $row[0];
            }
            $res2->free();
        }else {
            $fenyePage->rowCount = $sql2;
            $fenyePage->pageCount = ceil($sql2/$fenyePage->pageSize);
        }
        
        $navigate = "";
        if ($fenyePage->pageNow > 1){
            $prePage = $fenyePage->pageNow - 1;
            $navigate = "<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>上一页</a>";
        }
        if ($fenyePage->pageNow < $fenyePage->pageCount){
            $nextPage = $fenyePage->pageNow + 1;
            $navigate .= "<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>下一页</a>";
        }
        
        $page_whole = 5;
        $start = floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
        $index = $start;
        if ($fenyePage->pageNow > $page_whole){
            $navigate .= "&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'><<</a>";
        }
        for ( ; $start < $index + $page_whole; $start++){
            if ($fenyePage->pageCount < $start){
                break;
            }
            $navigate .= "&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=$start'>".$start."</a>";
        }
        if ($fenyePage->pageCount > $start){
            $navigate .= "&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=$start'>>></a>";
        }
        $navigate .= "&nbsp;&nbsp;当前页{$fenyePage->pageNow}/共{$fenyePage->pageCount}页";
        
        $fenyePage->res_array = $arr;
        $fenyePage->navigate = $navigate;
        return $fenyePage;
    }


    
    
    
    
    
    
    
    

}