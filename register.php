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
    .register_container{
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
      margin: 0 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">会员注册管理系统</h1>
    <div class="nav_container">
      <a href="index.php">首页</a>
      <a href="register.php" class="current">会员注册</a>
      <a href="login.php">会员登录</a>
      <a href="personal.php">个人资料修改</a>
      <a href="admin.php">后台管理</a>
    </div>

    <form action="postReg.php" method="post" onsubmit="return check()" class="register_container">
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
      <div class="form_item">
        <span>确认密码：</span>
        <input name="repPassword" type="password">
        <span class="xinghao">*</span>
      </div>
      <div class="form_item">
        <span>电子邮箱：</span>
        <input name="email" type="text">
      </div>
      <div class="form_item">
        <span>性别：</span>
        <input name="sex" value="1" checked type="radio">男
        <input name="sex" value="0" type="radio">女
        <span class="xinghao">*</span>
      </div>
      <div class="form_item">
        <span>爱好：</span>
        <input name="hobby[]" value="唱歌" type="checkbox">唱歌
        <input name="hobby[]" value="跳舞" type="checkbox">跳舞
        <input name="hobby[]" value="打篮球" type="checkbox">打篮球
      </div>
      <div class="form_item form_btn">
        <input type="submit" value="提交">
        <input type="reset" value="重置">
      </div>
    </form>
  </div>

  <script>
    function check(){
      const username = document.getElementsByName('username')[0].value.trim()
      const password = document.getElementsByName('password')[0].value.trim()
      const repPassword = document.getElementsByName('repPassword')[0].value.trim()
      const email = document.getElementsByName('email')[0].value.trim()
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
      if(password !== repPassword){
        alert('输入的两次密码不一致！')
        return false
      }
      // 验证邮箱
      const emailReg = /^[a-zA-Z0-9_\-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/
      if(email){
        if(!emailReg.test(email)){
          alert('邮箱格式不正确！')
        return false
        }
      }
      return true
    }
  </script>
</body>
</html>