<?php
echo '<h3>5.运算符</h3>';
// + - * / %
echo "<br>"; 
var_dump(intdiv(10, 3)); // 整除，输出int(3)
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

// 逻辑运算符：and or xor && || !

// 数组运算符可以用 + 

// 三元运算符
echo "<br>";
$username = $test ?: 'nobody';
echo $username, PHP_EOL;

// 如果 $_GET['user'] 不存在返回 'nobody'，否则返回 $_GET['user'] 的值
$username = $_GET['user'] ?? 'nobody';

// 组合比较符 喵喵喵？
// 整型
echo "<br>";
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

// 浮点型
echo "<br>";
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1
 
// 字符串
echo "<br>";
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1

?>