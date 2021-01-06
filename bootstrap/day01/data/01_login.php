<?php
// 1.设置响应头
header("Content-Type:application/json;charset=utf-8");
//2.连接数据库
//3.设置编码
$conn = mysqli_connect("127.0.0.1", "root", "123456", "xz", "3306");

//4.获取用户参数
$u = $_REQUEST["uname"];
//5.获取密码参数
$p = $_REQUEST["upwd"];
//通过正则表达式在PHP中对用户参数进行再验证
$uPatthern = '/[a-zA-Z0-9]{3,13}/';
$pPatthern = '/[a-zA-Z0-9]{3,13}/';
if (!preg_match($uPatthern, $u)) {
    echo '{"code":-2,"msg":"用户名格式不正确"}';
    exit;
}
if (!preg_match($pPatthern, $p)) {
    echo '{"code":-2,"msg":"密码格式不正确"}';
    exit;
}
//6.创建SQL,并发送SQL语句
$sql = "select * from xz_user";
$sql .= " where name='$u'";
$sql .= " and password=md5($p)";
//7.获取数据库返回结果
$result = mysqli_query($conn, $sql);
//8.判断并且输出结果信息
$row = mysqli_fetch_assoc($result);
if ($row == null) {
    echo '{"code":-1,"msg":"用户名或密码有误"}';
} else {
    echo '{"code":1,"msg":"登录成功"}';
}
?>