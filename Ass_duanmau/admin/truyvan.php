<?php
include 'db.php';
if (isset($_GET['anhien'])) {
    $anhien=$_GET['anhien'];
}
    $sql="select * from slider where idslide='$anhien'";
    $kq=$conn->query($sql)->fetch();
    if ($kq['trangthai']==1) {
    	$sqlsua="UPDATE slider SET trangthai ='0' WHERE idslide='$anhien'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("Location:slide.php");
                      }
                      else{
                          echo "lỗi";
                      }
            }
    else{
    	$sqlsua="UPDATE slider SET trangthai='1' WHERE idslide='$anhien'";
    	$kqsua=$conn->prepare($sqlsua);
                     if($kqsua->execute()){
                     echo "thành công";
                     header("location:slide.php");
                      }
                       else{
                          echo "lỗi";
                      }
            }
    ?>