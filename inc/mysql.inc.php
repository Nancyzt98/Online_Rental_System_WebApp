<?php
function connect($host=DB_HOST, $user=DB_USER, $password=DB_PASSWORD, $database=DB_DATABASE, $port=DB_PORT){
	$link=@mysqli_connect($host, $user, $password, $database, $port);
	if(mysqli_connect_errno()){
		exit(json_encode(['code'=>0,'msg'=>mysqli_connect_error()]));
	}
	mysqli_set_charset($link, 'utf8');
	return $link;
}
function execute($link, $query){
	$result=mysqli_query($link, $query);
	if (mysqli_errno($link)){
        exit(json_encode(['code'=>0,'msg'=>mysqli_error($link)]));
	}
	return $result;
}
function execute_bool($link, $query){
	$bool=mysqli_real_query($link, $query);
	if(mysqli_errno($link)){
        exit(json_encode(['code'=>0,'msg'=>mysqli_error($link)]));
	}
	return $bool;
}
function close($link){
	mysqli_close($link);
}
?>