<?php
//读取文本
$str = explode("\n", file_get_contents('baidu.txt'));
$k = rand(0,count($str));
$baidu_img = str_re($str[$k]);

$url = 'https://imgsrc.baidu.com/forum/pic/item/'.$baidu_img.'.jpg';
//解析结果
$result=array("code"=>"200","imgurl"=>"$url");
 
//Type Choose参数代码
$type=$_GET['return'];
switch ($type)
{   
    
//Json格式解析
case 'json':
$imageInfo = getimagesize($url);  
$result['width']="$imageInfo[0]";  
$result['height']="$imageInfo[1]";  
header('Content-type:text/json');
echo json_encode($result);  
break;
//IMG
default:
header("Location:".$result['imgurl']);
break;
}
function str_re($str){
  $str = str_replace(' ', "", $str);
  $str = str_replace("\n", "", $str);
  $str = str_replace("\t", "", $str);
  $str = str_replace("\r", "", $str);
  return $str;
}
?>
