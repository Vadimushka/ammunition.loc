<!DOCTYPE html>
<html>
	<head>
		<title>Добавление товара</title>
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
						<a href="" class="icon fa-folder" onclick="history.back()"><span>Назад</span></a>
						<a href="#add" class="icon fa-building active"><span>Добавление</span></a>
					</nav>

				<!-- Main -->
					<div id="main">
                        <article id="add" class="panel">
							<? if(!isset($_POST['button'])){ ?>
								<header>
									<h2>Добавление товара</h2>
								</header>

								<form method="post">
									<div class="row">
										<div class="4u">
											<input type="text" name="code" placeholder="Код товара"/>
										</div>
										<div class="4u">
											<input type="text" name="name" placeholder="Наименование"/>
										</div>
										<div class="4u">
											<input type="text" name="sort" placeholder="Сорт"/>
										</div>
										<div class="6u">
											<input type="text" name="col" placeholder="Масса [кг.|л.|шт.]*"/>
										</div>
										<div class="6u$">
											<input type="text" name="price" placeholder="Цена"/>
										</div>
										<div class="12u">										
											* - напишите значение массы и чем измеряется
										</div>									
										<div class="12u">										
											<input type="submit" name="button" value="Добавить товар"/>
											<input type="reset" value="Сбросить"/>
										</div>									
									</div>
								</form>
							<? } else {
							include_once 'functions.php';

							$code = $_POST['code'];
							$name = $_POST['name'];
							$sort = $_POST ['sort'];
							$col = $_POST['col'];
							$price = $_POST['price'];
							if(!empty($sort)){
								$name = $name . " " .$sort;
							}

							$date = new DateTime();

							$res = $db->prepare("INSERT INTO `wares`(`code`, `name`, `date`, `col`, `price`) VALUES (?,?,?,?,?)");
							$res->execute(array($code,$name, $date->format('Y-m-d'), $col, $price));

							$res = $db->prepare("INSERT INTO `warehouse`(`code`, `name`, `price`) VALUES (?,?,?)");
							$res->execute(array($code,$name,$price));
							?>
							<header>
								<h2>Товар добавлен</h2>
							</header>

							<p>Дальнейшие операции</p>
							<p><a href="add_wares.php">Добавить еще товар</a></p>
						</article>
						<? } ?>
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