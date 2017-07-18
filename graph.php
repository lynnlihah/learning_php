<?php
// GD指的是Graphic Device - 图形处理库
// 通过GD库，可以对JPG、PNG、GIF、SWF等图片进行处理。GD库常用在图片加水印，验证码生成等方面
// PHP默认已经集成了GD库，只需要在安装的时候开启就行。
/*
header("content-type: image/png"); 
$img=imagecreatetruecolor(100, 100); // 创建一个真彩色的空白图片：
$red=imagecolorallocate($img, 0xFF, 0x00, 0x00); // 进行分配画笔颜色
imagefill($img, 0, 0, $red); // 进行线条的绘制，通过指定起点跟终点来最终得到线条。
imagepng($img); // 得到一个图片文件
imagedestroy($img); // 销毁图片

$filename = 'img.jpg';
​imagejpeg($img, $filename, 80);//可以保存到一个文件, 为啥都销毁了还可以保存？
*/
// 在图像中绘制文字 - 没看

/*
// 验证码
$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
imagefill($img,0,0,$white);
//生成随机的验证码
$code = '';
for($i = 0; $i < 4; $i++) {
    $code .= rand(0, 9);
}
imagestring($img, 5, 10, 10, $code, $black);
//加入噪点干扰
for($i=0;$i<50;$i++) {
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
}
//输出验证码
header("content-type: image/png");
imagepng($img);
imagedestroy($img);
*/

// 给图片加水印 - 一种是在图片上面加上一个字符串，另一种是在图片上加上一个logo或者其他的图片。
$url = 'http://www.iyi8.com/uploadfile/2014/0521/20140521105216901.jpg';
$content = file_get_contents($url);
$filename = 'tmp.jpg';
file_put_contents($filename, $content);
$url = 'http://wiki.ubuntu.org.cn/images/3/3b/Qref_Edubuntu_Logo.png';
file_put_contents('logo.png', file_get_contents($url));
//开始添加水印操作
$im = imagecreatefromjpeg($filename);
$logo = imagecreatefrompng('logo.png');
$size = getimagesize('logo.png');
imagecopy($im, $logo, 15, 15, 0, 0, $size[0], $size[1]); 
 
header("content-type: image/jpeg");
imagejpeg($im);

?>