<?php ob_start() ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/w3c.css">
	<meta charset="utf-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="css/listindex.css">
</head>
<body>
	<div class="main">
	<div class="head-link">
    	<ul>
    		<b><a href="index.php">BELONGINGS</a></b>
    		<li><a href="index.php" style="margin-left: 50px;">Trang chủ</a></li>
            
            <div class="timkiem">
                <form>
                    <input type="text" name="tk" placeholder="Nhập nội dung" required class="w3-input w3-white w3-round-large" >
                <p ><button class="w3-button w3-#CDAD00 w3-round-large" ><p>Tìm kiếm</p></button></p>
                </form>
                <div style="float: right; margin-right: -340px">
                <a href="login.php"><p><button class="w3-button w3-red w3-round-large" ><p>Đăng nhập</p></button></p></a>
                </div>
            </div>
    	</ul>
    </div>

    <div class="banner">
  <div class="w3-content w3-display-container" style="max-width:1347px">
    <?php 
      include 'db.php';
      $sqlslide="select * from slider";
      $kqlslide=$conn->query($sqlslide);
      foreach ($kqlslide as $key => $value) {

     ?>
     <?php 
        if ($value['trangthai']==1) {
         
  
      ?>
  <a href="<?php echo $value['link'] ?>"><img class="mySlides" src="admin/images/<?php echo $value['anh'] ?>" style="width:1347px"></a>

  <?php 
      }}
   ?>
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
    </div>
    
    <div class="content">

        <div class="content-left">


            <div class="danhmuc" style="margin-top: -10px">
            <h1 style="font-size: 30px;">Danh mục</h1>
            <table >

            <?php 
                include 'db.php';
                $sql="select * from danhmuc";
                $kq=$conn->query($sql);
                foreach ($kq as $key => $value) {
             ?>

                <tr>
                    <td><a href="listsanpham.php?view=<?php echo $value['iddm'] ?>"><?php echo $value['tendm'] ?></a></td>
                </tr>
            <?php }

             ?>

            </table>
            </div>


            <div class="spnoibat">
                <h1 style="font-size: 30px;">Sản phẩm nổi bật</h1>
                 <table >
                <tr>
                    <td><a href="#"><img src="admin/images/tulanh.jpg" width="40px"><p>Tủ lạnh</p></a></td>
                </tr>
                <tr>
                    <td><a href="#"><img src="admin/images/tulanh.jpg" width="40px"><p>Tủ lạnh</p></a></td>
                </tr>
                <tr>
                    <td><a href="#"><img src="admin/images/tulanh.jpg" width="40px"><p>Tủ lạnh</p></a></td>
                </tr>
                <tr>
                    <td><a href="#"><img src="admin/images/tulanh.jpg" width="40px"><p>Tủ lạnh</p></a></td>
                </tr>
                <tr>
                    <td><a href="#"><img src="admin/images/tulanh.jpg" width="40px"><p>Tủ lạnh</p></a></td>
                </tr>
            </table>
            </div>
        </div>
    	<!--Sản phẩm mới-->
        <div class="content-right">
    	<div class="spm" >
    		<h1>Tất cả sản phẩm</h1>
            
            <?php 
                include 'db.php';
                if (isset($_GET['view'])) {
                    $view=$_GET['view'];
                }
                $sql="select * from sanpham where iddm=$view";
                $kqsp=$conn->query($sql);
                foreach ($kqsp as $key => $value) {
             ?>
    	<div class="sp1" >
    		<a href="sanpham_ct.php?ma=<?php echo $value['idsp'] ?>"><img src="admin/images/<?php echo $value['anhsp'] ?>" width="200px"></a>
    		<div></div><br>
    		<a href="sanpham_ct.php?ma=<?php echo $value['idsp'] ?>"><b style="clear: both;margin-left: 25px; float: left;"><?php echo $value['tensp'] ?></b></a>
    		<p style="clear: both;margin-left: 25px">Giá: <?php echo $value['giasp'] ?> VNĐ</p>
            <del style="clear: both;margin-left: 25px">KM: <?php echo $value['giakm'] ?> VNĐ</del>
            
            <a href="sanpham_ct.php?ma=<?php echo $value['idsp'] ?>"><button type="submit">Mua ngay</button></a>
    	</div>

        <?php }

         ?>

    	</div>
        </div>
    	</div>
    	


    <!--Footer-->
    	<div class="footer2">
    	<div class="gioithieu" style="color: white">
            <b>GIỚI THIỆU</b><br><br>
            Giới thiệu về TGNH<br>
            Quan điểm kinh doanh<br>
            Bản quyền & Sở hữu
        </div>
        <div class="chinhsachcongty">
            
        <b>CHÍNH SÁCH CÔNG TY</b><br><br>
        Điều khoản sử dụng<br>
        Chính sách bảo mật thông tin<br>
        Chính sách giao hàng<br>
        Chính sách bảo hành<br>
        Chính sách đổi trả<br>
        Nhượng Quyền Thương Hiệu
        </div>
    <div class="trogiup">
        <b>TRỢ GIÚP</b><br><br>
        Hướng dẫn sử dụng <br>
        Hướng dẫn mua hàng<br>
        Phương thức thanh toán<br>
        Gói quà miễn phí
    </div>
    <div class="thongtinkhac">
        <b>THÔNG TIN KHÁC</b><br><br>
        Hoạt động TGNH<br>
        Member Card<br>
        Gift Voucher<br>
        Tuyển dụng
    </div>
    <div class="thongtinkhac">
        <b>LIÊN HỆ</b><br><br>
        Điện thoại: 035 3222 581<br>
        Email: thanh@gmail.com<br>
        Địa chỉ: Hà Nội<br>
    </div>
    <hr style="clear: both;" />
    <div class="duoihr">
        Copyright © 2008 Công ty Cổ Phần Thương Mại Điện Tử.<br><br>
        Địa chỉ văn phòng: Phòng L4A-14, Tầng 4A, Vincom Center, 72 Nguyễn Trãi, Phường Thanh Xuân, Hà Nội<br><br>
        Điện thoại: 028 7302 0707
    </div>
    <div class="logomxh">
        <a href="#"><img src="admin/images/Google.png" width="50px" height="50px"></a>
        <a href="#"><img src="admin/images/zalo.png" width="50px" height="50px"></a>
        <a href="#"><img src="admin/images/Twitter-PNG-HD-1.png" width="50px" height="50px"></a>
    </div>
    </div>
    
</div>



</body>
</html>