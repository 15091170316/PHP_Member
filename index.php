<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会员注册管理系统</title>
  <style>
    .container{
      width: 1000px;
      margin: 20px auto;
    }
    h1.title{
      text-align: center;
      margin-top: 50px;
      margin-bottom: 30px;
    }
    .nav_container{
      display: flex;
      justify-content: center;
    }
    .nav_container a{
      margin: 0 30px;
      text-decoration: none;
      color: blue;
    }
    .nav_container a:hover{
      color: red;
      text-decoration: underline;
    }
    .current{
      color: red !important;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">会员注册管理系统</h1>
    <div class="nav_container">
      <a href="index.php" class="current">首页</a>
      <a href="register.php">会员注册</a>
      <a href="login.php">会员登录</a>
      <a href="personal.php">个人资料修改</a>
      <a href="admin.php">后台管理</a>
    </div>
  </div>
</body>
</html>