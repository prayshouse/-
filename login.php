<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/29
 * Time: 15:43
 */
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
    <div class="btnlogo"><img src="images/btnlogo.png"/></div>
    <div class="login-top">
        <h1>登陆</h1>
        <form>
            <input type="text" value="账号" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '账号';}">
            <input type="password" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
        </form>
        <div class="forgot">
            <a href="#">忘记密码</a>
            <input type="submit" value="登陆" >
        </div>
    </div>
    <div class="login-bottom">
        <h3>新用户 &nbsp;<a href="register.php">注册</a></h3>
    </div>
</div>
</body>
</html>

