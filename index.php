<!DOCTYPE html>
<html>
<head>
    <title>Учёт товаров</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <noscript><link rel="stylesheet" href="assets/css/noscript.css"/></noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
    <script src="assets/js/select.js"></script>
</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Nav -->
    <nav id="nav">
        <a href="#me" class="icon fa-home active"><span>Главная</span></a>
        <a href="#warehouse" class="icon fa-list"><span>Склад</span></a>
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Me -->
        <article id="me" class="panel">
            <header>
                <h1>Учёт товаров</h1>
                <p>на оптовом складе</p>
            </header>
            <a href="#warehouse" class="jumplink pic">
                <span class="arrow icon fa-chevron-right"><span>Перейти на склад.</span></span>
                <img src="images/me.jpg" alt=""/>
            </a>
        </article>

        <!-- warehouse -->
        <article id="warehouse" class="panel">
            <header>
                <h2>Склад</h2>
            </header>
            <p>
                Вы можете <a href="dpanel/add_wares.php">Добавить товар</a> .<br/>
                А также вы можете <a href="search_wares.php">Искать товар</a>, <a href="filter_wares.php">Фильтровать
                    товар</a>.
            </p>

            <?php
            include_once 'dpanel/functions.php';

            $res = $db->prepare("SELECT `id`,`code`,`name`,`price` FROM `warehouse`");
            $res->execute();

            if ($res) { ?>
                <hr/>
                <table>
                    <tr>
                        <th>
                            <a href="sort.php?order=code_1" class="icon fa-arrow-down" title="По возрастанию"></a>
                            Код товара
                            <a href="sort.php?order=code_2" class="icon fa-arrow-up"></a>
                        </th>
                        <th>
                            <a href="sort.php?order=name_1" class="icon fa-arrow-down" title="По возрастанию"></a>
                            Наименование товара
                            <a href="sort.php?order=name_2" class="icon fa-arrow-up" title="По убыванию"></a>
                        </th>
                        <th>
                            <a href="sort.php?order=price_1" class="icon fa-arrow-down" title="По возрастанию"></a>
                            Цена товара
                            <a href="sort.php?order=price_2" class="icon fa-arrow-up" title="По убыванию"></a>
                        </th>
                    </tr>
                    <?php
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="position color"><? echo $row["code"] ?></td>
                            <td class="position"><a class="href2"
                                                    href="view_product.php?id=<? echo $row["id"] ?>"><? echo $row["name"] ?></a>
                            </td>
                            <td class="position"><? echo $row["price"] ?> руб.</td>
                        </tr>
                        <?
                    } ?>
                </table>
                <?
            } else {
                echo "<p>Товаров нет!</p>";
            }
            ?>
        </article>
    </div>

    <!-- Footer -->
    <div id="footer">
        <ul class="copyright">
            <li>&copy; 2016.</li>
            <li>vadimushka_d</li>
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