<?php
header("Content-Type: text/html;charset=utf-8");      // 设置该PHP页面为utf-8编码
// 在后端获取前端表单数据的方法是使用全局数组 $_GET 或 $_POST
$username = trim($_POST['username']);     // trim() 去除字符串前后的空格
$password = trim($_POST['password']);

// 连接数据库服务器
// 第一步：引入连接数据库文件
include_once "./conn.php";
// 第二部：验证用户输入的内容
if(!strlen($username) || !strlen($password)){
  echo "<script>alert('用户名和密码不能为空！'); history.back();</script>";     // history.back(); 返回上一个页面
  exit;      // 终止程序执行
}
if(!preg_match('/^[a-zA-Z0-9]{3,10}$/', $username)){
  echo "<script>alert('用户名格式不正确，请输入3-10位大小写字母或数字！'); history.back();</script>";
  exit;
}
if(!preg_match('/^[a-zA-Z0-9_*\.]{6,18}$/', $password)){
  echo "<script>alert('密码格式不正确，请输入6-18位大小写字母、数字或_、.、*！'); history.back();</script>";
  exit;
}
// 第三部：判断用户名是否存在
$sql = "select * from user where username = '$username';";
$result = mysqli_query($conn, $sql);
if(!mysqli_num_rows($result)){
  echo "<script>alert('该用户名不存在，请重新输入！'); history.back();</script>";
  exit;
}
$sql = "select * from user where username = '$username' and password = '" . md5($password) . "';";
$result = mysqli_query($conn, $sql);
if(!mysqli_num_rows($result)){
  echo "<script>alert('密码不正确，请重新输入！'); history.back();</script>";
  exit;
}
echo "<script>alert('登录成功！');</script>";