<doctype html>
<html class="no-js">
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

                <li class = "am-active"><a href="index.php">首页</a></li>
                <li><a href="profile.php?page=1&type=top">头条</a></li>
                <li><a href="profile.php?page=1&type=financial">财经</a></li>
                <li><a href="profile.php?page=1&type=sport">体育</a></li>
                <li><a href="profile.php?page=1&type=entertainment">娱乐</a></li>
                <li><a href="profile.php?page=1&type=military">军事</a></li>
                <li><a href="profile.php?page=1&type=education">教育</a></li>
                <li><a href="profile.php?page=1&type=technology">科技</a></li>
                <li><a href="profile.php?page=1&type=nba">NBA</a></li>
                <li><a href="profile.php?page=1&type=stock">股票</a></li>
                <li><a href="profile.php?page=1&type=constellation">星座</a></li>
                <li><a href="profile.php?page=1&type=female">女性</a></li>
                <li><a href="profile.php?page=1&type=health">健康</a></li>
                <li><a href="profile.php?page=1&type=parenting">育儿</a></li>
            </ul>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注册</button>
            </div>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-danger am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</button>
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

if ($time - $row['max_time'] > 3600) {
    console_log("updating the database");
    // insert new timestamp
    $sql = "INSERT INTO version_control (versiontime) VALUES ($time)";
    $mysql->query($sql);

    // update the database
    update_database(CONSTELLATION);
    update_database(EDUCATION);
    update_database(ENTERTAINMENT);
    update_database(FEMALE);
    update_database(FINANCIAL);
    update_database(HEALTH);
    update_database(MILITARY);
    update_database(NBA);
    update_database(PARENTING);
    update_database(SPORT);
    update_database(STOCK);
    update_database(TECHNOLOGY);
    update_database(TOP);
}

// top news
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

<!--banner2-->
<!--div class="am-container">
    <ul class="padding-none banner2 am-gallery am-avg-sm-2 am-avg-md-4 am-avg-lg-4 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
        <li>
            <div class="am-gallery-item">
                <a href="news.php">
                    <img src="Temp-images/tempnews.png"  alt="远方 有一个地方 那里种有我们的梦想"/>
                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                    <div class="am-gallery-desc">2375-09-26</div>
                </a>
            </div>
        </li>
        <li>
            <div class="am-gallery-item">
                <a href="#">
                    <img src="Temp-images/tempnews.png"  alt="远方 有一个地方 那里种有我们的梦想"/>
                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                    <div class="am-gallery-desc">2375-09-26</div>
                </a>
            </div>
        </li>
        <li>
            <div class="am-gallery-item">
                <a href="#">
                    <img src="Temp-images/tempnews.png"  alt="远方 有一个地方 那里种有我们的梦想"/>
                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                    <div class="am-gallery-desc">2375-09-26</div>
                </a>
            </div>
        </li>
        <li>
            <div class="am-gallery-item">
                <a href="#">
                    <img src="Temp-images/tempnews.png"  alt="远方 有一个地方 那里种有我们的梦想"/>
                    <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                    <div class="am-gallery-desc">2375-09-26</div>
                </a>
            </div>
        </li>
    </ul>
</div-->
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM financial ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>

                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM sport ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM entertainment ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM military ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM education ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM technology ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM nba ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM stock ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM constellation ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM female ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM health ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM parenting ORDER BY id DESC LIMIT 10";
        $result = $mysql->query($sql);
        ?>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default news">
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
                            <div class="am-list-item-src"><?php echo $row['src'] ?></div>

                        </div>

                    </li>
                    <div class="newsico am-fr">
                        <i class="am-icon-clock-o"><?php echo str_replace("-", "/", $row['newstime']) ?></i>
                    </div>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left" data-am-scrollspy="{animation:'fade'}">
                        <div class="am-u-sm-5 am-list-thumb">
                            <a href="http://www.douban.com/online/11624755/">
                                <?php $row = $result->fetch_assoc() ?>
                                <img src="<?php echo $row['pic'] ?>" class="list-picture" alt="<?php echo $row['title'] ?>"/>
                            </a>

                        </div>

                        <div class=" am-u-sm-7 am-list-main">
                            <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/"><?php echo $row['title'] ?></a></h3>
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
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                个人专栏
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg" data-am-scrollspy="{animation:'fade'}">
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

        <div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg" data-am-scrollspy="{animation:'fade'}">
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
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                评测
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>

        <div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg" data-am-scrollspy="{animation:'fade'}">
            <ul class="am-list"  >
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                        <a href="http://www.douban.com/online/11624755/">
                            <img src="Temp-images/face.jpg"/>
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
                            <img src="Temp-images/face.jpg"/>
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
                            <img src="Temp-images/face.jpg"/>
                        </a>
                    </div>

                    <div class=" am-u-sm-8 am-list-main">
                        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/">勾三古寺</a></h3>

                        <div class="am-list-item-text">代码压缩和最小化。在这里，我们为你收集了9个最好的JavaScript压缩工具将帮</div>

                    </div>
                </li>
            </ul>
        </div>

        <ul class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                        <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
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
            <li><a href="#">联系我们</a></li>
            <li><a href="#">加入我们</a></li>
            <li><a href="#">合作伙伴</a></li>
            <li><a href="#">广告及服务</a></li>
            <li><a href="#">友情链接</a></li>
        </ul>
        <div class="btnlogo"><img src="images/btnlogo.png"/></div>
        <p>Amaze UI出品<br>© 2016 AllMobilize, Inc. Licensed under MIT license. 模板收集自 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> -  More Templates  <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>.</p>
        <div class="w2div">
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-2 am-avg-lg-2 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
            <li class="w2">
                <div class="am-gallery-item">
                    <a href="Temp-images/dd.jpg">
                        <img src="Temp-images/dd.jpg" />
                        <h3 class="am-gallery-title">订阅号：Amaze UI</h3>
                    </a>
                </div>
            </li>
            <li   class="w2">
                <div class="am-gallery-item">
                    <a href="Temp-images/dd.jpg">
                        <img src="Temp-images/dd.jpg"/>
                        <h3 class="am-gallery-title">服务号：Amaze UI</h3>
                    </a>
                </div>
            </li>
        </ul>
        </div>
    </div>
</footer>
</body>
</html>