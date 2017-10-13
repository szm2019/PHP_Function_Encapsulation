<?php

//需求：我们有一个场景需要我们生成一段随机的字符串 比如 验证码生成的时候 延伸：生成一个核销随机码

//规则：比如 6位的纯数字的字符串验证码 登录手机短信验证

function create_code($length=6)
{
    $code_string="";               //初始化code
    for($i=0;$i<$length;$i++)
    {
        $code_string.= rand(0,9); //每次循环产生变化
    }
    return $code_string;          //返回已经拼接好的字符串
}

echo create_code(4);              //调用函数 如果传参 将覆盖默认值







