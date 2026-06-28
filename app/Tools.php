<?php
namespace App;

use \Illuminate\Support as IS;

class Tools
{
  public static function poly_get_page_link($nameorid){
    if(!function_exists('pll_the_languages')) return site_url($nameorid);

    $post_id = false;
    if(is_numeric($nameorid)){
      $post_id = $nameorid;
    }else{
      $post = get_page_by_path($nameorid, OBJECT, array('post','page','dossier','document'));
      if($post){
        $post_id = $post->ID;
      }
    }
    if($post_id){
      $post_id_lang = pll_get_post($post_id);
      if($post_id_lang){
        return get_permalink($post_id_lang);
      }
      return get_permalink($post_id);
    }else{
      return site_url($nameorid);
    }
  }


  public static function clean_cut ($str, $max_char) {
	$char_cut = IS\Str::substr($str, 0, $max_char);
	$word_count = count(explode(" ", $char_cut));
	return IS\Str::words($str, $word_count, '...');
}
}