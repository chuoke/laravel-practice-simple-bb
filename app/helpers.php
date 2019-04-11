<?php

function route_class() {
    return str_replace('.', '-', Route::currentRouteName());
}

function nav_active($category_id = null) {
    $is_active = is_null($category_id)
        ? if_route('topics.index')
        : if_route('categories.show') && if_route_param('category', $category_id);

    return active_class($is_active, ' active');
}

function make_excerpt($str, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($str)));

    return str_limit($excerpt, $length);
}
