<?php ob_start(); ?>
<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <meta charset="utf-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="cs/themsp.css">
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

        <form action="" method="POST" enctype="multipart/form-data" >
        <h2 style="color: #CDAD00">&nbsp&nbsp&nbspTHÊM SẢN PHẨM</h2><br>
        <input type="hidden" name="idsp"><br>
        &nbsp&nbsp&nbspTên sản phẩm &nbsp <input type="text" name="tensp" required="" style="width: 300px; height: 30px; margin-left: 40px;"><br><br>
        &nbsp&nbsp&nbspẢnh &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" name="anhsp" required="" style="margin-left: 82px;"><br><br>
        &nbsp&nbsp&nbspGiá sản phẩm &nbsp&nbsp&nbsp<input type="number" min="0" name="giasp" required="" style="width: 300px; height: 30px; margin-left: 38px;"><br><br>
        &nbsp&nbsp&nbspGiá khuyến mãi &nbsp<input type="number" min="0" name="giakm" required="" style="width: 300px; height: 30px; margin-left: 30px;"><br><br>    
        &nbsp&nbsp&nbspSố lượng <input type="number" min="0" name="soluong" required="" style="width: 300px; height: 30px; margin-left: 78px;"><br><br>
        <label>&nbsp&nbsp&nbspDanh mục</label>
        <select style="margin-left: 70px;" name="danhmuc" required="">
            <?php 
                include 'db.php';
                $sql='select * from danhmuc';
                $kq=$conn->query($sql);
                foreach ($kq as $key => $value) {
             ?>
                 <option value="<?php echo $value['iddm'] ?>"><?php echo $value['tendm'] ?></option>
             <?php } 
              ?>
        </select><br><br>
        <label>&nbsp&nbsp&nbspChi tiết sản phẩm </label><br><textarea rows="5" name="nd" id="nd" required=""></textarea>
        <script>
 
           CKEDITOR.replace( 'nd' );
 
       </script>
        <br>
        <input type="hidden" name="view"><br>
        <input type="submit" name="luu" value="Lưu" style="padding: 5px 15px;background-color: #CDAD00; color: #fff; border: 1px solid #fff;">
    </form>
    <?php  
    include 'db.php';
    if(isset($_POST['luu'])){
        $idsp=$_POST['idsp'];
        $tensp=$_POST['tensp'];
        $anha=$_FILES['anhsp']['name'];
        $tma=$_FILES['anhsp']['tmp_name'];
        $giasp=$_POST['giasp'];
        $giakm=$_POST['giakm'];
        $soluong=$_POST['soluong'];
        $danhmuc=$_POST['danhmuc'];
        $noidung=$_POST['nd'];
        $view=$_POST['view'];
        $checkimg = array("image/png", "image/jpeg", "image/gif");
        $typeimg = $_FILES["anhsp"]["type"];
         move_uploaded_file($tma,"images/".$anha);
           if(!in_array("$typeimg",$checkimg)){
            echo "Sai định dạng ảnh";
               }else{       
        $sql="insert into sanpham values('$idsp', '$tensp', '$anha', '$giasp', '$giakm', '$view', '$noidung', '$soluong', '$danhmuc')";
        $kq=$conn->exec($sql);
        if ($kq==1) {
            header("location:sanpham.php");
        }else{
            echo "Không thể thêm sản phẩm";
        }
    }}
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