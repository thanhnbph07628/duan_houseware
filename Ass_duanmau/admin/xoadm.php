<?php 
	include 'db.php';
	if (isset($_GET['maxoa'])) {
		$maxoa=$_GET['maxoa'];
		$sql="delete from danhmuc where iddm='$maxoa'";
		$kq=$conn->prepare($sql);
		if ($kq->execute()) {
			header("location:danhmuc.php");
		}else{
			echo "Không thể xóa"; ;
		}
	}
 ?>