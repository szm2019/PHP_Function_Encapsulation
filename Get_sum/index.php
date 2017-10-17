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
    return $sum;
}

echo get_sum(100);






