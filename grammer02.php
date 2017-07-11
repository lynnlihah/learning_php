<?php
echo '<h3>5.运算符</h3>';
// + - * / %
echo "<br>"; 
$english = 110; //英语成绩
$math= 118; //数学成绩
$biological = 80; //生物成绩
$physical = 90; //物理成绩

$sum = $english+$math+$biological+$physical;
$avg = $sum / 4;
$x = $math - $english;
$x2 = $english * $english;

echo "总分:".$sum."<br />";
echo "平均分:".$avg."<br />";
echo "数学比英语高的分数:".$x."<br />";
echo "英语成绩的平方:".$x2."<br />";

echo "<br";//取模
$maxline = 4; //每排人数
$no = 17;//学生编号

$line=ceil($no/$maxline);
$row = $no%$maxline?$no%$maxline:$maxline;

echo "编号<b>".$no."</b>的座位在第<b>".$line."</b>排第<b>".$row."</b>个位置";
//赋值运算 - 都可以用 += 这种形式
$x=10; 
$y += 100;
$a = "abc";
$a .= "ABC";
echo "<br>";
echo $a; //output:abcABC
$b = $a;
$c = &$a; //引用赋值，意味着两个变量都指向同一个数据

// 递增递减：++ -- 前后都可以

// 比较运算符： 
// === 恒等于 如果 x 等于 y，且它们类型相同，则返回 true
// !== 不恒等于 如果 x 不等于 y，或它们类型不相同，则返回 true
// 不等于： != <> 都可以
$a = 1;
$b = "1";
var_dump($a==$b);
echo "<br />";
var_dump($a===$b);
echo "<br />";
var_dump($a!=$b);
echo "<br />";
var_dump($a<>$b);
echo "<br />";
var_dump($a!==$b);
echo "<br />";
var_dump($a<$b);
echo "<br />";

$c = 5;
var_dump($a<$c);
echo "<br />";
var_dump($a>$c);
echo "<br />";
var_dump($a<=$c);
echo "<br />";
var_dump($a>=$c);
echo "<br />";
var_dump($a>=$b);
echo "<br />";

// 逻辑运算符：and or xor && || !
$a = TRUE; //A同意
$b = TRUE; //B同意
$c = FALSE; //C反对
$d = FALSE; //D反对
//咱顺便复习下三元运算符
echo ($a and $b)?"通过":"不通过";//逻辑与
echo "<br />";
echo ($a or $c)?"通过":"不通过";//逻辑或
echo "<br />";
echo ($a xor $c xor $d)?"通过":"不通过";//逻辑异或-有且只有一个true
echo "<br />";
echo !$c?"通过":"不通过";//逻辑非
echo "<br />";
echo $a && $d ?"通过":"不通过"; //逻辑与
echo "<br />";
echo $b || $c || $d?"通过":"不通过"; //逻辑或

// 数组运算符可以用 + 

// 三元运算符
echo "<br>";
$username = $test ?: 'nobody';
echo $username, PHP_EOL;

$a = 78;//成绩
$b = $a >= 60 ? "及格":"不及格";
echo $b;

// 如果 $_GET['user'] 不存在返回 'nobody'，否则返回 $_GET['user'] 的值
$username = $_GET['user'] ?:'nobody';

//错误控制运算符 @
//将@放置在一个PHP表达式之前，该表达式可能产生的任何错误信息都被忽略掉；
//如果激活了track_error（在php.ini中设置）特性，表达式所产生的任何错误信息都被
//存放在变量$php_errormsg中，此变量在每次出错时都会被覆盖，所以如果想用它的话必
//须尽早检查。
//需要注意的是：错误控制前缀“@”不会屏蔽解析错误的信息，不能把它放在函数或类的定
//义之前，也不能用于条件结构例如if和foreach等。
ini_set('track_errors', 1); 
$conn = @mysql_connect("localhost","username","password");
echo "出错了，错误原因是：".$php_errormsg;
//output: 出错了，错误原因是：mysql_connect(): No such file or directory
?>