<?php 
function upload($save_path,$custom_upload_max_filesize,$key,$type=array('jpg','jpeg','gif','png')){
	$return_data=array();
	// get upload_max_filesize value from phpini deployment file
	$phpini=ini_get('upload_max_filesize');
	// get upload_max_filesize unit from phpini deployment file
	$phpini_unit=strtoupper(substr($phpini,-1));
	// get upload_max_filesize number part from phpini deployment file
	$phpini_number=substr($phpini,0,-1);
	//calculate the multiple of phpini unit
	$phpini_multiple=get_multiple($phpini_unit);
	//convert to bytes
	$phpini_bytes=$phpini_number*$phpini_multiple;

	$custom_unit=strtoupper(substr($custom_upload_max_filesize,-1));
	$custom_number=substr($custom_upload_max_filesize,0,-1);
	$custom_multiple=get_multiple($custom_unit);
	$custom_bytes=$custom_number*$custom_multiple;

//	if($custom_bytes>$phpini_bytes){
//		$return_data['error']='The uploaded file size exceedes the upload_max_filesize limitations from php.ini file'.$phpini;
//		$return_data['return']=false;
//		return $return_data;
//	}
	$arr_errors=array(
			1=>'The uploaded file size exceedes the upload_max_filesize limitations from php.ini file',
			2=>'The uploaded file size exceedes the value of MAX_FILE_SIZE from HTML form',
			3=>'Only the part of the file is uploaded',
			4=>'No files are uploaded',
			6=>'Cannot find the folder',
			7=>'Write-file feature did not go through'
	);
	if(!isset($_FILES[$key]['error'])){
		$return_data['error']='Upload failed due to unknown reasons, please try again!';
		$return_data['return']=false;
		return $return_data;
	}
	if ($_FILES[$key]['error']!=0) {
		$return_data['error']=$arr_errors[$_FILES['error']];
		$return_data['return']=false;
		return $return_data;
	}
	if(!is_uploaded_file($_FILES[$key]['tmp_name'])){
		$return_data['error']='The file you uploaded was not uploaded via HTTP POST!';
		$return_data['return']=false;
		return $return_data;
	}
	if($_FILES[$key]['size']>$custom_bytes){
		$return_data['error']='The size of the uploaded file exceeded the limit set by the program author'.$custom_upload_max_filesize;
		$return_data['return']=false;
		return $return_data;
	}
	$arr_filename=pathinfo($_FILES[$key]['name']);
	if(!isset($arr_filename['extension'])){
		$arr_filename['extension']='';
	}
	if(!in_array($arr_filename['extension'],$type)){
		$return_data['error']='The file name extension must be'.implode(',',$type).'one of these';
		$return_data['return']=false;
		return $return_data;
	}
	if(!file_exists($save_path)){
		if(!mkdir($save_path,0777,true)){
			$return_data['error']='Upload file save directory creation failed, please check permissions!';
			$return_data['return']=false;
			return $return_data;
		}
	}
	$new_filename=str_replace('.','',uniqid(mt_rand(100000,999999),true));
	if($arr_filename['extension']!=''){
		$new_filename.=".{$arr_filename['extension']}";
	}
	$save_path=rtrim($save_path,'/').'/';
	if(!move_uploaded_file($_FILES[$key]['tmp_name'],$save_path.$new_filename)){
		$return_data['error']='Temporary file move failed, please check permissions!';
		$return_data['return']=false;
		return $return_data;
	}
	$return_data['save_path']=$save_path.$new_filename;
	$return_data['filename']=$new_filename;
	$return_data['return']=true;
	return $return_data;
}
function get_multiple($unit){
	switch ($unit){
		case 'K':
			$multiple=1024;
			return $multiple;
		case 'M':
			$multiple=1024*1024;
			return $multiple;
		case 'G':
			$multiple=1024*1024*1024;
			return $multiple;
		default:
			return false;
	}
}
?>