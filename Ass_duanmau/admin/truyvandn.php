<?php
include 'db.php';
if (isset($_GET['dn'])) {
    $dn=$_GET['dn'];
}
    $sql="select * from taikhoan where user='$dn'";
    $kq=$conn->query($sql)->fetch();
    if ($kq['roles']==1) {
    	$sqlsua="UPDATE taikhoan SET roles ='0' WHERE user='$dn'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("Location:taikhoan.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
    else{
    	$sqlsua="UPDATE taikhoan SET roles='1' WHERE user='$dn'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("location:taikhoan.php");
                      }
                       else{
                          echo "lỗi";
                      }
            }
    ?>
