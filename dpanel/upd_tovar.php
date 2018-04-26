<?php
include_once 'functions.php';

$id = (int) $_GET['id'];

$res = $db->prepare("SELECT * FROM `wares` WHERE `id` = :id");
$res->execute(array(':id' => $id));
$row = $res->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Изменение товара</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="" class="icon fa-backward" onclick="history.back()"><span>К товару</span></a>
						<a href="#edit" class="icon fa-edit active"><span>Изменение</span></a>
					</nav>

				<!-- Main -->
					<div id="main">
                        <article id="edit" class="panel">
							<header>
								<h2>Изменение товара</h2>
							</header>

							<?	if(!isset($_POST['button'])){ ?>
								<form method="post">
									<div class="row">
										<div class="6u">
											<input type="text" name="code" placeholder="Код товара" value="<? echo $row['code'] ?>"/>
										</div>
										<div class="6u$">
											<input type="text" name="name" placeholder="Наименование" value="<? echo $row['name'] ?>"/>
										</div>
										<div class="6u">
											<input type="text" name="col" placeholder="Вес" value="<? echo $row['col'] ?>"/>
										</div>
										<div class="6u$">
											<input type="text" name="price" placeholder="Цена" value="<? echo $row['price'] ?>"/>
										</div>
										<div class="12u$">
                                            <input type="hidden" name="id" value="<? echo $id ?>">
											<input type="submit" name="button" value="Изменить товар"/>
										</div>
									</div>
								</form>
							<? } else {
								include_once 'db.php';

								$code = $_POST['code'];
								$name = $_POST['name'];
								$col = $_POST['col'];
								$price = $_POST['price'];
								$id = $_POST['id'];

								$res = $db->prepare('UPDATE `wares` SET `code`=?,`name`=?,`price`=?,`col`=?  WHERE `id`= ? ');
								$res->execute(array($code,$name,$price,$col,$id));

								$res = $db->prepare('UPDATE `warehouse` SET `code`= ?,`name`= ?,`price`= ? WHERE `id`= ?');
								$res->execute(array($code,$name,$price, $id));

								?>
								<p>Товар изменен! Можете вернуться к товару.</p>
							<? } ?>
                        </article>
					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; 2016.</li><li>vadimushka_d</li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>