<?php
//1. 变量 - 区分大小写
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

	echo "<p>函数调用</p>";
	echo "<br>";
	echo "函数内部全局变量 x 为: $x";
	echo "<br>";
	echo "局部变量 y 为: $y";
	echo "<br>";
	echo "static变量 z 为： $z";
}

myTest();
myTest();

echo "<br>";
echo "函数外部全局变量 x 值为：$x";

//2. print和echo
//echo - 可以输出一个或多个字符串
//print - 只允许输出一个字符串，返回值总为 1
?>