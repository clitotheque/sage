<?php

namespace App\Data;


abstract class ACFPost
{
  /**
   * @var WP_Post $p  The wp post object
   */
  public $p;

  abstract protected function init_acf($post);

  function __construct($post)
  {
    $this->p = $post;

    $this->init_acf($post);
  }
}
