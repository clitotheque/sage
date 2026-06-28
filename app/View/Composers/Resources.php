<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Resources extends Composer
{
  /**
   * This tells the Composer that it should bind data to the 'example'
   * partial.
   */
  protected static $views = [
    '*',
  ];

  /**
   * This will make the variable `$roots` available in the 'example' partial
   * with the value described here.
   */
  public function get()
  {
    // var_dump($this->data);
    if (!isset($res)) $r = new \App\Data\Resource(get_post());
    else $r = $res;

    return $r;
  }
}
