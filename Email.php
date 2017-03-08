<?php 
#! /bin/bash
require_once('send.php'); //导入PHPMAILER类
$url = 'http://int.bupt.edu.cn/list/list.php?p=2_6_1'; //北邮网研官网地址
$text = file_get_contents($url);  //相当于curl请求
preg_match_all('/<div class="clear"[^>]*>[\s\S]*?<\/div>/', $text, $arr);//正则匹配出所有的table的内容

print_r($arr); 
for($j =1 ;$j < count($arr[0]); $j++) {

   $string = $arr[0][$j];
   preg_match_all('/href=[^>]*>[\s\S]*?<\/a>/', $string, $a);
   //var_dump($a[0]);//$a[0]中含有所有中心的信息 已经跳转
   $center = $a[0][0];
   $info = explode('"',$center);
   $child_url = 'http://int.bupt.edu.cn'.$info[1];
   echo $child_url."\n";
   
   $child = file_get_contents($child_url);//抓取子页面
   preg_match_all('/<div class="zxjs_con2"[^>]*>[\s\S]*?<\/div>/', $child, $teacher);//正则匹配出所有的教师的内容
   //print_r($teacher);
   preg_match_all('/<a [^>]*>[\s\S]*?<\/a>/', $teacher[0][0], $a_url);
   //print_r($a_url);  
   for($i =0 ;$i < count($a_url[0]); $i++) {
       $teacher_url = $a_url[0][$i];
       $teacher_info = explode('"',$teacher_url);
       $email_url = 'http://int.bupt.edu.cn'.$teacher_info[1];
       //echo $email_url."\n";
       $email_contents = file_get_contents($email_url);  
       $pattern = "/([a-z0-9\-_\.]+@[a-z0-9]+\.[a-z0-9\-_\.]+)+/i";//正则匹配邮箱格式
       preg_match( $pattern, $email_contents,$email);
       var_dump($email[0]);
       $name_s = explode('>',$teacher_url);
       $name  = explode('<',$name_s[1]);
       echo $name[0]."\n";
   
   //SendConf($name[0],$email[0]);
   }
}
   $name = '杨啖';
   $email = 'yangdan@mxtrip.cn';
   SendConf($name,$email);
?>
