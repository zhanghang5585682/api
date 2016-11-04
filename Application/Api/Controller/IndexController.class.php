<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    function index(){
      echo '浩然是猪！';
      echo '浩然是猪！';

    }
    function creatjson(){
    	$arr=array(
    		'name'=>'tom',
    		'age' =>20,
    		'sex' => '男',
    		'job' =>'php',
    		);
    	$json1=json_encode($arr);
    	dump($json1);
    }
    function redjson(){
    	$a='{"name":"tom","age":20,"sex":"\u7537","job":"php"}';
    	$json2=json_decode($a);
    	dump($json2);
    	echo "<hr>";
    	$json3=json_decode($a,true);
    	dump($json3);
    }
    function creatXML(){
    	//生成XML
    	//XML的拼接
    	$str='<?xml version="1.0" encoding="utf-8"?>';
    	$str.='<a>';
    	$str.='<name>tom</name>';
    	$str.='<age>20</age>';
    	$str.='</a>';
    	$rs=file_put_contents('./c.xml',$str);

    }
    function redXML(){
    	$data=file_get_contents('./c.xml');
    	$objdata=simplexml_load_string($data);
    	$a=$objdata->name;
    	$b=$objdata->age;		
    	dump($objdata);
    	dump($a);
    	dump($b);
    }
    function textRequset(){
    	$url='http://www.qiqilove.cn';
    	$content = request($url,false);
    	echo $content;
    }
    function tianqi(){
    	$dizhi=I('get.dizhi');
    	$url='http://api.map.baidu.com/telematics/v2/weather?location='.$dizhi.'&ak=B8aced94da0b345579f481a1294c9094';
    	$content = request($url,false);
    	
    	$xmlobj=simplexml_load_string($content);
    	echo '城    市：' . $xmlobj->currentCity."<br>";
    	echo '实时温度：' . $xmlobj->results->result[0]->date."<br>";
    	echo '天气情况：' . $xmlobj->results->result[0]->weather."<br>";
    	echo '风力风向：' . $xmlobj->results->result[0]->wind."<br>";
    	echo '温    度：' . $xmlobj->results->result[0]->temperature."<br>";
    	echo '实时温度：' . $xmlobj->results->result[1]->date."<br>";
    	echo '天气情况：' . $xmlobj->results->result[1]->weather."<br>";
    	echo '风力风向：' . $xmlobj->results->result[1]->wind."<br>";
    	echo '温    度：' . $xmlobj->results->result[1]->temperature."<br>";
    	echo '实时温度：' . $xmlobj->results->result[2]->date."<br>";
    	echo '天气情况：' . $xmlobj->results->result[2]->weather."<br>";
    	echo '风力风向：' . $xmlobj->results->result[2]->wind."<br>";
    	echo '温    度：' . $xmlobj->results->result[2]->temperature."<br>";
    	echo '实时温度：' . $xmlobj->results->result[3]->date."<br>";
    	echo '天气情况：' . $xmlobj->results->result[3]->weather."<br>";
    	echo '风力风向：' . $xmlobj->results->result[3]->wind."<br>";
    	echo '温    度：' . $xmlobj->results->result[3]->temperature."<br>";


    }
    function guishudi(){
    	//http://virtual.paipai.com/extinfo/GetMobileProductInfo?mobile=15850781443&amount=10000&callname=getPhoneNumInfoExtCallback
    	$phone=I('get.phone');
    	$url='http://cx.shouji.360.cn/phonearea.php?number='.$phone;
    	$content = request($url,false);
   		//JSON解码 	
    	$xmlobj=json_decode($content);
    	echo '号码归属地:'.$xmlobj->data->province,$xmlobj->data->city,$xmlobj->data->sp;
    }

}