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
    .current {
      color: red !important;
    }
    .login_container{
      margin: 40px auto;
      width: 300px;
    }
    .form_item{
      margin: 15px 0;
    }
    .form_item span{
      display: inline-block;
      width: 100px;
      text-align: right;
    }
    .form_item .xinghao{
      display: inline;
      color: red;
      margin-left: 5px;
    }
    .form_btn{
      text-align: center;
    }
    .form_btn input{
      width: 200px;
      margin-left: 50px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">会员注册管理系统</h1>
    <div class="nav_container">
      <a href="index.php">首页</a>
      <a href="register.php">会员注册</a>
      <a href="login.php" class="current">会员登录</a>
      <a href="personal.php">个人资料修改</a>
      <a href="admin.php">后台管理</a>
    </div>

    <form action="postLogin.php" method="post" onsubmit="return check()" class="login_container">
      <div class="form_item">
        <span>用户名：</span>
        <input name="username" type="text">
        <span class="xinghao">*</span>
      </div>
      <div class="form_item">
        <span>密码：</span>
        <input name="password" type="password">
        <span class="xinghao">*</span>
      </div>
      <div class="form_item form_btn">
        <input type="submit" value="登录">
      </div>
    </form>
  </div>

  <script>
    function check(){
      const username = document.getElementsByName('username')[0].value.trim()
      const password = document.getElementsByName('password')[0].value.trim()
      // 验证用户名
      const usernameReg = /^[a-zA-Z0-9]{3,10}$/
      if(!usernameReg.test(username)){
        alert('用户名格式不正确，请输入3-10位大小写字母或数字！')
        return false
      }
      // 验证密码
      const passwordReg = /^[a-zA-Z0-9_*\.]{6,18}$/
      if(!passwordReg.test(password)){
        alert('密码格式不正确，请输入6-18位大小写字母、数字或_、.、*！')
        return false
      }
      return true
    }
  </script>
</body>
</html>