<?php
session_start();
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link = connect();
$data = $_POST;


if(isset($data['property'])){
    $pos = strpos($data['property'], "$");
    $rent = substr($data['property'], $pos + 1);
    $sql = "update property set rented_by= '".$_SESSION['username']."' where rent=".$rent;
    $res = $link->query($sql);
    if($res){
        header("Location:../myrentalPage.html");
        exit;
    }
}

if(isset($data['remove'])){
    $pos = strpos($data['remove'], "$");
    $rent = substr($data['remove'], $pos + 1);
    $sql = "update property set rented_by='NULL' where rent=".$rent;
    $res = $link->query($sql);
    if($res){
        header("Location:../rentalPage.html");
        exit;
    }
}

$getData = $_GET;
if(isset($getData['action'])&&$getData['action']=='list'){
    $sql = "select * from property where `rented_by`= '".$_SESSION['username']."'";
    $result = execute($link,$sql);
    $list = [];
    while ($row = mysqli_fetch_assoc($result)){
        array_push($list,$row);
    }
    
    exit(json_encode(['code'=>1,'msg'=>'success','data'=>$list]));
}
