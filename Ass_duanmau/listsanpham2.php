<?php ob_start() ?>
<?php 
  session_start();
 ?>
 <?php include 'admin/phantrang/Pagination.php' ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/w3c.css">
	<meta charset="utf-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="css/listindex.css">
</head>
<style type="text/css">
  .phantrang{margin-left: 650px; margin-top: 880px; margin-bottom: 70px}
    .phantrang ul{
        list-style: none;
    }
    .phantrang ul:after{
        clear: both;
    }
     .phantrang ul li{
        background: #dddddd;
        width: 35px;
        height: 30px;
        line-height: 30px;
        float: left;
        text-align: center;
        margin-right: 1px;
    }
     .phantrang a{
        text-decoration: none;
    }
     .phantrang ul li.active{
        color:white;
        background: blue;
    }
    .active a{
        color:white;
    }
</style>
<body>
	<div class="main">
	<div class="head-link" >
        <ul>
            <b><a href="index2.php">BELONGINGS</a></b>
            <li><a href="index2.php" style="margin-left: 50px;">Trang chủ</a></li>
            
            <div class="timkiem">
                <form>
                    <input type="text" name="tk" placeholder="Nhập nội dung" required class="w3-input w3-white w3-round-large" >
                <p><button class="w3-button w3-#CDAD00 w3-round-large" style="float: left;margin-top: 6px; margin-right: 170px;"><p>Tìm kiếm</p></button></p>
                </form>
                <a href="dangxuat.php"><p><button class="w3-button w3-red w3-round-large" style="float: right; margin-right: -190px; margin-top: -29px;"><p>Đăng xuất</p></button></p></a>
            </div>
            
            <div style="color: #fff;  float: left; margin-left: -50px;">
              <?php 
                include 'db.php';
                $sqla="select * from taikhoan ";
                $kqa=$conn->query($sqla)->fetch();
               ?>
              <img src="admin/images/man.png" width="20px;" style="margin-right: 5px; margin-top: -3px;">|&nbsp&nbsp&nbsp&nbsp
             <?php if(isset($_SESSION['taikhoan'])){
            echo "Xin chào: ".$_SESSION['taikhoan'];
            }
            ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|
            </div>

            <a href="admin/quantri.php" style="float: right; margin-left: 40px;">Quản trị</a>

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


            

            <div class="danhmuc">
            <h1 style="font-size: 30px;">Danh mục</h1>
            <table >

            <?php 
                include 'db.php';
                $sql="select * from danhmuc";
                $kq=$conn->query($sql);
                foreach ($kq as $key => $value) {
             ?>

                <tr>
                    <td><a href="listsanpham2.php?view=<?php echo $value['iddm'] ?>"><?php echo $value['tendm'] ?></a></td>
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
    		<a href="sanpham_ct2.php?ma=<?php echo $value['idsp'] ?>"><img src="admin/images/<?php echo $value['anhsp'] ?>" width="200px"></a>
    		<div></div><br>
    		<a href="sanpham_ct2.php?ma=<?php echo $value['idsp'] ?>"><b style="clear: both;margin-left: 25px; float: left;"><?php echo $value['tensp'] ?></b></a>
    		<p style="clear: both;margin-left: 25px">Giá: <?php echo $value['giasp'] ?> VNĐ</p>
            <del style="clear: both;margin-left: 25px">KM: <?php echo $value['giakm'] ?> VNĐ</del>
            <a href="sanpham_ct.php?ma=<?php echo $value['idsp'] ?>"><button type="submit">Mua ngay</button></a>
    	</div>

        <?php }

         ?>

    	</div>
        </div>
        <div class="phantrang">
    <?php 
    $config = [
    'total' => 167, 
    'limit' => 4,
    'full' => false,
    'querystring' => 'trang'
    ];
    $page = new Pagination($config);
    echo $page->getPagination();
    ?>
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