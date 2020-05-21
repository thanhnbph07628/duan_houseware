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
	<div class="nav">
			<p style="float: left; margin-left: 15px; margin-top: 5px;"><a href="index.php">Quay lại</a></p>
			<h1 style="margin-right:50px;">Đăng nhập hệ thống</h1>
            <form method="POST" enctype="multipart/form-data">
            <input type="text" class="username" placeholder="Username" required name="user" />
            <input type="password" class="password" placeholder="Password"  style="margin-left: 4px;" required name="psw" />
            <label style="float: left; margin-left: 20px;"><br>
            <input type="checkbox" value="Remember me" class="checkbox"/ style="margin-left: 33px;"> <span>Ghi nhớ tôi</span>
            <a href="doimk.php" style="float: right; margin-right: -320px;"><span>Đổi mật khẩu</span></a> 
            </label>
            <br><br><br><br>
            <input type="submit" value="Đăng nhập" class="button" alt="" name="btn_luu" /></br>
             </form>
             <?php 
            include 'db.php';
            if (isset($_POST['btn_luu'])) {
            
            $user=$_POST['user'];
            $pass=md5($_POST['psw']);
            $sqltk="select * from taikhoan where user='$user' and password='$pass'";
            $kqtk=$conn->query($sqltk)->rowCount();
            // var_dump($kqtk);
            // exit();
            if ($kqtk>0) {
            $_SESSION['user']=$user;
            $_SESSION['taikhoan']=$user;
            $sqlrole="select roles from taikhoan where user='$user'";
            $kqro=$conn->query($sqlrole)->fetch();
            $_SESSION["roles"]=$kqro['roles'];

              header("location:index2.php");
            }else{
              echo "Sai tài khoản hoặc mật khẩu";
            }
        }
              
            ?>



            <!--Đăng kí-->
            <div class="w3-container"> 
  <button onclick="document.getElementById('id01').style.display='block'" class="button">Đăng ký</button>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="admin/images/man.png" alt="Avatar" style="width:50px" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container"  method="POST" enctype="multipart/form-data">
        <div class="w3-section" id="use">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
          <label ><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required style="margin-top: 15px;">
          <label><b>Họ Tên</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="ten" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Username" name="email" required>
          <label><b>Avatar</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="file" placeholder="Enter Username" name="anh" >
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="luu">Đăng ký</button>
        </div>
      </form>
      <?php 
        include 'db.php';
        if (isset($_POST['luu'])) {
            $user=$_POST['usrname'];
            $pass=md5($_POST['psw']);
            $ten=$_POST['ten'];
            $email=$_POST['email'];
            $anha=$_FILES['anh']['name'];
            $tma=$_FILES['anh']['tmp_name'];
            move_uploaded_file($tma, "images/".$anha);

            $sql="insert into taikhoan values ('$user','$pass','$anha','$ten','$email',current_timestamp(),'')";
            $kq=$conn->query($sql);
            if ($kq) {
               	header("location:login.php");

            }else{
                echo "Sai tài khoản hoặc mật khẩu";
            }
        }
     ?>


      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey" id="cancel">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red" >Cancel</button>
      </div>

    </div>
  </div>
</div>
            
            
            </div>

</body>
</html>