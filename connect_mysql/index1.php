//1.面向过程

//以前使用mysql扩展 如今使用mysqli扩展(php版本升级 这个扩展更高效 而且是官方推荐)

$link=mysqli_connect("localhost","root","","test");//链接数据库
mysqli_query($link,"set names utf8");//设定编码
$query_result=$link->query("select * from program");//查询操作结果
//不知道这个类有什么方法 应该怎么办
$data_list=$query_result->fetch_all();
var_dump($data_list);
