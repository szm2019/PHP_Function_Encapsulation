<?php
//函数式编程的开发效率和设计

//数列求和 1+2+3+4+……+n

//按照公式得到  (n)(n+1)/2


//function get_sum($n=1)
//{
//    $sum=0;
//    for($i=1;$i<=$n;$i++)
//    {
//        $sum+=$i;
//    }
//    return $sum;
//}
function get_sum($n=1)
{
    $sum=($n)*($n+1)/2;//通过现有的数学公式直接改进程序效率  数列求和等于 n*(n+1)/2
    echo "get_sum has used";
    return $sum;
}
//如果想通过程序方面提高效率和速度 我们可以这样做
//这里使用静态数组模拟缓存 也就是后来我们学习nosql file_cache缓存中使用的思想
//首次获取---若有缓存返回缓存---若无缓存生成缓存返回
function get_cache_sum($n=1)
{
    static $cache_array=array();//定义结果空数组
    if(!isset($cache_array[$n]))
    {
        $result=get_sum($n);//静态数组缓存中没有取到 从函数中拿数据
        $cache_array[$n]=$result;//赋值结果进入静态数组
    }
    return $cache_array[$n];//返回结果
}
//为什么得到求和也要单独封装为函数 这是有时候我们不希望从静态变量缓存中获取
//有时候是想获取比较纯粹的数据就可以直接调用 get_sum

//echo get_cache_sum(100);//首次调用
//echo "<br/>";
//echo get_cache_sum(100);//第二次调用

//---------------------函数内局部变量和函数内全局变量

//如果要自增一个变量尽量使用局部变量
//如果确实需要自增global全局变量 可以先用局部变量存储 然后自增 再赋值给全局变量
global $n;
$n=1;
function incr()
{
    global $n;
    $temp=$n;
    while($temp<100)
    {
        $temp++;
    }
    $n=$temp;
}
incr();
var_dump($n);

//------------------------函数式编程的设计
//尽量使用高内聚低耦合的方式去定义和调用函数
//函数内尽量只完成某一个功能 不必要太冗杂 函数与函数之间形成链式的结果或者说调用关系
//尽量不在函数中书写过多业务逻辑 避免以后代码的扩展




