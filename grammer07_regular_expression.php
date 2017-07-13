<?php
//匹配关键字
$p = '/苹果/';

$str = "我喜欢吃苹果";
if (preg_match($p, $str)) {
    echo '匹配成功'.'<br>';
}

//进行转义可以用\也可以用preg_quote
// /http:\/\//
// $p = 'http://';
// $p = '/'.preg_quote($p,'/').'/';

//模式修饰：
//修正符:i 不区分大小写的匹配;
//修正符:g 表示全局匹配
//修正符:m 将字符串视为多行,不管是那行都能匹配;
//修正符:s 将字符串视为单行,换行符作为普通字符;
//修正符:x 将模式中的空白忽略;
//修正符:A 强制从目标字符串开头匹配;
//修正符:D 如果使用$限制结尾字符,则不允许结尾有换行;
//修正符:U 只匹配最近的一个字符串;不重复匹配;
//修正符:e 配合函数preg_replace()使用,可以把匹配来的字符串当作正则表达式执行;
// 例：i - 忽略大小写匹配
$p1 = '/bbc/i';
$str1 = "BBC是英国的一个电视台";
if (preg_match($p1, $str1)) {
    echo '匹配成功'.'<br>';
}

//元字符
/*\ 一般用于转义字符
^ 断言目标的开始位置(或在多行模式下是行首)
$ 断言目标的结束位置(或在多行模式下是行尾)
. 匹配除换行符外的任何字符(默认)
[ 开始字符类定义
] 结束字符类定义
| 开始一个可选分支
( 子组的开始标记
) 子组的结束标记
? 作为量词，表示 0 次或 1 次匹配。位于量词后面用于改变量词的贪婪特性。 (查阅量词)
* 量词，0 次或多次匹配
+ 量词，1 次或多次匹配
{ 自定义量词开始标记
} 自定义量词结束标记
*/
//初步学习^ 和 $
$p2 = '/^我[^\s]+(苹果|香蕉)$/';
$str2 = "我喜欢吃苹果";
if (preg_match($p2, $str2)) {
    echo '匹配成功'.'<br>';
}

// 匹配字符串中的邮箱 \w匹配字母或数字或下划线
$p3 = '/[\w\.\-]+@[a-z0-9\-]+\.(com|cn)/';
$str3 = "我的邮箱是Spark.eric@imooc.com";
preg_match($p3, $str3, $match3);
echo $match3[0].'<br>';

//匹配str中的电话 - \d 匹配数字
$p4 = '/[\d]+[-][\d]+/';
$str4 = "我的电话是010-12345678";
preg_match($p4, $str4, $match4);
echo $match4[0].'<br>';

//贪婪模式与懒惰模式
//正则表达式中每个元字符匹配一个字符，当使用+之后将会变的贪婪，它将匹配尽可能多的字符，
//但使用问号?字符时，它将尽可能少的匹配字符，既是懒惰模式。
// 贪婪模式：在可匹配与可不匹配的时候，优先匹配
$p5 = '/\d+\-\d+/';
$str5 = '我的电话是010-12345678';
preg_match($p5, $str5, $match5);
echo $match5[0].'<br>'; //output: 010-12345678
// 懒惰模式：在可匹配与可不匹配的时候，优先不匹配
$p6 = '/\d?\-\d?/';
$str6 = '我的电是010-12345678';
preg_match($p6, $str6, $match6);
echo $match6[0].'<br>'; //output: 0-1
// 当我们确切的知道所匹配的字符长度的时候，可以使用{}指定匹配字符数
$p7 = '/\d{3}\-\d{8}/';
$str7 = "我的电话是010-12345678";
preg_match($p7, $str7, $match7);
echo $match7[0].'<br>'; //output：010-12345678

//贪婪模式匹配str中的姓名
// 提示：\w匹配字母或数字或下划线，\s匹配任意的空白符，包括空格、制表符、换行符
$p8 = '/\w+\s\w+/';
$str8 = "name:steven jobs";
preg_match($p8, $str8, $match8);
echo $match8[0].'<br>'; //output：steven jobs

?>