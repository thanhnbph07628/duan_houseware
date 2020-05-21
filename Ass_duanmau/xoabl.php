<?php 
	include 'db.php';
	if (isset($_GET['maxoa'])) {
	$maxoa=$_GET['maxoa'];
	$sql="delete from comment where idcm='$maxoa'";
	$kq=$conn->prepare($sql);
	if ($kq->execute()) {
		header('location:sanpham_ct2.php');
	}else{
		echo "Lỗi";
	}
}
 ?>