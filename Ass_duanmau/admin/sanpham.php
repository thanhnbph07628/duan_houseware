<?php 
session_start();
 ?>
 <?php include 'phantrang/Pagination.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SẢN PHẨM</title>
    <link rel="stylesheet" type="text/css" href="cs/sanpham1.css">
</head>
<style type="text/css" media="screen">
    .phantrang{margin-left: 500px; margin-top: 20px; margin-bottom: 70px}
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
       
        <table>
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
        <a href="themsp.php"><input type="submit" name="" value="THÊM SẢN PHẨM" style="border: 1px solid #fff; margin-bottom: 20px; background-color:  #09adc4;"></a>
    
    <table cellpadding="0" cellspacing="0" border="1" >
        <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Info</th>
            <th>Giá khuyến mãi</th>
            <th>Danh mục</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
        include 'db.php';
        $sql="select * from sanpham";
        $kq=$conn->query($sql);
        foreach ($kq as $key => $value){
        ?>  
        <tr>
            <td> <?php echo $value['idsp'] ?> </td>
            <td> <?php echo $value['tensp'] ?></td>
            <td><img src="images/<?php echo $value['anhsp'] ?>" alt="" width="150px"> </td>
            <td><ul style="float: left; margin-left: 30px"><li>Giá:&nbsp<?php echo $value['giasp'] ?></li><br>
                <li>Số lượng:&nbsp<?php echo $value['soluong'] ?></li><br>
                <li>Lượt xem:&nbsp<?php echo $value['view'] ?></li>
            </ul></td>
            <td> <?php echo $value['giakm']; ?> </td>
            <td> 

                <?php 
                    include 'db.php';
                    $sql='select * from danhmuc where iddm='.$value['iddm'];
                    $kq=$conn->query($sql)->fetch();

                 ?>

                 <?php echo $kq['tendm']; ?>
            </td>
            <td> <a href="suasp.php?masua=<?php echo $value['idsp'] ?>"><input type="submit" value="Sửa" class="nutsx" style="border: 1px solid #fff; background-color:  #09adc4;"></a> </td>
            <td><a href="xoasp.php?maxoa=<?php echo $value['idsp'] ?>" onclick="return confirm('Bạn có chắc muốn xóa')"> <input type="submit" value="Xóa" class="nutsx" style="border: 1px solid #fff; background-color: red;"></a> </td>
        </tr>
        <?php }
        ?>
    </table>
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