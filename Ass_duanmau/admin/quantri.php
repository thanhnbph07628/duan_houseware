<?php 
    session_start();
 ?>
  <?php 
 if (isset($_SESSION["user"]) && $_SESSION["roles"]==1) {
}else{
    header("Location:../index2.php");
}

  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quản trị</title>
    <link rel="stylesheet" type="text/css" href="cs/index.css">
</head>
<body>
    <div class="main">
    <div class="head-link">
        <ul>
            <b><a href="../index2.php">BELONGINGS</a></b>

           <div style="float: right; color: #fff">
            <?php if(isset($_SESSION['taikhoan'])){
            echo "Xin chào ".$_SESSION['taikhoan'];
            }
            ?>
            </div>
        </ul>
    </div>
    
    <div class="left">
       
        <table >
            <tr style="background-color: #008091">
                <td><a href="quantri.php"> QUẢN TRỊ CHUNG </a></td>
            </tr>
            <tr style="background-color: #09adc4">
                <td><a href="danhmuc.php" > DANH MỤC </a></td>
            </tr>
            <tr style="background-color: #008091">
                <td><a href="sanpham.php" > SẢN PHẨM </a></td>
            </tr>
            <tr style="background-color: #09adc4">
                <td><a href="slide.php"> SLIDE </a></td>
            </tr>
            <tr style="background-color: #008091">
                <td><a href="taikhoan.php"> TÀI KHOẢN </a></td>
            </tr>
            <tr style="background-color: #09adc4">
                <td><a href="comment.php"> BÌNH LUẬN </a></td>
            </tr>
        </table>
    </div>

    <!--Main-->
    <div class="content">
        <img src="images/banner3.jpg" width="745px;">
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
    <hr style="clear: both;" />
    <div class="duoihr">
        Copyright © 2008 Công ty Cổ Phần Thương Mại Điện Tử.<br><br>
        Địa chỉ văn phòng: Phòng L4A-14, Tầng 4A, Vincom Center, 72 Lê Thánh Tôn, Phường Bến Nghé, Quận 1, TP.HCM<br><br>
        Điện thoại: 028 7302 0707
    </div>
    <div class="logomxh">
        <a href="#"><img src="images/Google.png" width="50px" height="50px"></a>
        <a href="#"><img src="images/zalo.png" width="50px" height="50px"></a>
        <a href="#"><img src="images/Twitter-PNG-HD-1.png" width="50px" height="50px"></a>
    </div>
    </div>
</div>
</body>
</html>