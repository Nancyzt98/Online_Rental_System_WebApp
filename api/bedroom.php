<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link = connect();
$data = $_POST;
include_once "./upload.inc.php";
if(isset($data['action'])&&$data['action']=='add'){
    if(!isset($data['name'])||empty($data['name'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['email'])||empty($data['email'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['address'])||empty($data['address'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['property_type'])||empty($data['property_type'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['bedroom_num'])||empty($data['bedroom_num'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['bathroom_num'])||empty($data['bathroom_num'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['rent'])||empty($data['rent'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    if(!isset($data['acknowledge'])||empty($data['acknowledge'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    $file = $_FILES;
    if(!isset($file['bedroom_img'])){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    $img = upload('./upload','10M','bedroom_img');
    if(!$img['return']){
        echo "<script>alert('params is error');window.history.go(-1)</script>";
        exit;
    }
    $data['bedroom_img'] = $img['filename'];
    $sql = "insert into property(name,email,address,property_type,bedroom_num,bathroom_num,rent,bedroom_img,rented_by) values ('".$data['name']."','".$data['email']."','".$data['address']."','".$data['property_type']."','".$data['bedroom_num']."','".$data['bathroom_num']."','".$data['rent']."','".$data['bedroom_img']."','NULL')";
    $res = $link->query($sql);
    if($res){
        header("Location:../rentalPage.html");
        exit;
    }
}
$getData = $_GET;
if(isset($getData['action'])&&$getData['action']=='list'){
    $sql = "select * from property where rented_by='NULL'";
    $result = execute($link,$sql);
    $list = [];
    while ($row = mysqli_fetch_assoc($result)){
        array_push($list,$row);
    }
//    if(empty($list)){
//        exit(json_encode(['code'=>0,'msg'=>'No information found']));
//    }
    exit(json_encode(['code'=>1,'msg'=>'success','data'=>$list]));
}
