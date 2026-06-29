<?php

/**
 * Index should show latest resources
 *
 * @param WP_Query $query data
 *
 */

function index_query($query)
{

  if ($query->is_main_query() && $query->is_home()) {
    $query->set('post_type', 'res');
  }
}
add_action('pre_get_posts', 'index_query');

/* Disable single and archive pages for custom posts */
function clito_redirect_post()
{
  $search_param = "";
  $redirect = false;

  if (is_singular('creator')) {
    $id = urlencode(get_the_title());
    $search_param = "_sf_s=$id";
    $redirect = true;
  } elseif (is_category()) {
    $id = urlencode(get_queried_object()->slug);
    $search_param = "_sft_category=$id";
    $redirect = true;
  } elseif (is_tag()) {
    $id = urlencode(get_queried_object()->name);
    $search_param = "_sf_s=$id";
    $redirect = true;
  } elseif (is_tax('res_lang')) {
    $id = get_queried_object()->term_id;
    $search_param = "_sfm_language=$id";
    $redirect = true;
  } elseif (is_tax('res_types')) {
    $id = urlencode(get_queried_object()->slug);
    $search_param = "_sft_res_types=$id";
    $redirect = true;
  }

  if ($redirect) {
    $link = \App\Tools::poly_get_page_link(4);
    $url = "$link?$search_param";
    wp_redirect($url, 301);
    exit;
  }
}

add_action('template_redirect', 'clito_redirect_post');
