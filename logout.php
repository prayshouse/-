<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/7/2
 * Time: 10:49
 */
setcookie("user", "", time()-3600);
header("refresh:0;url=index.php");
exit;