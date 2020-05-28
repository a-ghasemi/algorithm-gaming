<?php

$days = [
    0,
    31,31,31,31,31,31,
    30,30,30,30,30,
    29
];


$date = readline();
$date = explode('/', $date);

$m = intval($date[1]);
$d = intval($date[2]);

$reminded_days = $days[$m] - $d + 1;
for($i = $m+1; $i <= 12; $i++){
    $reminded_days += $days[$i];
}

echo $reminded_days;