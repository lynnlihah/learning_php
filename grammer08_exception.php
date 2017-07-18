<?php
function checkNum($number){
     if($number>1){
         throw new Exception("异常提示-数字必须小于等于1<br>");
     }
     return true;
 }

 try{
     checkNum(2);
     //如果异常被抛出，那么下面一行代码将不会被输出
     echo '如果能看到这个提示，说明你的数字小于等于1';
 }catch(Exception $e){
     //捕获异常
     echo '捕获异常: ' .$e->getMessage();
 }

 class MyException extends Exception {
    function getInfo() {
        return '自定义错误信息';
    }
}
try {
    //使用异常的函数应该位于 "try"  代码块内。如果没有触发异常，则代码将照常继续执行。但是如果异常被触发，会抛出一个异常。
    throw new MyException('error<br>');//这里规定如何触发异常。注意：每一个 "throw" 必须对应至少一个 "catch"，当然可以对应多个"catch"
} catch(Exception $e) {//"catch" 代码块会捕获异常，并创建一个包含异常信息的对象
    echo $e->getInfo();//获取自定义的异常信息
    echo $e->getMessage();//获取继承自基类的getMessage信息
}

try {
    throw new Exception('wrong');
} catch(Exception $ex) {
    echo 'Error:'.$ex->getMessage().'<br>';
    echo $ex->getTraceAsString().'<br>';
    $msg = 'Error:'.$ex->getMessage()."\n";
    $msg.= $ex->getTraceAsString()."\n";
    $msg.= '异常行号：'.$ex->getLine()."\n";
    $msg.= '所在文件：'.$ex->getFile()."\n";
    //将异常信息记录到日志中
 	file_put_contents('error.log', $msg);
}

?>