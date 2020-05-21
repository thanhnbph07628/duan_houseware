<?php ob_start() ?>
<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <meta charset="utf-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="cs/suasp.css">
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
        <a href="sanpham.php"><input type="submit" name="" value="QUAY LẠI" style="border: 1px solid #fff;"></a><br><br>

       <?php
        include 'db.php';
        if(isset($_GET['masua'])){
            $masua=$_GET['masua'];
            $sql="select * from sanpham where idsp='$masua'";
            $kq=$conn->query($sql)->fetch();
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2 style="color: #CDAD00"> &nbsp&nbsp&nbspSỬA SẢN PHẨM</h2><br>
        <label>&nbsp&nbsp&nbspDanh mục</label>
        <select style="margin-left: 70px;" name="danhmuc">
        <?php 
        include 'db.php';
            if (isset($_GET['masua'])) {
            $masua=$_GET['masua'];
            $sqltt="select iddm from sanpham where idsp='$masua'";
            $kqtt=$conn->query($sqltt)->fetch();
            }
            ?>

            <?php 
                $sql='select * from danhmuc';
                $kq2=$conn->query($sql);
                foreach ($kq2 as $key => $value) {
             ?>
             
                 <option value="<?php echo $value['iddm'] ?>"  <?php echo $kqtt['iddm']==$value['iddm']?"selected":""; ?>><?php echo $value['tendm'] ?></option>
             <?php } 
              ?>
        </select><br>
        <input type="hidden" name="masp" style="width: 300px; height: 30px;" value="<?php echo $kq['idsp']?>"><br><br>

        &nbsp&nbsp&nbsp&nbspTên sản phẩm &nbsp<input type="text" name="tensp" required="" style="width: 300px; height: 30px; margin-left: 40px;" value="<?php echo $kq['tensp']?>"><br><br>
        &nbsp&nbsp&nbsp&nbspẢnh &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/<?php echo $kq['anhsp']?>" alt="" width="150px" style="margin-left: 80px;"><br>
        <input type="file" name="anhdd" style="margin-left:155px;"><br><br>
        &nbsp&nbsp&nbsp&nbspGiá sản phẩm &nbsp&nbsp&nbsp<input type="number" min="0" name="giasp" required="" style="width: 300px; height: 30px; margin-left: 35px;" value="<?php echo $kq['giasp']?>"><br><br>
        &nbsp&nbsp&nbsp&nbspGiá khuyến mãi &nbsp<input type="number" min="0" name="giakm" required="" style="width: 300px; height: 30px; margin-left: 28px;" value="<?php echo $kq['giakm']?>"><br><br>
        &nbsp&nbsp&nbsp&nbspSố lượng <input type="number" min="0" name="soluong" required="" style="width: 300px; height: 30px; margin-left: 75px;" value="<?php echo $kq['soluong'] ?>"><br><br>
        <label>&nbsp&nbsp&nbsp&nbspChi tiết sản phẩm</label><br><textarea rows="50" name="nd" id="nd"><?php echo $kq['chitietsp']; ?></textarea>
        <script>
 
           CKEDITOR.replace( 'nd' );
 
       </script>
        <br>
        
        <input type="submit" name="luu" value="Lưu" style="padding: 5px 15px;background-color: #CDAD00; color: #fff; border: 1px solid #fff;">
    </form>
    <?php
    if(isset($_POST['luu'])){
        $masp=$_POST['masp'];
        $tensp=$_POST['tensp'];
        $anha=$_FILES['anhdd']['name'];
        $tma=$_FILES['anhdd']['tmp_name'];
        $giasp=$_POST['giasp'];
        $giakm=$_POST['giakm'];
        $chitiet=$_POST['nd'];
        $soluong=$_POST['soluong'];
        $danhmuc=$_POST['danhmuc'];
        
        move_uploaded_file($tma,"images/".$anha);

        if(empty($anha)){
            $anha= $kq['anhsp'];
        }
        
    $sqlsua="update sanpham set tensp='$tensp', anhsp='$anha', giasp='$giasp', giakm='$giakm', chitietsp='$chitiet', soluong='$soluong', iddm='$danhmuc' where idsp='$masp'";
    $kqsua=$conn->prepare($sqlsua);
        if($kqsua->execute()){
            header("location:sanpham.php");
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