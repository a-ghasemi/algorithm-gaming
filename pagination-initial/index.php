<?php

require __DIR__ . '/pagination.php';

$pagination_template = file_get_contents(__DIR__ . '/pagination.tpl');

//echo renderPagination($pagination_template, 7 * 5, 5, 2, 'index.php?page=');
//echo renderPagination($pagination_template, 56, 5, 7, 'index.php?page=');
//echo renderPagination($pagination_template, 20, 5, 1, 'index.php?page=');
echo renderPagination($pagination_template, 40, 5, 6, 'index.php?page=');
