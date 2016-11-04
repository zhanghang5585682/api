<?php 
function request($url,$https=true,$method='get',$data=null){
	//1初始化CURL
	$ch = curl_init($url);
	//设置相关参数
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//判断是否位HTTPS请求
	if ($https === true) {
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	}
	//判断传输方式是否是POST
	if ($method=='post') {
		curl_setopt($ch,CURLOPT_PORT,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
			
	}
	//发送请求
	$str = curl_exec($ch);
	//关闭连接
	curl_close(ch);
	//返回请求结果
	return $str;


}