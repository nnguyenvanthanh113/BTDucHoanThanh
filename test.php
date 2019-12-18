<?php 
	$now = date('2014-11-18');
$date = new DateTime($now);
$days = 10;
// trừ đi 10 ngày
// >= php version 5.3
date_sub($date, date_interval_create_from_date_string($days.' days'));
$date_minus = date_format($date, 'Y-m-d ');
//output 2014-11-08 14:10
// php version < 5.3
$date_minus = date("Y-m-d", strtotime("$now + $days day"));
var_dump($date_minus);
var_dump($now);
// ouput 2014-11-08
?>