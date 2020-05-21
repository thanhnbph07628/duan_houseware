<?php ob_start() ?>
<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/w3c.css">
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="nav" style="height: 450px;">
			<p style="float: left; margin-left: 15px; margin-top: 5px;"><a href="login.php">Quay lại</a></p>
			<h1 style="margin-right:50px;">Đổi mật khẩu</h1>

            <form method="POST" enctype="multipart/form-data">
              <label style="float: left; margin-left: 50px;">Nhập tài khoản *</label><input type="text" class="username" placeholder="Username" required name="user"  />
              <label style="float: left; margin-left: 50px; margin-top: 20px;">Nhập mật khẩu *</label><input type="password" class="username" placeholder="Password" required name="psw" />
              <label style="float: left; margin-left: 50px; margin-top: 20px;">Nhập mật khẩu mới *</label><input type="password" class="username" placeholder="Password" required name="doimk" /><br><br>
              <input type="submit" value="Đổi mật khẩu" class="button" alt="" name="btn_luu" /></br>
            </form>
            </div>

</body>
</html>