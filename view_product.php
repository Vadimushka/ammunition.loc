<!DOCTYPE html>
<html>
<head>
    <title>Просмотр товара</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Nav -->
    <nav id="nav">
        <a href="" class="icon fa-list" onclick="history.back()"><span>На склад</span></a>
        <a href="#view" class="icon fa-bookmark active"><span>Просмотр</span></a>
    </nav>

    <!-- Main -->
    <div id="main">
        <article id="view" class="panel">
            <header>
                <h2>Просмотр товара</h2>
            </header>
            <?php
            include_once 'dpanel/functions.php';

            $id = (int) $_GET['id'];

            $res = $db->prepare("SELECT * FROM `wares` WHERE `id` = :id");
            $res->execute(array(':id' => $id));

            if($res){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $date = new DateTime($row['date']);

                    $col = explode(" ",$row["col"]);

                    ?>
                    <p>Код товара: <span style="color: black"><? echo $row["code"] ?></span><br />
                    Наименование товара: <span style="color: crimson"><? echo $row["name"] ?></span><br />
                    Вес товара: <? echo $row["col"] ?><br />
                    Цена товара: <? echo $row["price"] ?> руб. за 1 шт.<br />
                    Сумма = <? echo ($col[0] * $row["price"])  ?> руб.<br />
                    Дата получения: <? echo $date->format('d M Y') ?> г.</p>

                    <p><a href="dpanel/upd_tovar.php?id=<? echo $row["id"] ?>" class="icon fa-edit" title="Изменить"></a> |
                        <a href="dpanel/del_tovar.php?id=<? echo $row["id"] ?>" class="icon fa-remove" title="Удалить"></a></p>
                    <?
                }
            } else {
                echo "<p>Товара нет!</p>";
            }

            ?>
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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/skel-viewport.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>