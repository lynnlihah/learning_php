<?php
//array
//设置某个变量为一个空数组
$arr=array();
//创建一个索引数组，索引数组的键是“0”，值是“苹果”
$arr=array("苹果");
if( isset($arr) ) {print_r($arr);}
//从数组变量$arr中，读取键为0的值
$arr = array('苹果','香蕉');
$arr0 = $arr['0'];
if( isset($arr0) ) {print_r($arr0);}
//foreach访问
//value
$fruit=array('苹果','香蕉','菠萝');
for($index=0; $index<3; $index++){
    echo '<br>数组第'.$index.'值是：'.$fruit[$index];
}
//key value
foreach($fruit as $key=>$value){
    echo '<br>第'.$key.'值是：'.$value;
}
//PHP有两种数组：索引数组、关联数组(key是字符串)
//创建一个关联数组，关联数组的键“orange”，值是“橘子”
$arr = array("orange"=>"橘子");
if( isset($arr) ) {print_r($arr);}

//从数组变量$arr中，读取键为apple的值
$arr = array('apple'=>"苹果",'banana'=>"香蕉",'pineapple'=>"菠萝");
$arr0 = $arr['apple'];
if( isset($arr0) ) {print_r($arr0);}

//foreach 访问关联数组
$fruit=array('apple'=>"苹果",'banana'=>"香蕉",'pineapple'=>"菠萝");
foreach($fruit as $key=>$value){
    echo '<br>键是：'.$key.'，对应的值是：'.$value;
}

//自定义函数
echo '<br>';
function say(){
    echo 'hello world';
}
//在这里调用函数
say();

//带参数
echo '<br>';
function sum($a, $b) {
    echo $a + $b;
}
//在这里调用函数计算1+2的值
sum(1,2);
//带返回值
function sum1($a, $b) {
    return $a+$b;
}
//在这里调用函数取得返回值
$c = sum1(1,2);

//可变函数
//通过改变一个变量的值来实现调用不同的函数。经常会用在回调函数、
//函数列表，或者根据动态参数来调用不同的函数。
//可变函数的调用方法为变量名加括号。
echo '<br>';
function func() {
    echo 'my function called.';
}
$name = 'func';
//调用可变函数
$name();

//内置函数
$str = '苹果很好吃。';
//请将变量$str中的苹果替换成香蕉
$str = str_replace('苹果','香蕉',$str);

//判断函数是否存在
echo '<br>';
if (function_exists($name) ) { //判断函数是否存在
    $name();
}

?>
