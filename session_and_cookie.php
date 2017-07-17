<?php
// cookie
// Cookie是存在于HTTP的标头之中，所以必须在其他信息输出以前进行设置
// PHP通过setcookie函数进行Cookie的设置，任何从浏览器发回的Cookie，PHP都会自动的
// 将他存储在$_COOKIE的全局变量之中,通过$_COOKIE['key']读取
setcookie('test', time());
// if (isset($_COOKIE['test'])) {
//     echo 'success';
// }
ob_start();
print_r($_COOKIE); 
$content = ob_get_contents();
$content = str_replace(" ", '&nbsp;', $content);
ob_clean();
header("content-type:text/html; charset=utf-8");
echo '当前的Cookie为：<br>';
echo nl2br($content);

// 设置cookie
// 1. setcookie - 常用参数：5个：
// name（ Cookie名）可以通过$_COOKIE['name'] 进行访问
// value（Cookie的值）
// expire（过期时间）Unix时间戳格式，默认为0，表示浏览器关闭即失效
// path（有效路径）如果路径设置为'/'，则整个网站都有效
// domain（有效域）默认整个域名都有效，如果设置了'www.imooc.com',则只在www子域中有效

$value = 'test';
setcookie('TestCookie', $value);
setcookie('TestCookie', $value, time()+3600); // 有效期一小时
setcookie('TestCookie', $value, time()+3600, "/path/", "abc.com");//设置路径与域

// 2. setrawcookie跟setcookie基本一样，唯一的不同就是value值不会自动的进行urlencode，
// 因此在需要的时候要手动的进行urlencode。
setrawcookie('cookie_name', rawurldecode($value), time()+ 60*60*24*365);

// 3. 因为Cookie是通过HTTP标头进行设置的，所以也可以直接使用header方法进行设置。
header("Set-Cookie:cookie_name=value");

// cookie的删除与过期时间
// 1. 用setcookie，value为空， time为当前时间
setcookie('test','',time()-1);
// 2. Header
header("Set-Cookie:test=1393832059; expires=".gmdate('D, d M Y H:i:s \G\M\T', time()-1)); //gmdate - 格林威治标准时

// cookie的有效路径
// 默认为'/'，在所有路径下都有，当设定了其他路径之后，则只在设定的路径以及子路径下有效
setcookie('test', time(), 0, '/path');

// session 与 cookie 的异同

// cookie将数据存储在客户端，建立起用户与服务器之间的联系，通常可以解决很多问题，但是cookie仍然具有一些局限：
//		cookie相对不是太安全，容易被盗用导致cookie欺骗
// 		单个cookie的值最大只能存储4k
// 		每次请求都要进行网络传输，占用带宽

// session是将用户的会话数据存储在服务端，没有大小限制，通过一个session_id进行用户识别，PHP默认情况下session id是通过cookie来保存的，因此从某种程度上来说，seesion依赖于cookie。但这不是绝对的，session id也可以通过参数来实现，只要能将session id传递到服务端进行识别的机制都可以使用session。

//开始使用session
session_start();
//设置一个session
$_SESSION['test'] = time();
//显示当前的session_id
echo "session_id:".session_id();
echo "<br>";

//读取session值
echo $_SESSION['test'];

//销毁一个session
unset($_SESSION['test']);
echo "<br>";
var_dump($_SESSION);

// session会自动的对要设置的值进行encode与decode，因此session可以支持任意数据类型，包括数据与对象等。
// session_start();
$_SESSION['ary'] = array('name' => 'jobs');
$_SESSION['obj'] = new stdClass();
var_dump($_SESSION);
// 默认情况下，session是以文件形式存储在服务器上的，因此当一个页面开启了session之后，会独占这个session文件，这样会导致当前用户的其他并发访问无法执行而等待。可以采用缓存或者数据库的形式存储来解决这个问题。

// 删除session
unset($_SESSION['name']);
session_destroy(); //删除所有的session,但是session_id仍然存在。
// session_destroy并不会立即的销毁全局变量$_SESSION中的值，只有当下次再访问的时候，$_SESSION才为空，因此如果需要立即销毁$_SESSION，可以使用unset函数。
unset($_SESSION);


session_start();
//假设用户登录成功获得了以下用户数据
$userinfo = array(
    'uid'  => 10000,
    'name' => 'spark',
    'email' => 'spark@imooc.com',
    'sex'  => 'man',
    'age'  => '18'
);
header("content-type:text/html; charset=utf-8");

/* 将用户信息保存到session中 */
$_SESSION['uid'] = $userinfo['uid'];
$_SESSION['name'] = $userinfo['name'];
$_SESSION['userinfo'] = $userinfo;

//* 将用户数据保存到cookie中的一个简单方法 */
$secureKey = 'imooc'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
//用户信息加密前
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), $str, MCRYPT_MODE_ECB));
//用户信息加密后
//将加密后的用户数据存储到cookie中
setcookie('userinfo', $str);

//当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "解密后的用户信息：<br>";
print_r($uinfo);

?>