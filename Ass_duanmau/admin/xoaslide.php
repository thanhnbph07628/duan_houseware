<?php 
include 'db.php';
if (isset($_GET['maxoa'])) {
	$maxoa=$_GET['maxoa'];
	$sql="delete from slider where idslide='$maxoa'";
	$kq=$conn->prepare($sql);
	if ($kq->execute()) {
		header('location:slide.php');
	}else{
		echo "Lỗi";
	}
}
 ?>