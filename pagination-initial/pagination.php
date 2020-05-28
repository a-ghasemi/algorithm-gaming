<?php

function getPaginationButtons($total_items, $per_page, $current_page)
{
    $result = [];
    $pages_count = ceil($total_items / $per_page);

    if($current_page > 1){
        $result[] = ['text' => 'prev', 'number' => $current_page - 1];
    }
    if($current_page > 2){
        $result[] = ['text' => '1', 'number' => 1];
    }

    $inside = [];
    for($i = max(1, $current_page - 2); $i <= min($pages_count, $current_page + 2); $i++)
        $inside[] = ['text' => $i, 'number' => $i];

    if($inside[0]['number'] == 3) $result[] = ['text' => 2, 'number' => 2];
    elseif($inside[0]['number'] > 3) $result[] = ['text' => '...'];
    foreach($inside as $item) $result[] = $item;
    if(end($inside)['number'] == $pages_count - 2) $result[] = ['text' => $pages_count - 1, 'number' => $pages_count - 1];
    elseif(end($inside)['number'] < $pages_count - 2) $result[] = ['text' => '...'];

    if($current_page < $pages_count - 2) {
        $result[] = ['text' => $pages_count, 'number' => $pages_count];
    }

    if($current_page < $pages_count) {
        $result[] = ['text' => 'next', 'number' => $current_page + 1];
    }

    return $result;
}

function renderPagination($pagination_template, $total_items, $per_page, $current_page, $base_url)
{
    $pages = getPaginationButtons($total_items, $per_page, $current_page);
    $html = '';
    foreach ($pages as $page) {
        $page['text'] = str_replace(['prev', 'next'], ['&laquo;', '&raquo;'], $page['text']);
        if (in_array($page['text'], ['&laquo;', '...', '&raquo;'])) {
            $html .= '<li class="page-item">
              <a class="page-link" href="' . (isset($page['number']) ? $base_url . $page['number'] : '#') . '">
                <span aria-hidden="true">' . $page['text'] . '</span>
              </a>
            </li>';
        } else {
            $html .= '<li class="page-item' . ($page['number'] == $current_page ? ' active' : '') . '"><a class="page-link" href="' . $base_url . $page['number'] . '">' . $page['number'] . '</a></li>';
        }
    }

    return str_replace('{{ @pages }}', $html, $pagination_template);
}
