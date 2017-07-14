<?php
// cookie
// Cookie是存在于HTTP的标头之中，所以必须在其他信息输出以前进行设置
// PHP通过setcookie函数进行Cookie的设置，任何从浏览器发回的Cookie，PHP都会自动的
// 将他存储在$_COOKIE的全局变量之中,通过$_COOKIE['key']读取
setcookie('test', time());
ob_start();
print_r($_COOKIE); 
$content = ob_get_contents();
$content = str_replace(" ", '&nbsp;', $content);
ob_clean();
header("content-type:text/html; charset=utf-8");
echo '当前的Cookie为：<br>';
echo nl2br($content);

?>