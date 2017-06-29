<!doctype html>
<?php
require_once 'tool.php';

$page = 1;
$type = 'top';
if (is_array($_GET) && count($_GET) > 0) {
    if (isset($_GET["page"]) && $_GET['page']) {
        $page = $_GET['page'];
    }
    if (isset($_GET["type"]) && $_GET["type"]) {
        $type = $_GET['type'];
    }
}
$typeId = get_type($type);
?>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--360 browser -->
    <meta name="renderer" content="webkit">
    <meta name="author" content="wos">
    <!-- Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/i/app.png">
    <!--Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="images/i/app.png">
    <!--Win8 or 10 -->
    <meta name="msapplication-TileImage" content="images/i/app.png">
    <meta name="msapplication-TileColor" content="#e1652f">

    <link rel="icon" type="image/png" href="images/i/favicon.png">
    <link rel="stylesheet" href="assets/css/amazeui.css">
    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="assets/js/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="jquery-3.2.1.min.js"></script>
    <！--script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script-->
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script src="assets/js/amazeui.min.js"></script>
    <script src="js/public.js"></script>
</head>
<body>

<header class="am-topbar am-topbar-fixed-top wos-header">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a href="#"><img src="images/logo.png" alt=""></a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-warning am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">

                <li><a href="index.php">首页</a></li>
                <li <?php if ($typeId == TOP) echo 'class = "am-active"' ?>><a href="list.php?type=top">头条</a></li>
                <li <?php if ($typeId == FINANCIAL) echo 'class = "am-active"' ?>><a href="list.php?type=financial">财经</a></li>
                <li <?php if ($typeId == SPORT) echo 'class = "am-active"' ?>><a href="list.php?type=sport">体育</a></li>
                <li <?php if ($typeId == ENTERTAINMENT) echo 'class = "am-active"' ?>><a href="list.php?type=entertainment">娱乐</a></li>
                <li <?php if ($typeId == MILITARY) echo 'class = "am-active"' ?>><a href="list.php?type=military">军事</a></li>
                <li <?php if ($typeId == EDUCATION) echo 'class = "am-active"' ?>><a href="list.php?type=education">教育</a></li>
                <li <?php if ($typeId == TECHNOLOGY) echo 'class = "am-active"' ?>><a href="list.php?type=technology">科技</a></li>
                <li <?php if ($typeId == NBA) echo 'class = "am-active"' ?>><a href="list.php?type=nba">NBA</a></li>
                <li <?php if ($typeId == STOCK) echo 'class = "am-active"' ?>><a href="list.php?type=stock">股票</a></li>
                <li <?php if ($typeId == CONSTELLATION) echo 'class = "am-active"' ?>><a href="list.php?type=constellation">星座</a></li>
                <li <?php if ($typeId == FEMALE) echo 'class = "am-active"' ?>><a href="list.php?type=female">女性</a></li>
                <li <?php if ($typeId == HEALTH) echo 'class = "am-active"' ?>><a href="list.php?type=health">健康</a></li>
                <li <?php if ($typeId == PARENTING) echo 'class = "am-active"' ?>><a href="list.php?type=parenting">育儿</a></li>
            </ul>

            <div class="am-topbar-right">
                <a href="register.php"><button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注册</button></a>
            </div>

            <div class="am-topbar-right">
                <a href="login.php"><button class="am-btn am-btn-danger am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</button></a>
            </div>
        </div>
    </div>
</header>

<?php
require_once 'newsAPI.php';

$mysql = new mysqli("localhost", "root", "shouse", "news");
$mysql->query("SET NAMES utf8");
?>
<div class="am-g am-container padding-none">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
        <div data-am-widget="list_news" class="am-list-news am-list-news-default ">
            <div class="am-list-news-bd">
                <?php
                $sql = "SELECT COUNT(*) AS count FROM $type";
                $result = $mysql->query($sql);
                $row = $result->fetch_assoc();
                $pageCount = ceil($row['count'] / 10);
                $listCount = ($page == $pageCount) ? $row['count'] - 10 * ($pageCount - 1) : 10;
                $lastPage = ($page > 1) ? $page - 1 : 1;
                $nextPage = ($page == $pageCount) ? $pageCount : $page + 1;

                $frontList = $page * 10 - 10;
                $sql = "SELECT * FROM $type ORDER BY id DESC LIMIT $frontList, $listCount";
                $result = $mysql->query($sql);
                ?>

                <ul class="am-list">
                    <?php
                    for ($i = 1; $i <= $listCount; $i++) {
                        $row = $result->fetch_assoc();
                        echo "<li class=\"am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left\" data-am-scrollspy=\"{animation:'fade'}\">";
                        echo "<div class=\"am-u-sm-5 am-list-thumb\">";
                        echo "<a href=\"news.php?type=$type&id=$row[id]\">";
                        echo "<img src=\"$row[pic]\" class=\"list-picture\" alt=\"$row[title]\"/>";
                        echo "</a>";
                        echo "</div>";
                        echo "<div class=\" am-u-sm-7 am-list-main\">";
                        echo "<h3 class=\"am-list-item-hd\"><a href=\"news.php?type=$type&id=$row[id]\">$row[title]</a></h3>";
                        echo "<div class=\"am-list-item-src\">$row[src]</div>";
                        echo "</div>";
                        echo "</li>";
                        echo "<div class=\"newsico-l am-fr\">";
                        echo "<i class=\"am-icon-clock-o\">".str_replace("-", "/", $row['newstime'])."</i>";
                        echo "</div>";
                    }
                    ?>
                </ul>

                <ul data-am-widget="pagination" class="am-pagination am-pagination-default">

                    <li class="am-pagination-first ">
                        <a href="<?php echo "list.php?type=$type&page=1"?>" class="">第一页</a>
                    </li>

                    <li class="am-pagination-prev ">
                        <a href="<?php echo "list.php?type=$type&page=1"?>" class="">上一页</a>
                    </li>


                    <?php
                    for ($i = 1; $i <= $pageCount; $i++) {
                        if ($i == $page)
                            echo "<li class='am-active'>";
                        else
                            echo "<li class=''>";
                        echo "<a href='list.php?type=$type&page=$i'>$i</a>";
                        echo "</li>";

                    }
                    ?>

                    <li class="am-pagination-next ">
                        <a href="<?php echo "list.php?type=$type&page=$nextPage"?>" class="">下一页</a>
                    </li>

                    <li class="am-pagination-last ">
                        <a href="<?php echo "list.php?type=$type&page=$pageCount"?>" class="">最末页</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 ">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                个人专栏
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>

        <div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg">
            <ul class="am-list"  >
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>
                    </div>
                </li>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
            </ul>
        </div>

        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                合作专栏
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>

        <div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg">
            <ul class="am-list">
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>
                    </div>
                </li>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg" class="face"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
        <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>

<?php
$mysql->close();
?>

<footer>
    <div class="content">
        <ul class="am-avg-sm-5 am-avg-md-5 am-avg-lg-5 am-thumbnails">
            <li><a href="https://github.com/prayshouse/News">联系我们</a></li>
            <li><a href="https://github.com/prayshouse/News">加入我们</a></li>
            <li><a href="https://github.com/prayshouse/News">合作伙伴</a></li>
            <li><a href="https://github.com/prayshouse/News">广告及服务</a></li>
            <li><a href="https://github.com/prayshouse/News">友情链接</a></li>
        </ul>
        <div class="btnlogo"><img src="images/btnlogo.png"/></div>
    </div>
</footer>
</body>
</html>