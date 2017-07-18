<?php
// 读取文件
// 将整个文件读取到一个字符串中
$content=file_get_contents('./test.php');
echo $content."<br>";
// file_get_contents也可以通过参数控制读取内容的开始点以及长度。
// $content = file_get_contents('./test.txt', null, null, 100, 500);

// PHP也提供类似于C语言操作文件的方法，使用fopen，fgets，fread等方法，fgets可以从文件指针中读取一行，freads可以读取指定长度的字符串。
$fp = fopen('./test.php', 'rb');
while(!feof($fp)) {
    echo fgets($fp); //读取一行
    // $contents .= fread($fp, 4096); //一次读取4096个字符
}
fclose($fp);

// 判断文件是否存在 - is_file, file_exists
// file_exists不仅可以判断文件是否存在，同时也可以判断目录是否存在
// is_file是确切的判断给定的路径是否是一个文件
// is_readable与is_writeable在文件是否存在的基础上，判断文件是否可读与可写。
$filename = './test.php';
if(file_exists($filename)){
	echo "file exists"."<br>";
}

if (is_writeable($filename)) {
    //  file_put_contents($filename, 'test');
}

if (is_readable($filename)) {
    echo file_get_contents($filename);
}

// 取得文件修改时间
echo '所有者：'.fileowner($filename).'<br>';
echo '创建时间：'.filectime($filename).'<br>';
echo '修改时间：'.filemtime($filename).'<br>';
echo '修改时间：'.date('Y-m-d H:i:s', filemtime($filename));
echo '最后访问时间：'.fileatime($filename).'<br>';

// 给$mtime赋值为文件的修改时间
$mtime = filemtime($filename); 
// 通过计算时间差 来判断文件内容是否有效
if (time() - $mtime > 3600) {
    echo '<br>缓存已过期';
} else {
    echo file_get_contents($filename);
}

// 取得文件的大小
// 通过filesize函数可以取得文件的大小，文件大小是以字节数表示的。
$size = filesize($filename);
// 自定义函数转换文件大小单位
function getsize($size, $format = 'kb'){
	$p = 0;
	if ($format == 'kb'){
		$p = 1;
	}elseif ($format == 'mb'){
		$p = 2;
	}elseif ($format == 'gb') {
		$p = 3;
	}
	$size /= pow(1024, $p);
	return number_format($size, 3);
}
$sizekb = getsize($size, 'kb');
echo $sizekb.'kb'.'<br>';
?>