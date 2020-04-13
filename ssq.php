<?php
/* * *********************
 * 抓取彩票双色球结果
 * ******************** */

require 'vendor/autoload.php';
use phpspider\core\phpspider;
use phpspider\core\requests;
use phpspider\core\selector;

$url = "http://kaijiang.500.com/ssq.shtml";
$html = requests::get($url);

//期数
$selector = "//font[contains(@class,'cfont2')]//strong";
$periodNum = selector::select($html, $selector);

//开奖时间
$spanSelector = "//span[contains(@class,'span_right')]";
$openTime = selector::select($html, $spanSelector);

//红球
$ballRedSelector = "//li[contains(@class,'ball_red')]";
$ballRedResult = selector::select($html, $ballRedSelector);

//篮球
$ballBlueSelector = "//li[contains(@class,'ball_blue')]";
$ballBlueResult = selector::select($html, $ballBlueSelector);


//所有所要结果
$result = [
    'periodNum'=>$periodNum,
    'openTime'=>$openTime,
    'redBall'=>implode(' ', $ballRedResult),
    'blueBall'=>$ballBlueResult,
];
print_r($result);
exit;

//--todo--将开奖结果给自己发个邮件或者短信啥的------