<!DOCTYPE html>
<html>
<head>
    <title>Поиск товара</title>
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
        <a href="#search" class="icon fa-search active"><span>Поиск</span></a>
    </nav>

    <!-- Main -->
    <div id="main">
        <article id="search" class="panel">
            <header>
                <h2>Поиск товара</h2>
            </header>


            <?php
            if(!isset($_POST['button'])){ ?>
                <form method="post">
                    <div class="row">
                        <div class="10u">
                            <input type="text" name="search_name" placeholder="Введите название товара">
                        </div>
                        <div class="2u">
                            <input type="submit" name="button" value="ОК">
                        </div>
                    </div>
                </form><?
            } else {
            include_once 'dpanel/functions.php';

            $search_name = $_POST ['search_name'];

            $search_text = " LIKE '%$search_name%'";
            $res = $db->prepare("SELECT * FROM `warehouse` WHERE `name` $search_text");
            $res->execute();

            if ($res){ ?>
            <table>
                <tr>
                    <th>Код товара</th>
                    <th>Наименование товара</th>
                    <th>Цена товара</th>
                </tr>
                <?php
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td class="position color"><? echo $row["code"] ?></td>
                        <td class="position"><a
                                href="view_product.php?id=<? echo $row["id"] ?>"><? echo $row["name"] ?></a></td>
                        <td class="position"><? echo $row["price"] ?> руб.</td>
                    </tr>

                    <?
                } ?>
            </table><?
            } else {
                echo "<p>Товаров нет!</p>";
            }
            } ?>
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