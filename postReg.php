<?php
header("Content-Type: text/html;charset=utf-8");      // 设置该PHP页面为utf-8编码
// 在后端获取前端表单数据的方法是使用全局数组 $_GET 或 $_POST
$username = trim($_POST['username']);     // trim() 去除字符串前后的空格
$password = trim($_POST['password']);
$repPassword = trim($_POST['repPassword']);
$email = $_POST['email'];
$sex = $_POST['sex'];
$hobby = $_POST['hobby'];

// echo 输出的方式（输出至HTML文档流）
echo "用户名：" . $username . "<br/>";
echo "密码： {$password} <br/>";        // 注：必须使用 "" 双引号的字符串才能将变量直接引用
echo "确认密码： $repPassword <br/>";
echo "电子邮箱： $email <br/>";
$gender = $sex == 1 ? '男' : '女';
echo "性别：$gender <br/>";
if($hobby){
  $hobby = implode("，", $hobby);        // implode(string, Array) 将数组转换为字符串的方法，并通过"，"分割字符串
}
// $hobby = @implode("，", $hobby);      // @ 符号可以去除警告信息，因为当不选择爱好时，$hobby不是数组类型，implode() 方法有警告
echo "爱好： $hobby <br/>";

// 连接数据库服务器
// 第一步：连接数据库服务器
$conn = mysqli_connect("localhost", "root", "123456", "member");
if (!$conn) {
  die("数据库连接失败！<br/>");     // die() 方法类似于echo，用于输出一个文档流文字，但执行后程序将结束，不会继续向下执行
}
// 第二步：设置字符集
mysqli_query($conn, "set names utf8");
// 第三部：验证用户输入的内容
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
if($email){
  if(!preg_match('/^[a-zA-Z0-9_\-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/', $email)){
    echo "<script>alert('邮箱格式不正确！'); history.back();</script>";
    exit;
  }
}
if($password <> $repPassword){      // <> 不相等判断符
  echo "<script>alert('两次密码输入不一致！'); history.back();</script>";
  exit; 
}
// 第四部：判断用户名是否重复（是否被占用）
$sql = "select * from user where username = '$username'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);     // mysqli_num_rows() 判断查询结果有几条数据
if($num){
  echo "<script>alert('该用户名已存在，请重新输入！'); history.back();</script>";
  exit; 
}
// 第五部：编写SQL语句
$sql = "insert into
          user (username, password, email, sex, hobby, created) 
        values ('$username', '" . md5($password) . "', '$email', '$sex', '$hobby', '" . date('Y-m-d H:i:s', time()) . "');";
// 第六步：执行SQL语句
$result = mysqli_query($conn, $sql);
if($result){
  echo "<script>alert('数据插入成功！'); location.href='./index.php';</script>";
}else{
  echo "<script>alert('数据插入失败！'); history.back();</script>";
}