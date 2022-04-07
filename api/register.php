<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link = connect();
$data = $_POST;
session_start();
if(isset($data['action'])&&$data['action']=='register'){
    if(!isset($data['username'])||empty($data['username'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
    if(!isset($data['password'])||empty($data['password'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
    if(!isset($data['fullname'])||empty($data['fullname'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
     if(!isset($data['email'])||empty($data['email'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
    if(!isset($data['phonenumber'])||empty($data['phonenumber'])){
        exit(json_encode(['code'=>0,'msg'=>'Missing parameter']));
    }
    $sql = "insert into user(username,password,fullname,phonenumber,email) values('".$data['username']."','".$data['password']."','".$data['fullname']."','".$data['phonenumber']."','".$data['email']."')";
    $_SESSION['username'] = $data['username'];
    $result = execute_bool($link, $sql);
    if($result){
        exit(json_encode(['code'=>1,'msg'=>'success']));
    }else{
        exit(json_encode(['code'=>0,'msg'=>'fail']));
    }
}

?>