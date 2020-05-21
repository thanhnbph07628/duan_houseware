<?php require_once '../Pagination.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>page</title>
</head>

<body>
	<?php 
	$config = [
	'total' => 167, 
	'limit' => 7,
	'full' => true,
	'querystring' => 'trang'
	];
	$page = new Pagination($config);
	echo $page->getPagination();
	?>
</body>
</html>