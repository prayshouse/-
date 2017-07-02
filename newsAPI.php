<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/27
 * Time: 10:59
 */

require_once 'curl.func.php';
require_once 'tool.php';

// header("Content-Type:text/html;charset=utf-8");

function update_database($type)
{
    //utf8 新闻频道(头条,财经,体育,娱乐,军事,教育,科技,NBA,股票,星座,女性,健康,育儿)
    $type_array = array('星座', '教育', '娱乐', '女性', '财经', '健康',
        '军事', 'NBA', '育儿', '体育', '股票', '科技', '头条');
    $table_array = array('constellation', 'education', 'entertainment', 'female', 'financial',
        'health', 'military', 'nba', 'parenting', 'sport', 'stock', 'technology', 'top');
    $channel = $type_array[$type];
    $appkey = '815f5bcc886bd5c7';
    $url = "http://api.jisuapi.com/news/get?channel=$channel&appkey=$appkey&num=40";
    $result = curlOpen($url);
    $jsonarr = json_decode($result, true);
    if ($jsonarr['status'] != 0) {
        console_log($jsonarr['msg']);
        exit();
    }
    $result = $jsonarr['result'];
    console_log($result['channel'] . ' ' . $result['num']);

    // add into database
    $mysqli = new mysqli("localhost", "root", "shouse", "news");

    if (mysqli_connect_error()) {
        console_log('Could not connect: ' . mysqli_connect_error());
    }

    $mysqli->query("SET NAMES utf8");

    $reResult = array_reverse($result['list']);
    foreach ($reResult as $val) {
        $title = str_replace("'", "\'", $val['title']);
        if (empty($val['time']))
            $time = date("Y-m-d H:i");
        else
            $time = substr($val['time'], 0, 16);
        $src = str_replace("'", "\'", $val['src']);
        $category = str_replace("'", "\'", $val['category']);
        $pic = str_replace("'", "\'", $val['pic']);
        $content = str_replace("'", "\'", $val['content']);
        $url = str_replace("'", "\'", $val['url']);
        $weburl = str_replace("'", "\'", $val['weburl']);


        $sql = "INSERT INTO $table_array[$type] (title, newstime, src, category, pic, content, url, weburl) VALUES ('$title', '$time', '$src', '$category', '$pic', '$content', '$url', '$weburl')";
        if ($mysqli->query($sql))
            console_log("1 record added");
        else {
            console_log($mysqli->error);
        }
    }
    $mysqli->close();

}

//$mysqli = new mysqli("localhost", "root", "shouse", "news");
//
//if (mysqli_connect_error()) {
//    echo 'Could not connect: ' . mysqli_connect_error();
//}
//
//$time = time();
//console_log(time());
//$mysqli->query("INSERT INTO version_control (versiontime) VALUES ('$time')");
//$mysqli->query("INSERT INTO version_control (versiontime) VALUES ('2017-06-27 11:28:24')");
//
//$mysqli->close();

//update_database(CONSTELLATION);
//update_database(EDUCATION);
//update_database(ENTERTAINMENT);
//update_database(FEMALE);
//update_database(FINANCIAL);
//update_database(HEALTH);
//update_database(MILITARY);
//update_database(NBA);
//update_database(PARENTING);
//update_database(SPORT);
//update_database(STOCK);
//update_database(TECHNOLOGY);
//update_database(TOP);