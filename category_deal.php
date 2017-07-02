<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/7/2
 * Time: 9:56
 */
//require_once 'tool.php';

$table_array = array('conSubscription', 'eduSubsription', 'entSubsription', 'femSubsription', 'finSubsription',
    'heaSubsription', 'milSubsription', 'nbaSubsription', 'parSubsription', 'spoSubsription', 'stoSubsription', 'tecSubsription', 'topSubsription');
$type=$_GET['type'];
//$type = 12;
$user = $_COOKIE["user"];
$mysql = new mysqli("localhost", "root", "shouse", "news");
$mysql->query("SET NAMES utf8");

$sql = "SELECT * FROM user WHERE ID='$user';";
$result = $mysql->query($sql);
$row = $result->fetch_assoc();

if ($row[$table_array[$type]] == 'n') {
    $sql = "UPDATE user SET $table_array[$type]='y' WHERE ID='$user'";
}
else {
    $sql = "UPDATE user SET $table_array[$type]='n' WHERE ID='$user'";
}
$mysql->query($sql);
header("refresh:0;url=category.php");
exit;