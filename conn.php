<?php
// 第一步：连接数据库服务器
$conn = mysqli_connect("localhost", "root", "123456", "member");
if (!$conn) {
  die("数据库连接失败！<br/>");     // die() 方法类似于echo，用于输出一个文档流文字，但执行后程序将结束，不会继续向下执行
}
// 第二步：设置字符集
mysqli_query($conn, "set names utf8");