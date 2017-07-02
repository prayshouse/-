<!doctype html>
<?php
require_once "tool.php";
if (isset($_COOKIE["user"]))
    $user = $_COOKIE["user"];
else {
    header("refresh:0;url=login.php");
    exit;
}
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
            <?php
            echo "<li class=\"am-dropdown am-topbar-right\" data-am-dropdown>";
            echo "<a class=\"am-dropdown-toggle\" data-am-dropdown-toggle href=\"javascript:;\">";
                echo "$user <span class=\"am-icon-caret-down\"></span>";
                echo "</a>";
            echo "<ul class=\"am-dropdown-content\">";
                echo "<li class=\"am-dropdown-header\">个人中心</li>";
                echo "<li><a href=\"category.php\">我的订阅</a></li>";
                echo "<li><a href=\"logout.php\">登出</a></li>";
                echo "</ul>";
            echo "</li>";
            echo "";
            echo "";
            ?>
        </div>
    </div>
</header>

<div id="cattit">
    <ul class="am-avg-sm-2 am-avg-md-2 am-avg-lg-2">
        <h3>订阅</h3>
    </ul>
</div>

<?php
require_once 'curl.func.php';

$mysql = new mysqli("localhost", "root", "shouse", "news");
$mysql->query("SET NAMES utf8");
$sql = "SELECT * FROM user WHERE ID='$user';";
$result = $mysql->query($sql);
$row = $result->fetch_assoc();
?>
<hr data-am-widget="divider" style="" class="am-divider am-divider-default" />


<script>
    function click(type) {
        alert("df");
        console.log("end");
        window.open('category_deal.php?type=' + type);
        console.log("end");
        console.log("jkds", "dfs ");
    }
</script>

<div id="cattlist" class="am-container">
    <ul class="am-avg-sm-1 am-avg-md-3 am-avg-lg-4">
        <li>
            <div class="cattlist_0">
                <div class="cattlist_1">
                    <div class="am-g">

                        <div class="am-u-sm-4 am-u-md-5 am-u-lg-5 am-vertical-align">
                            <div class="am-vertical-align-middle">
                                <img src="Temp-images/face1.jpg">
                            </div>
                        </div>
                        <div class="am-u-sm-8 am-u-md-7 am-u-lg-7 to_top_10">
                            <h1>头条</h1>
                        </div>
                    </div>
                </div>
                <div class="cattlist_3">
                    <?php
                    $button_color = ($row['topSubsription'] == 'y') ? "am-btn-warning" : "am-btn-default";
                    ?>
                    <button onclick="click(12)" type="button" class="to_top_2 am-btn <?php echo $button_color ?>">
                        <i class="am-icon-plus"></i>
                        <?php if ($row['topSubsription'] == 'y') echo "已订阅"; else echo "未订阅"; ?>
                    </button>
                </div>
            </div>
        </li>
    </ul>
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