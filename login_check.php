<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/29
 * Time: 17:25
 */

require_once 'curl.func.php';
require_once 'tool.php';

if (is_array($_POST) && count($_POST) > 0) {
    if (isset($_POST["id"]) && $_POST['id'] && isset($_POST["password"]) && $_POST['password']) {
        $id = $_POST['id'];
        $pw = $_POST['password'];
        $mysql = new mysqli("localhost", "root", "shouse", "news");
        $sql = "SELECT COUNT(*) AS count FROM user WHERE ID='$id' and password='$pw'";
        $result = $mysql->query($sql);
        $row = $result->fetch_assoc();
        if ($row['count'] > 0) {
            // set cookies
            setcookie("user", $id, time()+3600);
            header("refresh:0;url=index.php");
            exit;
        }
    }
}

header("refresh:0;url=login.php?error=1");
exit;