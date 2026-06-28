<?php

namespace App\Data;


class Creator extends ACFPost
{
  public $name;
  public $site;

  function __construct($post)
  {
    parent::__construct($post);
  }

  protected function init_acf($post)
  {
    $this->site = get_field('creator_site', $post->ID);
    $this->name = $this->p->post_title;
  }
}
