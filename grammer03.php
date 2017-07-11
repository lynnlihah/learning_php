<?php
//if 
$t = date("H");

if ($t<"10"){
    echo "Have a good morning!";
}
else if ($t<"20"){
    echo "Have a good day!";
}
else{
	echo "Have a good night!";
}

//switch
echo  "<br>";
$num = rand(1,50);//获取1至50的随机数
$info = "";//提示信息
switch($num){
    case 1:
		$info = "恭喜你！中了一等奖！";
		break;
	case 2:
		$info = "恭喜你！中了二等奖！";
		break;
 	case 3:
		$info = "恭喜你！中了三等奖！";
		break;
	default:
		$info = "很遗憾！你没有中奖！";
}
 echo $info; //输出是否中奖

 //while
 $sum = 12;//小宠物当前的饥饿程度
echo "我饿啦:-(";
echo "<br />";
while($sum<100){//小宠物的饥饿程度到100，表示小宠物吃饱啦,不用继续喂了，没吃饱继续喂食
    $num = rand(1,20);//随机数，模拟喂食小宠物的小面包
	$sum = $sum + $num; //小宠物吃小面包
	echo "我还没吃饱呢！";
	echo "<br />";
}
echo "终于吃饱啦^_^";

//do while
echo "<br>";
$i =  1 ; //从第1圈开始跑
do{  //跑10圈
    echo "在跑第".$i."圈。";
	$i++;
}while($i<=10);

//while - do while 比较
echo "<br>";
//while例子
$sum  = 0; 
$num = rand(1,6); //获取1至6的随机数，模拟掷骰子
$sum = $sum  + $num;//前进步长
while($num==6){
	$num = rand(1,6);//获取1至6的随机数，模拟掷骰子
	$sum = $sum  + $num;//前进步长
};
echo "while例子执行完毕，前进：".$sum ."<br />";
//do...while例子
$sum  = 0; 
do{
	$num = rand(1,6);//获取1至6的随机数，模拟掷骰子
	$sum = $sum  + $num;//前进步长
}while($num==6);
echo "do...while例子执行完毕，前进：".$sum ."<br />";

// for循环
echo "<br>";
for($i=1,$sum=0;$i<=100;$i++){
    $sum = $sum + $i; //	累加求和
}
echo "for语句的运行结果：".$sum."<br />" ;

//foreach循环
echo "<br>";
$students = array(
'2010'=>'令狐冲',
'2011'=>'林平之',
'2012'=>'曲洋',
'2013'=>'任盈盈',
'2014'=>'向问天',
'2015'=>'任我行',
'2016'=>'冲虚',
'2017'=>'方正',
'2018'=>'岳不群',
'2019'=>'宁中则',
);//10个学生的学号和姓名，用数组存储

//使用循环结构遍历数组,获取姓名  - foreach 只取 value
foreach($students as $v)
{ 
    echo $v;//输出（打印）姓名
	echo "<br />";
}
//使用循环结构遍历数组,获取学号和姓名  - foreach 取 value 和 key
foreach($students as $key=>$v)
{ 
    echo $key.":".$v;//输出（打印）学号：姓名 
	echo "<br />";
}

//结构嵌套
//	条件嵌套
//	循环嵌套
// 	二者混合
 $students = array(
'2010'=>'令狐冲',
'2011'=>'林平之',
'2012'=>'曲洋',
'2013'=>'任盈盈',
'2014'=>'向问天',
'2015'=>'任我行',
'2016'=>'冲虚',
'2017'=>'方正',
'2018'=>'岳不群',
'2019'=>'宁中则',
);//10个学生的学号和姓名，用数组存储
$query = '2014';
//使用循环结构遍历数组,获取学号和姓名
foreach($students as $key=>$v)
{ 
    //使用条件结构，判断是否为该学号
	if($key==$query)
	{ 
		echo $v;//输出（打印）姓名
		break;//结束循环（跳出循环）
	}
}
?>