<?php
require_once 'tool.php';

$id = 1;
$type = 'top';
if (is_array($_GET) && count($_GET) > 0) {
    if (isset($_GET["id"]) && $_GET['id']) {
        $id = $_GET['id'];
    }
    if (isset($_GET["type"]) && $_GET["type"]) {
        $type = $_GET['type'];
    }
}
$typeId = get_type($type);
$user = null;
if (isset($_COOKIE["user"])) {
    $is_login = true;
    $user = $_COOKIE["user"];
}
else
    $is_login = false;
?>
<!doctype html>
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
    <script src="assets/js/amazeui.js"></script>
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

            <?php
            if ($is_login) {
                echo "<li class=\"am-dropdown am-topbar-right\" data-am-dropdown>";
                echo "<a class=\"am-dropdown-toggle\" data-am-dropdown-toggle href=\"javascript:;\">";
                echo "$user <span class=\"am-icon-caret-down\"></span>";
                echo "</a>";
                echo "<ul class=\"am-dropdown-content\">";
                echo "<li class=\"am-dropdown-header\">个人中心</li>";
                echo "<li><a href=\"category.php\">我的订阅</a></li>";
                echo "<li><a href=\"#\">登出</a></li>";
                echo "</ul>";
                echo "</li>";
            }
            else {
                echo "<div class=\"am-topbar-right\">";
                echo "<a href=\"register.php\"><button class=\"am-btn am-btn-default am-topbar-btn am-btn-sm\"><span class=\"am-icon-pencil\"></span>注册</button></a>";
                echo "</div>";
                echo "<div class=\"am-topbar-right\">";
                echo "<a href=\"login.php\"><button class=\"am-btn am-btn-danger am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> 登录</button></a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</header>

<?php
$mysql = new mysqli("localhost", "root", "shouse", "news");
$mysql->query("SET NAMES utf8");

if ($is_login) {
    $table_array = array('conHeat', 'eduHeat', 'entHeat', 'femHeat', 'finHeat',
        'heaHeat', 'milHeat', 'nbaHeat', 'parHeat', 'spoHeat', 'stoHeat', 'tecHeat', 'topHeat');
    $type_heat = $table_array[$typeId];
    $sql = "UPDATE user SET $type_heat=$type_heat+1 WHERE ID='$user'";
    $mysql->query($sql);
}

$sql = "SELECT * FROM $type WHERE id = $id";
$result = $mysql->query($sql);
$row = $result->fetch_assoc();
?>

<div class="am-g am-container">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
        <div class="newstitles">
            <h2><?php echo $row['title']?></h2>
            <!--img src="Temp-images/face.jpg" class="face">
            <span>Rosis</span-->
            时间：<?php echo $row['newstime']?>
        </div>
        <a href="#"><img src="Temp-images/ad2.png" class="am-img-responsive" width="100%"/></a>

        <?php echo $row['content']?>

        <div>原文连接：<a href="<?php echo $row['url']?>"><?php echo $row['url']?></a></div>

        <div class="shang">
            <img src="images/shang.png" >
        </div>
        <div data-am-widget="duoshuo" class="am-duoshuo am-duoshuo-default" data-ds-short-name="amazeui">
            <div class="ds-thread" >
            </div>
        </div>
    </div>
    <div class="am-u-sm-0 am-u-md-0 am-u-lg-4">

        <ul class="am-gallery am-avg-sm-1
  am-avg-md-1 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }" >
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
</div>


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