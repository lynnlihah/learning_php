<?php
// UNIX 时间戳（英文叫做：timestamp）表示从 1970年1月1日 00:00:00 到当前时间的秒数之和。
// 获取现在的unix时间戳
$time = time();
echo $time.'<br>'; #windows 运行，输出： 1500347165

// 日期
// date函数，第二个参数取默认值的情况
echo date("Y-m-d")."<br>";//2014-03-30
// date函数，第二个参数有值的情况
echo date("Y-m-d",'1396193923').'<br>';//2014-03-30,1396193923表示2014-03-30的unix时间戳

// 内置函数strtotime：获取某个日期的时间戳，或获取某个时间的时间戳。
echo strtotime('2014-04-29').'<br>';//1398700800，这个数字表示从1970年1月1日 00:00:00 到2014年4月29号经历了1398700800秒

echo strtotime('2014-04-29 00:00:01').'<br>';//1398700801，这个数字表示从1970年1月1日 00:00:00 到2014-04-29 00:00:01时经历了1398700801秒

//设置默认时区是中国
date_default_timezone_set("Asia/Shanghai");

// 将格式化的日期字符串转换为Unix时间戳
echo strtotime("now").'<br>';//相当于将英文单词now直接等于现在的日期和时间，并把这个日期时间转化为unix时间戳。这个效果跟echo time();一样。
echo strtotime("+1 seconds").'<br>';//相当于将现在的日期和时间加上了1秒，并把这个日期时间转化为unix时间戳。这个效果跟echo time()+1;一样。
echo strtotime("+1 day").'<br>';//相当于将现在的日期和时间加上了1天。
echo strtotime("+1 week").'<br>';//相当于将现在的日期和时间加上了1周。
echo strtotime("+1 week 3 days 7 hours 5 seconds").'<br>';//相当于将现在的日期和时间加上了1周3天7小时5秒。

// 格式化格林威治（GMT）标准时间
// gmdate 函数能格式化一个GMT的日期和时间，返回的是格林威治标准时（GMT）。
echo date('Y-m-d H:i:s', time()).'<br>'; 
echo gmdate('Y-m-d H:i:s', time()).'<br>';
?>