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

// 使用正则表达式的目的是为了实现比字符串处理函数更加灵活的处理方式，因此跟字符串处理函
// 数一样，其主要用来判断子字符串是否存在、字符串替换、分割字符串、获取模式子串等。
// preg_match用来执行一个匹配，可以简单的用来判断模式是否匹配成功，或者取得一个匹配结果，
// 他的返回值是匹配成功的次数0或者1，在匹配到1次以后就会停止搜索。
$subject = 'abcdef';
$pattern = '/def/';
preg_match($pattern, $subject, $matches);
print_r($matches); //Array ( [0] => def ) 
echo "<br>";

$pattern1 = '/a(.*?)d/';
preg_match($pattern1, $subject,$matches1);
print_r($matches1);
echo "<br>"; //Array ( [0] => abcd [1] => bc ) 这里没懂…

$subject2 = "my email is spark@imooc.com";
//在这里补充代码，实现正则匹配，并输出邮箱地址
$pattern2 = '/[\w]+@[\w]+.[\w]+/';
preg_match($pattern2,$subject2,$matches2);
print_r($matches2);
echo "<br>";

// preg_match只能匹配一次结果，但很多时候我们需要匹配所有的结果，preg_match_all可以循环获取
// 一个列表的匹配结果数组。
//实现正则匹配所有li中的数据
$str10 = "<ul>
            <li>item 1</li>
            <li>item 2</li>
        </ul>";

$p10 = "/<li>(.*?)<\/li>/i";
preg_match_all($p10, $str10,$matches10);
print_r($matches10[1]);
echo "<br>"; //Array ( [0] => item 1 [1] => item 2 )

$p11 = "|<[^>]+>(.*?)</[^>]+>|i";
$str11 = "<b>example: </b><div align=left>this is a test</div>";
preg_match_all($p11, $str11, $matches11);
print_r($matches11);
echo "<br>"; //Array ( [0] => Array ( [0] => example: [1] =>
			 // this is a test
			 // ) [1] => Array ( [0] => example: [1] => this is a test ) ) 

// 如果分界符是| ,那么规则串中的 / 就不需要转义所以
// $p = "|<[^>]+>(.*?)</[^>]+>|i";
// $p = "/<[^>]+>(.*?)<\/[^>]+>/i"; 是一样的

$p12 = "/<tr><td>(.*?)<\/td>\s*<td>(.*?)<\/td>\s*<\/tr>/i";
$str12 = "<table> <tr><td>Eric</td><td>25</td></tr> <tr><td>John</td><td>26</td></tr> </table>";
preg_match_all($p12, $str12, $matches12);
print_r($matches12);
echo "<br>"; //Array ( [0] => Array ( [0] => Eric25 [1] => John26 ) [1] => Array ( [0] => Eric [1] => John ) [2] => Array ( [0] => 25 [1] => 26 ) ) 

// 用正则替换来去掉多余的空格与字符：

$str13 = 'one     two';
$str13 = preg_replace('/\s+/', ' ', $str13);
echo $str13."<br>"; // 结果改变为'one two'

// 调整字符串的日期格式
$str14 = 'April 15, 2014';
$p14 = '/(\w+) (\d+), (\d+)/i';
$replacement14 = '$3, ${1} $2';
echo preg_replace($p14, $replacement14, $str14); //结果为：2014, April 15
echo "<br>";

// 正则匹配常用案例
$user = array(
    'name' => 'spark1985',
    'email' => 'spark@imooc.com',
    'mobile' => '13312345678'
);
//进行一般性验证
if (empty($user)) {
    die('用户信息不能为空');
}
if (strlen($user['name']) < 6) {
    die('用户名长度最少为6位');
}
//用户名必须为字母、数字与下划线
if (!preg_match('/^\w+$/i', $user['name'])) {
    die('用户名不合法');
}
//验证邮箱格式是否正确
if (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $user['email'])) {
    die('邮箱不合法');
}
//手机号必须为11位数字，且为1开头
if (!preg_match('/^1\d{10}$/i', $user['mobile'])) {
    die('手机号不合法');
}
echo '用户信息验证成功';

?>