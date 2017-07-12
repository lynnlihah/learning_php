<?php
//类和对象
//定义一个类
class Car {
    //var $name = '汽车';
    public $name = '汽车';
    function getName() {
        return $this->name;
    }
}

//实例化一个car对象
$car = new Car();
$car->name = '奥迪A6'; //设置对象的属性值
echo $car->getName();  //调用对象的方法 输出对象的名字

//属性&方法：public protected private
//被定义为公有的类成员可以在任何地方被访问。被定义为受保护的类成员则可以
//被其自身以及其子类和父类访问。被定义为私有的类成员则只能被其定义所在的类访问。
//默认公有
//如果构造函数定义成了私有方法，则不允许直接实例化对象了，这时候一般通过静
//态方法进行实例化，在设计模式中会经常使用这样的方法来控制对象的创建，比如单
//例模式只允许有一个全局唯一的对象。
class Car4{
    private function __construct(){
        echo 'obeject create';
    }
    private static $_object = null;
    public static function getInstance(){
        if(empty(self::$_object)){
            self::$_object = new Car4();//内部方法可以调用私有方法，因此这里可以创建对象
        }
        return self::$_object;
    }
}
//$car4 = new Car(); //这里不允许直接实例化对象
$car4 = Car4::getInstance(); //通过静态方法来获得一个实例

//静态方法
class Car1 {
    public $speed = 0;
    //增加speedUp方法，使speed加10
    public function speedup(){
        $this -> speed += 10;
    }
    public static function getName(){
        return '汽车';
    }
}
echo '<br>';
$car1 = new Car1();
$car1->speedUp();
echo $car1->speed;
echo Car1::getName();

class Car3 {
    private static $speed = 10;
    
    public function getSpeed() {
        return self::$speed;
    }
    
    //在这里定义一个静态方法，实现速度累加10
    public static function speedUp(){
        return self::$speed += 10; //在静态函数中调用静态方法
    }
}

$car3 = new Car3();
Car3::speedUp();  //调用静态方法加速
echo "<br>";
echo $car3->getSpeed();  //调用共有方法输出当前的速度值

//通过变量动态调用
$func3 = 'getSpeed';
$className3 = 'Car3';
echo "<br";
echo $className3::$func3();
//静态方法中，$this伪变量不允许使用。可以使用self，parent，static在内部调用静态方法与属性。
class BigCar extends Car3 {
    public static function start() {
        parent::speedUp();
    }
}

BigCar::start();
echo "<br>";
echo BigCar::getSpeed();


//构造函数和析构函数
class Car2 {
    //增加构造函数与析构函数
    function __construct(){
    	echo "<br>";
        print "构造函数被调用\n";
    }
    function __destruct(){
    	echo "<br>";
        print "析构函数被调用\n";
    }
    
}
$car2 = new Car2(); //当PHP代码执行完毕以后，会自动回收与销毁对象，因此一般情况下不需要显式的去销毁对象
//显示销毁
//unset($car2)

class Truck extends Car2{
    function __construct(){//子类如果自己定义了构造函数就调用子类的
        echo "<br>";
        print "子类构造函数被调用\n";      
        parent::__construct();//调用父类构造杉树，不会自动调
    }
}

$truck = new Truck();

//重载 ? 动态创建属性，或者调用不存在的类方法
//属性的重载通过__set，__get，__isset，__unset来分别实现对不存在属性的赋值、读取、
//判断属性是否设置、销毁属性。
//方法的重载通过__call来实现，当调用不存在的方法的时候，将会转为参数调用__call方法，
//当调用不存在的静态方法时会使用__callStatic重载。
echo "<br>";
echo "car5";
echo "<br>";
//__call
class Car5 {
    public $speed = 10;

    //在这里使用重载实现speedDown方法
    public function __call($name, $args){
        if($name=='speedDown'){
            $this->speed -= 10;
        }
    }
    
}
$car5 = new Car5();
$car5->speedDown(); //调用不存在的speedDown方法
echo $car5->speed;
//属性重载
class Car6{
	private $ary = array();
	public function __set($key, $val){
		$this->ary[$key] = $val;
	}

	public function __get($key){
		if(isset($this->ary[$key])){
			return $this->ary[$key];
		}
		return null;
	}
	public function __isset($key){
		if(isset($this->ary[$key])){
			return true;
		}
		return false;
	}
	public function __unset($key){
		unset($this->ary[$key]);
	}
}
$car6 = new Car6();
$car6->name = '汽车'; //name属性动态创建并赋值
echo '<br>';
echo $car6->name;

//判断对象 == === 
//复制对象
//序列化
echo '<br>';
class Car7 {
    public $name = 'car';
    
    public function __clone() {
        $obj = new Car7();
        $obj->name = $this->name;
    }
}
$a = new Car7();
$a->name = 'new car';
$b = clone $a;
if ($a == $b) echo '==';   //true
if ($a === $b) echo '==='; //false

$str = serialize($a); //对象序列化成字符串
echo $str.'<br>';
$c = unserialize($str); //反序列化为对象
var_dump($c);
?>