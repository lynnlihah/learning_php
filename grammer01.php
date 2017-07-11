<?php
//1. 变量 - 区分大小写
echo '<h3>1.变量</h3>';
$x = 5; //全局变量 -PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。

function myTest() //参数作用域
{
	$y = 10; //局部变量
	//global - 在函数中使用全局变量，需要使用global关键字
	global $x;
	$GLOBALS['x'] = $GLOBALS['x'] + $y; //相当于 $x = $x + $y
	//static
	static $z = 0;
	$z++; //调用一次函数 $c 值就会加1 

	echo "<br>";
	echo "函数调用myTest()";
	echo "<br>";
	echo "函数内部全局变量 x 为: $x";
	echo "<br>";
	echo "局部变量 y 为: $y";
	echo "<br>";
	echo "static变量 z 为： $z";
	echo "<br>";
}

myTest();
myTest();

echo "<br>";
echo "函数外部全局变量 x 值为：$x";

//2. print和echo
//echo - 可以输出一个或多个字符串
//print - 只允许输出一个字符串，返回值总为 1

echo '<h3>2.数据类型</h3>';
//3. 数据类型 - String（字符串）, Integer（整型）, Float（浮点型）, Boolean（布尔型）, Array（数组）, Object（对象）, NULL（空值）。
//字符串
$str1 = 'str1';
$str2 = "str2";

//整形
$x = 0x8C; // 十六进制数
var_dump($x); // var_dump() 函数返回变量的数据类型和值, 输出 int(140)
echo "<br>";
$x = 047; // 八进制数
var_dump($x); // output int(39)

//浮点
$x = 10.365;
var_dump($x);
echo "<br>"; 
$x = 2.4e3;
var_dump($x);
echo "<br>"; 
$x = 8E-5;
var_dump($x);

//布尔
$b1 = true; 
$b2 = false;

//数组
echo "<br>";
$cars = array('Volvo', 'BMW', 'Toyota');
var_dump($cars); //output: array(3) { [0]=> string(5) "Volvo" [1]=> string(3) "BMW" [2]=> string(6) "Toyota" } 

//对象 - 类对象：必须声明
class Car
{
	var $color;
	function Car($color = 'green')
	{
		$this -> color = $color;
	}

	function what_color()
	{
		return $this -> color;
	}
}

function print_vars($obj)
{
	foreach(get_object_vars($obj) as $prop => $val)
	{
		echo "\t$prop = $val\n";
	}
}

//instantiate one object
$herbie = new Car('white');

//show herbie properties
echo "<br>";
echo "\therbie: Properties\n";
print_vars($herbie);

//NULL
echo "<br>";
$x=null;
var_dump($x); #ouput: NULL

//3. 常量 - 常量值被定义后，在脚本的其他任何地方都不能被改变，在整个脚本中都可以使用
echo '<h3>3.常量</h3>';
//设置语法：bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
//name：必选参数，常量名称，即标志符。
//value：必选参数，常量的值。
//case_insensitive ：可选参数，如果设置为 TRUE，该常量则大小写不敏感。默认是大小写敏感的。
define("GREETING","欢迎访问");
echo GREETING;
echo '<br>';
// echo greeting; //Use of undefined constant greeting
//系统常量
//__FILE__ :php程序文件名。它可以帮助我们获取当前文件在服务器的物理位置
//__LINE__ :PHP程序文件行数。
//PHP_VERSION:当前解析器的版本号
//PHP_OS：执行当前PHP版本的操作系统名称。
echo __FILE__;
echo "<br />";
echo __LINE__;
echo "<br />";
echo PHP_VERSION;
echo "<br />";
echo PHP_OS;
echo "<br />";
//用constant调用常量 - 也可以知己constant("PI") 和 PI 效果一样，没试
$p="";
//定义圆周率的两种取值
define("PI1",3.14);
define("PI2",3.142);
//定义值的精度
$height = "中";
//根据精度返回常量名，将常量变成了一个可变的常量
if($height == "中"){
    $p = "PI1";
}else if($height == "低"){
	$p = "PI2";
}
$r=1;
$area=constant($p)*$r*$r;
echo $area;

echo "<br>";
//defined判断常量是否已经被定义
define("PI1",3.14);
$p = "PI1";
$is1 = defined($p);
$is2 = defined("PI2");
var_dump($is1);
var_dump($is2);

echo '<h3>4.字符串</h3>';
//并置运算符 (.) 用于把两个字符串值连接起来。
$txt1 = "Hello world!";
$txt2 = "What a nice day!";
echo $txt1 . ' ' . $txt2; //output: Hello world! What a nice day!

echo '<br>';

$love = "I love you!"; 
$string1 = "aaa,$love";
echo $string1;
echo "<br>";
echo strlen($txt1); //12
//strpos() 函数用于在字符串内查找一个字符或一段指定的文本。
//如果在字符串中找到匹配，该函数会返回第一个匹配的字符位置。如果未找到匹配，则返回 FALSE。
echo "<br>";
echo strpos($txt1, "world"); //6

//长字符串
echo "<br>";
$string=<<<GOD
我有一只小毛驴，我从来也不骑。
有一天我心血来潮，骑着去赶集。
我手里拿着小皮鞭，我心里正得意。
不知怎么哗啦啦啦啦，我摔了一身泥.
GOD;
echo "$string";

//添加动态内容 - . 连接操作符，可以写在一行中
echo "<p>Order processed at ".date('H:i, jS F Y')."</p>"; //H小时，i分钟，j日期，S顺序后缀（th），F月份全称
	//output like : Order processed at 16:17, 26th June 2017

$b = "东边日出西边雨";	
$b .= ",道是无晴却有晴";

$c = "东边日出西边雨";	
$c = $c.",道是无晴却有晴";

echo  $b."<br />";
echo  $c."<br />";

//资源类型：
//首先采用“fopen”函数打开文件，得到返回值的就是资源类型。
/*$file_handle = fopen("/data/webroot/resource/php/f.txt","r");
if ($file_handle){
    //接着采用while循环（后面语言结构语句中的循环结构会详细介绍）一行行地读取文件，然后输出每行的文字
    while (!feof($file_handle)) { //判断是否到最后一行
        $line = fgets($file_handle); //读取一行文本
        echo $line; //输出一行文本
        echo "<br />"; //换行
    }
}
fclose($file_handle);//关闭文件
*/	
//$file=fopen("f.txt","r");   //打开文件
//$con=mysql_connect("localhost","root","root");  //连接数据库
//$img=imagecreate(100,100);//图形画布

//空类型的三种情况
 echo '<br>';
 error_reporting(0); //禁止显示PHP警告提示
 $var;
 var_dump($var);
 $var1=null;
 var_dump($var1);
 $var2=NULL;
 var_dump( $var2);
 $var3 = "节日快乐！";
 unset($var3);//释放var3
 var_dump($var3);
?>