<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link = connect();
$data = $_POST;
session_start();
if(isset($data['action'])&&$data['action']=='login'){
    if(!isset($data['username'])||empty($data['username'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
    if(!isset($data['password'])||empty($data['password'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
    $sql = "select * from user where username='".$data['username']."'";
    $_SESSION['username'] = $data['username'];
    $result = execute($link,$sql);
    if (mysqli_num_rows($result)<=0) {
        exit(json_encode(['code'=>0,'msg'=>'Account error']));
    }
    $row = mysqli_fetch_assoc($result);
    if($row['password']!=$data['password']){
         exit(json_encode(['code'=>0,'msg'=>'Password error']));
    }
    
   exit(json_encode(['code'=>1,'msg'=>'success']));
}
?>