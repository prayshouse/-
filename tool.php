<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2017/6/29
 * Time: 7:33
 */

define('CONSTELLATION', 0);
define('EDUCATION', 1);
define('ENTERTAINMENT', 2);
define('FEMALE', 3);
define('FINANCIAL', 4);
define('HEALTH', 5);
define('MILITARY', 6);
define('NBA', 7);
define('PARENTING', 8);
define('SPORT', 9);
define('STOCK', 10);
define('TECHNOLOGY', 11);
define('TOP', 12);

function get_type($str) {
    switch ($str) {
        case 'constellation': return 0;
        case 'education': return 1;
        case 'entertainment': return 2;
        case 'female': return 3;
        case 'financial': return 4;
        case 'health': return 5;
        case 'military': return 6;
        case 'nba': return 7;
        case 'parenting': return 8;
        case 'sport': return 9;
        case 'stock': return 10;
        case 'technology': return 11;
        case 'top': return 12;
        default: return 12;
    }
}