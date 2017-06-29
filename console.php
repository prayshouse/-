<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/28
 * Time: 0:52
 */
function console_log($data)
{
    if (is_array($data) || is_object($data))
    {
        $output = str_replace("'", "\"", json_decode($data));
        echo("<script>console.log('".$output."');</script>");
    }
    else
    {
        echo("<script>console.log('".str_replace("'", "\"", $data)."');</script>");
    }
}