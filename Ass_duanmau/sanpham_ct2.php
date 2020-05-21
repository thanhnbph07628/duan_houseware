<?php ob_start() ?>
<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/w3c.css">
     <script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" type="text/css" href="css/sanpham_ctt.css">
</head>
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
            <h1>Danh mục</h1>
            <table>
                <?php 
                include 'db.php';
                $sql="select * from danhmuc";
                $kq=$conn->query($sql);
                foreach ($kq as $key => $value) {
                 ?>
                <tr>
                    <td><a href="listsanpham2.php?view=<?php echo $value['iddm'] ?>"><?php echo $value['tendm']; ?></a></td>
                </tr>
                <?php }

                 ?>
            </table>
            </div>
        </div>

        <!--Sản phẩm mới-->
        <div class="content-right">
        <?php 
            include 'db.php';
            if (isset($_GET['ma'])) {
                $ma=$_GET['ma'];
                $sqlsp="select * from sanpham where idsp='$ma'";
                $kqsp=$conn->query($sqlsp)->fetch();
            }
         ?>
        <div class="sanphamct">

        <div class="anhsp">
            <img src="admin/images/<?php echo $kqsp['anhsp'] ?>">
        </div>
        <div class="thongtinsp">
            <form>
            <h1><?php echo $kqsp['tensp'] ?></h1>
            <b style="margin-top: 0"><?php echo $kqsp['giakm'] ?> VNĐ</b>
            <del style="margin-top: 0"><?php echo $kqsp['giasp'] ?> VNĐ</del>
            <p style="margin-top: 10px">Số lượng còn:&nbsp<?php echo $kqsp['soluong'] ?></p>
            <div class="themgiohang" style="float: left; clear: both;">
            <button type="submit"><a href="#">Thêm vào giỏ hàng</a></button>
            </div>
            <div class="muangay" style="float: left; clear: both;">
            <button type="submit"><a href="#">Mua ngay</a></button>
            </div>
             <label style="clear: both; float: left; display: none;">View: <?php echo $kqsp['view'] ?>
              <?php
              include 'db.php'; 
              $vieww="update sanpham set view=view+1 where idsp ='$ma'";
              $kqview=$conn->prepare($vieww);
                     if($kqview->execute()){
                      }
                      else{
                          echo "lỗi";
                      }
              ?>
            </label>
            </form>
        </div>
         <div class="chitiet" style="clear: both;">
            <h2>Chi tiết sản phẩm</h2>
            <p><?php echo $kqsp['chitietsp'] ?></p>
        </div>

        <div class="comment" style="clear: both;">
          <hr style="width: 1022px;">
            <form method="POST" enctype="multipart/form-data">
            <h1>Bình luận</h1>
        <?php
        include 'db.php';
        $sql="select * from comment inner join sanpham on comment.idsp=sanpham.idsp where sanpham.idsp=$ma order by ngaycm desc";
        $kq=$conn->query($sql);
        foreach ($kq as $key => $value){
        ?>  
            <div class="use">
            <img src="admin/images/man.png" width="30px">
            <b><?php echo $value['user']; ?></b>
            <p><?php echo $value['ngaycm'] ?></p>
            <?php echo $value['noidung']; ?>
            <?php if (isset($_SESSION['taikhoan'])) { ?>
              <a href="xoabl.php?maxoa=<?php echo $value['idcm'] ?>" onclick="return confirm('Bạn có chắc muốn xóa')"> <input type="submit" value="Xóa" class="nutsx" style="border: 1px solid #fff; background-color: red; width: 30px; height: 20px; font-size: 13px; color: #fff;"></a>
              <?php } 
               ?>
            </div>
        <?php }
        ?>
            <textarea rows="10" id="nd" name="noidung"></textarea>
            <script>
 
           CKEDITOR.replace( 'nd' );
 
            </script>
            <input type="submit" name="luu" value="Lưu" style="padding: 5px 15px;background-color: #CDAD00; color: #fff; border: 1px solid #fff;">
            </form>
            <?php 
    
              if (isset($_POST['luu'])) {
                $noidung=$_POST['noidung'];
                $a=$_SESSION['user'];
                $sqlnd="insert into comment values('',current_timestamp(),'null','$noidung','$ma','$a')";
                $kqnd=$conn->query($sqlnd);
                if ($kqnd) {
                  header("refresh:0");
                }else{
                  echo "Lỗi bình luận";
                }
              } 
             ?>
            
        </div>


        </div>
        </div>
        </div>
        
        <hr>

         <div class="splienquan">
             <h1>Sản phẩm liên quan</h1>
            <div class="sp1">
            <a href="sanpham_ct.php"><img src="admin/images/sp2.jpg" width="200px" ></a>
            <div></div><br>
            <a href="sanpham_ct.php"><b>Bếp nướng thịt 2019</b></a>
            <p>5000000 Đ</p>
            <del>6500000 Đ</del>
            <button type="submit">Mua ngay</button>
            </div>

            <div class="sp1">
            <a href="sanpham_ct.php"><img src="admin/images/sp2.jpg" width="200px"></a>
            <div></div><br>
            <a href="sanpham_ct.php"><b>Bếp nướng thịt 2019</b></a>
            <p>5000000 Đ</p>
            <del>6500000 Đ</del>
            <button type="submit">Mua ngay</button>
            </div>

            <div class="sp1">
            <a href="sanpham_ct.php"><img src="admin/images/sp2.jpg" width="200px"></a>
            <div></div><br>
            <a href="sanpham_ct.php"><b>Bếp nướng thịt 2019</b></a>
            <p>5000000 Đ</p>
            <del>6500000 Đ</del>
            <button type="submit">Mua ngay</button>
            </div>

            <div class="sp1">
            <a href="sanpham_ct.php"><img src="admin/images/sp2.jpg" width="200px"></a>
            <div></div><br>
            <a href="sanpham_ct.php"><b>Bếp nướng thịt 2019</b></a>
            <p>5000000 Đ</p>
            <del>6500000 Đ</del>
            <button type="submit">Mua ngay</button>
            </div>

            <div class="sp1">
            <a href="sanpham_ct.php"><img src="admin/images/sp2.jpg" width="200px"></a>
            <div></div><br>
            <a href="sanpham_ct.php"><b>Bếp nướng thịt 2019</b></a>
            <p>5000000 Đ</p>
            <del>6500000 Đ</del>
            <button type="submit">Mua ngay</button>
            </div>
         </div>

         <hr style=" clear: both; border: 2px solid #ccc; margin-bottom: 20px; ">

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