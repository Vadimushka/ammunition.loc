<!DOCTYPE html>
<html>
<head>
    <title>Фильтрация товаров</title>
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
        <a href="#filter" class="icon fa-search active"><span>Фильтрация товаров</span></a>
    </nav>

    <!-- Main -->
    <div id="main">
        <article id="filter" class="panel">
            <header>
                <h2>Фильтрация товаров</h2>
            </header>

            <?php
            if(!isset($_POST['button'])){ ?>
                <form method="post">
                    <div class="row">
                        <div class="5u">
                            <label>
                                <select name="select">
                                    <option selected></option>
                                    <option value="col">Масса товара</option>
                                    <option value="code">Код товара</option>
                                    <option value="price">Цена товара</option>
                                </select>
                            </label>
                        </div>
                        <div class="2u">
                            <label><input type="text" name="min" placeholder="мин. знач"></label>
                        </div>
                        <div class="2u">
                            <label><input type="text" name="max" placeholder="макс. знач"></label>
                        </div>
                        <div class="2u">
                            <input type="submit" name="button" value="Фильтровать">
                        </div>
                    </div>
                </form><?
            } else {
                include_once 'dpanel/functions.php';

                $field = $_POST ['select'];

                $min = $_POST ['min'];
                $max = $_POST ['max'];

                $where = " `$field` > " . $min . " AND `$field` < " . $max;
                $order = "ORDER BY `$field` ASC";


            $res = $db->prepare("SELECT * FROM `wares` WHERE $where $order");
            $res->execute();

            if($res){ ?>
            <table>
                <tr>
                    <th>Код товара</th>
                    <th>Наименование товара</th>
                </tr>
                <?php
                while($row = $res->fetch(PDO::FETCH_ASSOC)){	?>
                    <tr>
                        <td class="position color"><? echo $row["code"] ?></td>
                        <td class="position"><a href="view_product.php?id=<? echo $row["id"] ?>" ><? echo $row["name"] ?></a></td>
                    </tr>
                    <?
                }?>
            </table><?
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