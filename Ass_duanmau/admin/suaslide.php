<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="cs/suatt.css">
</head>
<body>
    <div class="main">
    <div class="head-link">
        <ul>
            <b><a href="quantri.php">BELONGINGS</a></b>

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
        <a href="slide.php"><input type="submit" name="" value="QUAY LẠI" style="border: 1px solid #fff;"></a><br><br>

       <?php
        include 'db.php';
        if(isset($_GET['masua'])){
            $masua=$_GET['masua'];
            $sql="select * from slider where idslide='$masua'";
            $kq=$conn->query($sql)->fetch();
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2 style="color: #CDAD00"> &nbsp&nbsp&nbspSỬA SLIDE</h2>
        <input type="hidden" name="idslide" value="<?php echo $kq['idslide']?>"><br>
        Tiêu đề &nbsp<input type="text" name="tieude" style="width: 300px; height: 30px;" value="<?php echo $kq['tieude']?>"><br><br>
        Ảnh &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/<?php echo $kq['anh']?>" alt="" width="300px"><br><br>
        <input type="file" name="anhslide"><br><br>
        Thêm link&nbsp&nbsp&nbsp <input type="text" name="link" value="<?php echo $kq['link'] ?>" style="width: 300px; height: 30px;" required><br><br>
        <input type="submit" name="luu" value="Lưu" style="padding: 5px 15px;background-color: #CDAD00; color: #fff; border: 1px solid #fff;">
    </form>
    <?php
    if(isset($_POST['luu'])){
        $idslide=$_POST['idslide'];
        $tieude=$_POST['tieude'];
        $anha=$_FILES['anhslide']['name'];
        $tma=$_FILES['anhslide']['tmp_name'];
        $link=$_POST['link'];

        move_uploaded_file($tma,"images/".$anha);

        if(empty($anha)){
            $anha= $kq['anh'];
        }
        
    $sqlsua="update slider set tieude='$tieude', anh='$anha',link='$link' where idslide='$idslide'";
    $kqsua=$conn->prepare($sqlsua);
        if($kqsua->execute()){
            header("location:slide.php");
        }else{
            echo "lỗi";
        }
            }
    ?>
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