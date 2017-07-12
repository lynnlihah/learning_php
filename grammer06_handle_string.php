<?php
//定义方式三种：
//单引号：原样输出
//双引号: 可以包含字符串变量 "aaa, $str"
//heredoc: 
//$str = <<<TAG
// content
//TAG; 

//字符串链接 .
$i='I';
$love=' Love';
$you=' You';
$str = $i.$love.$you;

//去掉首尾空格
echo trim(" 空格 ")."<br>"; //去首尾
echo rtrim(" 空格 ")."<br>";//去右侧
echo ltrim(" 空格 ")."<br>";//去左侧

//获取字符串长度
$love = 'I love you';
echo strlen($love)."<br>";
//获取字符串中中文长度
$str = '我爱你';
echo mb_strlen($str,"UTF8")."<br>"; //结果：3，此处的UTF8表示中文编码是UTF8格式，中文一般采用UTF8编码

//截取字符串：substr(字符串变量，开始截取的位置，截取个数) 索引从0开始
$str='hello,world';
echo substr($str,6,5)."<br>";
//中文字符串截取
$str1="我爱你，中国";
echo mb_substr($str1,4,2)."<br>";

//查找字符串：strpos(要处理的字符串, 要定位的字符串, 定位的起始位置[可选])
$str = 'What is your name?';
echo strpos($str,"name")."<br>"; //output:13

//替换字符串:str_replace(要查找的字符串, 要替换的字符串, 被搜索的字符串, 替换进行计数[可选])
$str = 'I Love Chian';
echo str_replace("Chian","China",$str)."<br>"; //output:I Love China

//格式化字符串 - sprintf 
$str = '100.1';
echo sprintf('%0.3f',$str)."<br>"; //显示到小数点后三位，100.100
?>