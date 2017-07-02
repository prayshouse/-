<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/29
 * Time: 17:25
 */

require_once 'curl.func.php';
require_once 'tool.php';

echo 'be';
if (is_array($_POST) && count($_POST) > 0) {
    if (isset($_POST["email"]) && $_POST['email']
        && isset($_POST["id"]) && $_POST['id'] && isset($_POST["password"]) && $_POST['password']) {
        $email = $_POST['email'];
        $id = $_POST['id'];
        $pw = $_POST['password'];
        echo $email.$id.$pw;
        $mysql = new mysqli("localhost", "root", "shouse", "news");
        $sql = "SELECT COUNT(*) AS count FROM user WHERE ID='$id' or email='$email'";
        $result = $mysql->query($sql);
        $row = $result->fetch_assoc();
        if ($row['count'] > 0) {
            header("refresh:0;url=register.php?error=1");
            exit;
        }
        $sql = "INSERT INTO user (email, ID, password) VALUES ('$email', '$id', '$pw')";
        if ($mysql->query($sql)) {
            // set cookie
            setcookie("user", $id, time()+3600);
            header("refresh:0;url=category.php");
            exit;
        }
        else {
            header("refresh:0;url=register.php?error=1");
            exit;
        }

    }
}

header("refresh:0;url=register.php?error=1");
exit;