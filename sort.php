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
        <a href="" class="icon fa-list" onclick="history.back()"><span>Назад</span></a>
        <a href="#sort" class="icon fa-sort active"><span>Сортированное</span></a>
    </nav>

    <!-- Main -->
    <div id="main">
        <article id="sort" class="panel">
            <header>
                <h2>Сортированный товар</h2>
            </header>
            <?php
            include_once 'dpanel/functions.php';

            switch($order = (string) @$_GET['order']) {
                case 'code_1':
                    $order = 'code';
                    $sort = 'ASC';
                    break;
                case 'code_2':
                    $order = 'code';
                    $sort = 'DESC';
                    break;
                case 'name_1':
                    $order = 'name';
                    $sort = 'ASC';
                    break;
                case 'name_2':
                    $order = 'name';
                    $sort = 'DESC';
                    break;
                case 'price_1':
                    $order = 'price';
                    $sort = 'ASC';
                    break;
                case 'price_2':
                    $order = 'price';
                    $sort = 'DESC';
                    break;
                default:
                    $order = 'id';
                    $sort = 'ASC';
            }

            $sort_text = "ORDER BY `$order` $sort";

            $res = $db->prepare("SELECT `id`,`code`,`name`,`price` FROM `warehouse` $sort_text");
            $res->execute();

            if($res){ ?>
            <table>
                <tr>
                    <th>Код товара</th>
                    <th>Наименование товара</th>
                    <th>Цена товара</th>
                </tr>
                <?php
                while($row = $res->fetch(PDO::FETCH_ASSOC)){	?>
                    <tr>
                        <td class="position"><? echo $row["code"] ?></td>
                        <td class="position"><a class="href2" href="view_product.php?id=<? echo $row["id"] ?>" ><? echo $row["name"] ?></a></td>
                        <td class="position"><? echo $row["price"] ?></td>
                    </tr>
                    <?
                } ?>
            </table><?
            } else {
                echo "<p>Товаров нет!</p>";
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