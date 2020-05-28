<?php

require 'JsonDB.php';

$db = new JsonDB(__DIR__ . '/db_files');

//var_dump($db->select('table1', null));

var_dump($db->select('table1', ['first_name' => 'Ali', 'last_name' => 'AliZadeh', 'country' => 'Iran']));

//var_dump($db->select('table1', ['first_name' => 'Ali']));


$db->insert('table1', ['first_name' => 'Ali', 'last_name' => 'AliZadeh', 'country' => 'Iran']);

$db->insert('table1', ['first_name' => 'Ali', 'last_name' => 'AliZadeh']);

$db->insert('table1', ['last_name' => 'AliZadeh', 'country' => 'Iran']); // Exception: No value provided for column first_name