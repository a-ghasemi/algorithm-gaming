<?php

$re =
    '/\*{2}(.*)\*{2}|\_{2}(.*)\_{2}/m';
$str = 'this is a test **__bold 2**__';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
var_dump($matches);
