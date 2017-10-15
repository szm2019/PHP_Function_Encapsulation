//2.面向对象

//封装一部分可见性

//开放一部分函数供外界使用

class DB
{
   private $db_host="localhost";
   private $db_user="root";
   private $db_pwd="";
   private $db_name="test";
   private $db_charset="utf8";
   private $link=null;
   function __construct()
   {
       //链接数据库
       $this->link=$this->connect($this->db_host,$this->db_user,$this->db_pwd,$this->db_name);//得到数据库连接
       $this->set_db_charset($this->db_charset);//设置编码
   }
   protected function connect($db_host,$db_user,$db_pwd,$db_name)
   {
       return mysqli_connect($db_host,$db_user,$db_pwd,$db_name);//链接数据库
   }
   protected function set_db_charset($db_charset)
   {
       mysqli_query($this->link,"set names ".$db_charset);//设定编码
   }
   public function query($sql="")
   {
       $query_result=$this->link->query($sql);//查询操作结果
       return $query_result->fetch_all();//返回结果集
   }
}

$db=new DB();

var_dump($db->query("select * from program"));
