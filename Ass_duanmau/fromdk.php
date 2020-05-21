<html>
	<head>
		<title>kungfuphp - Form đăng ký thành viên</title>
	</head>
	<body>
		<?php
		include 'db.php';
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$id=$_POST['id'];
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  $sql="insert into user values('$id','$username','$password','','$name','$email')";
        var_dump($sql);
        $kq=$conn->query($sql);
        if($kq){
            header("location:fromdk.php");
        }
        else{
            echo "không thêm được dữ liệu";
        }
    }
	?>
	<form action="fromdk.php" method="post">
		<table>
			<tr>
				<td colspan="2">Form dang ky</td>
			</tr>	
			<tr>
				<td><input type="hidden" name="id"></td>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
			<tr>
				<td>Ho Ten :</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Dang ky"></td>
			</tr>
 
		</table>
 
	</form>
	</body>
	</html>
