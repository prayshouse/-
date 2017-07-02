<doctype html>
<html class="no-js">
<?php
require_once 'tool.php';

if (isset($_COOKIE["user"])) {
    header("refresh:0;url=home.php");
    exit;
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
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
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="css/login-register.css">


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
            <a href="index.php"><img src="images/logo.png" alt=""></a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-warning am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">

                <li class="am-active"><a href="index.php">首页</a></li>
                <li><a href="list.php?type=top">头条</a></li>
                <li><a href="list.php?type=financial">财经</a></li>
                <li><a href="list.php?type=sport">体育</a></li>
                <li><a href="list.php?type=entertainment">娱乐</a></li>
                <li><a href="list.php?type=military">军事</a></li>
                <li><a href="list.php?type=education">教育</a></li>
                <li><a href="list.php?type=technology">科技</a></li>
                <li><a href="list.php?type=nba">NBA</a></li>
                <li><a href="list.php?type=stock">股票</a></li>
                <li><a href="list.php?type=constellation">星座</a></li>
                <li><a href="list.php?type=female">女性</a></li>
                <li><a href="list.php?type=health">健康</a></li>
                <li><a href="list.php?type=parenting">育儿</a></li>
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
if (mysqli_connect_error()) {
    console_log('Could not connect: ' . mysqli_connect_error());
}
$sql = "SELECT MAX(versiontime) AS max_time FROM version_control";
$result = $mysql->query($sql);
$row = $result->fetch_array();
$time = time();

$toUpdate = false;
if ($time - $row['max_time'] > 3600) {
    console_log("updating the database");
    // insert new timestamp
    $sql = "INSERT INTO version_control (versiontime) VALUES ($time)";
    $mysql->query($sql);
    $toUpdate = true;
}

// top news
if ($toUpdate) update_database(TOP);
$mysql->query("SET NAMES utf8");
$sql = "SELECT * FROM top ORDER BY id DESC LIMIT 30";
$result = $mysql->query($sql);
//$result = $result->
?>

<!--banner-->
<div class="banner">
    <div class="am-g am-container">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
            <div data-am-widget="slider" class="am-slider am-slider-c1" data-am-slider='{"directionNav":false}' >
                <ul class="am-slides">
                    <li>
                        <?php $row = $result->fetch_assoc() ?>
                        <a href="events_show.php">
                            <img src="<?php echo $row['pic']?>" class="dynamic-picture" alt="<?php echo $row['title'] ?>">
                        </a>
                        <div class="am-slider-desc"><?php echo $row['title'];?></div>

                    </li>
                    <li>
                        <?php $row = $result->fetch_assoc() ?>
                        <a href="events_show.php">
                            <img src="<?php echo $row['pic']?>" class="dynamic-picture" alt="<?php echo $row['title'] ?>">
                        </a>
                        <div class="am-slider-desc"><?php echo $row['title'];?></div>

                    </li>
                    <li>
                        <?php $row = $result->fetch_assoc() ?>
                        <a href="events_show.php">
                            <img src="<?php echo $row['pic']?>" class="dynamic-picture" alt="<?php echo $row['title'] ?>">
                        </a>
                        <div class="am-slider-desc"><?php echo $row['title'];?></div>

                    </li>
                    <li>
                        <?php $row = $result->fetch_assoc(); ?>
                        <a href="events_show.php">
                            <img src="<?php echo $row['pic']?>" class="dynamic-picture" alt="<?php echo $row['title'] ?>">
                        </a>
                        <div class="am-slider-desc"><?php echo $row['title'];?></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 padding-none">
            <!--div class="star am-container"><span><img src="images/star.png">荣誉榜</span></div-->
            <ul class="padding-none am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-2 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <?php $row = $result->fetch_assoc(); ?>
                            <img src="<?php echo $row['pic']?>" class="top-right-picture" alt="<?php echo $row['title'] ?>"/>
                            <h3 class="am-gallery-title"><?php echo $row['title'] ?></h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <?php $row = $result->fetch_assoc(); ?>
                            <img src="<?php echo $row['pic']?>" class="top-right-picture" alt="<?php echo $row['title'] ?>"/>
                            <h3 class="am-gallery-title"><?php echo $row['title'] ?></h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <?php $row = $result->fetch_assoc(); ?>
                            <img src="<?php echo $row['pic']?>" class="top-right-picture" alt="<?php echo $row['title'] ?>"/>
                            <h3 class="am-gallery-title"><?php echo $row['title'] ?></h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="#">
                            <?php $row = $result->fetch_assoc(); ?>
                            <img src="<?php echo $row['pic']?>" class="top-right-picture" alt="<?php echo $row['title'] ?>"/>
                            <h3 class="am-gallery-title"><?php echo $row['title'] ?></h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--news-->
<div class="am-g am-container newatype">
    <div class="am-u-lg-8">
        <!-- 财经 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    财经
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=financial">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(FINANCIAL);
            $sql = "SELECT * FROM financial ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=financial&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=financial&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>

                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=financial&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=financial&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>

                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=financial&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=financial&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 体育 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    体育
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=sport">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(SPORT);
            $sql = "SELECT * FROM sport ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=sport&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=sport&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=sport&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=sport&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=sport&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=sport&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 娱乐 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    娱乐
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=entertainment">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(ENTERTAINMENT);
            $sql = "SELECT * FROM entertainment ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=entertainment&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=entertainment&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=entertainment&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=entertainment&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=entertainment&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=entertainment&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 军事 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    军事
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=military">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(MILITARY);
            $sql = "SELECT * FROM military ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=military&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=military&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=military&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=military&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=military&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=military&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 教育 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    教育
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=enducation">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(EDUCATION);
            $sql = "SELECT * FROM education ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=education&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=education&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=education&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=education&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=education&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=education&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 科技 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    科技
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=technology">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(TECHNOLOGY);
            $sql = "SELECT * FROM technology ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=technology&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=technology&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=technology&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=technology&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=technology&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=technology&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- NBA -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    NBA
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=nba">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(NBA);
            $sql = "SELECT * FROM nba ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=nba&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=nba&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=nba&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=nba&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=nba&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=nba&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 股票 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    股票
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=stock">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(STOCK);
            $sql = "SELECT * FROM stock ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=stock&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=stock&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=stock&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=stock&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=stock&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=stock&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 星座 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    星座
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=constellation">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(CONSTELLATION);
            $sql = "SELECT * FROM constellation ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=constellation&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=constellation&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=constellation&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=constellation&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=constellation&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=constellation&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 女性 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    女性
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=female">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(FEMALE);
            $sql = "SELECT * FROM female ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=female&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=female&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=female&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=female&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=female&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=female&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 健康 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    健康
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="list.php?type=parenting">more &raquo;</a>
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(HEALTH);
            $sql = "SELECT * FROM health ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=health&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=health&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=health&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=health&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=health&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=health&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
        <!-- 育儿 -->
        <div class="am-u-sm-12 am-u-md-12 oh">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="border-bottom: 0px; margin-bottom: -10px">
                <h2 class="am-titlebar-title ">
                    育儿
                </h2>
                <nav class="am-titlebar-nav">
                    <a href="#more">more &raquo;</a>0
                </nav>
            </div>
            <?php
            if ($toUpdate) update_database(PARENTING);
            $sql = "SELECT * FROM parenting ORDER BY id DESC LIMIT 10";
            $result = $mysql->query($sql);
            ?>
            <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=parenting&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=parenting&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=parenting&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=parenting&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                            <div class="am-u-sm-5 am-list-thumb">
                                <a href="<?php echo "article.php?type=parenting&id=$row[id]" ?>">
                                    <?php $row = $result->fetch_assoc() ?>
                                    <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                                </a>

                            </div>

                            <div class=" am-u-sm-7 am-list-main">
                                <h3 class="am-list-item-hd"><a href="<?php echo "article.php?type=parenting&id=$row[id]" ?>"><?php echo $row['title'] ?></a></h3>
                                <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                            </div>

                        </li>
                        <div class="newsico am-fr">
                            <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                        </div>
                    </ul>
                </div>
                <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>
            </div>
        </div>
    </div>
    <!-- 侧栏 -->
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
        <ul class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }" >

            <li>
                <div class="am-gallery-item">
                    <a href="https://github.com/prayshouse/News" class="">
                        <img src="images/ad.jpg"  alt="Github"/>
                        <h3 class="am-gallery-title">shouse新闻网广告位招租</h3>
                    </a>
                </div>
            </li>
            <p></p>
            <li>
                <div class="am-gallery-item">
                    <a href="https://github.com/prayshouse/News" class="">
                        <img src="images/ad.jpg"  alt="Github"/>
                        <h3 class="am-gallery-title">shouse新闻网广告位招租</h3>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

<?php
$mysql->close();
?>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
        <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>
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