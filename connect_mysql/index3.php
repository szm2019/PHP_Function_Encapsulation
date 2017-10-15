//3.函数式编程
//函数内部无法使用其他函数内的公用变量或者属性  这个时候考虑用全局变量
global $db_link;
function db_connect()
{
    global $db_link;
    if(empty($db_link))
    {
        $db_link=mysqli_connect("localhost","root","","test");//如果没有链接 放一个链接进入全局变量
    }
    return $db_link;
}

function set_db_charset()
{
    //局部变量没有被定义 出现警告
    global $db_link;
    static $set_db_charset=0;//默认是没有设置编码的 静态变量 会存储上次函数调用后处理的结果
    if(empty($db_link))
    {
        $db_link=db_connect();
    }
    if($set_db_charset<1)
    {
        mysqli_query($db_link,"set names utf8");//设定编码
        $set_db_charset=1;
    }
    return $db_link;
}
function db_query($sql)
{
    global $db_link;//声明使用全局变量
    $db_link=set_db_charset();//这一步是为了拿到已经设置编码的数据库连接
    $query_result= $db_link->query($sql);//查询操作结果
    $data_list=$query_result->fetch_all();//返回结果集
    return $data_list;
}
$result1=db_query("select * from program");
$result2=db_query("select * from program");
var_dump($result1);
var_dump($result2);

//应用场景
//在一些逻辑关联度不是很复杂的业务中 使用函数式编程能更加清晰 高效 而且开发速度也很快
//中小型企业面临一些比较基础性业务逻辑的处理设计模式

//信息管理 内容管理  线性业务管理
