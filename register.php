<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/29
 * Time: 15:43
 */
$error = null;
if (is_array($_GET) && count($_GET) > 0) {
    if (isset($_GET["error"]) && $_GET['error']) {
        $error = $_GET['error'];
    }
}
?>

<!doctype html>
<html lang="en">
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
    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="css/login-register.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

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
<div class="login">
    <div class="btnlogo"><a href="index.php"><img src="images/btnlogo.png"/></a></div>
    <div class="login-top">
        <h1>注册</h1>
        <div class="forgot">
            <form action="register_check.php" method="post" class="inline-form">
                <input type="email" placeholder="邮箱" name="email">
                <input type="text" placeholder="账号" name="id">
                <input type="password" placeholder="密码" name="password">
                <?php
                if ($error != null) {
                    if ($error == 1)
                        echo "<a class='error'>邮箱，账号或密码错误</a>";
                    else
                        echo "<a class='error'>账号或密码需要在6字节以上</a>";
                }
                ?>
                <button type="submit" class="submit-buttom"">注册</button>
            </form>
        </div>
    </div>
    <div class="login-bottom">
        <h3>已有账号 &nbsp;<a href="login.php">登陆</a></h3>
    </div>
</div>
</body>
</html>

