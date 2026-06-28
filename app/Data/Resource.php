<?php

namespace App\Data;

use \Illuminate\Support as IS;

class Resource extends ACFPost
{
  /**
   * @var Creator[] $creators  The creator(s) of the resource
   * @var bool $ignore_month
   * @var bool $ignore_day
   * @var bool $mature          Is content for mature audience only
   * @var bool $free            Is content free
   * @var string $review        Review
   * @var callable $related     Access related resources
   * @var mixed[] $categories   Categorie(s)
   * @var mixed[] $types        Type(s)
   * @var string $type_label    Type identifier string
   * @var string $link          External link
   */
  public $creators = null;
  public $ignore_month = true;
  public $ignore_day = true;
  public $mature = false;
  public $free = true;
  public $review = '';
  public $related = null;
  public $categories = [];
  public $types = [];
  public $type_label = 'accent';
  public $link = null;
  public $editor = null;
  public $pub_date = null;

  function __construct($post)
  {
    parent::__construct($post);
  }

  protected function init_acf($post)
  {
    $pid = $post->ID;

    $this->creators =
      array_map(
        function ($p) {
          return new Creator($p);
        },
        (array) get_field('creator', $pid)
      );

    $igd = get_field('ignore_day', $pid);
    $this->ignore_day = strcmp(
      ($igd) ? $igd[0] : '',
      'ignoreday'
    ) == 0;

    $igm = get_field('ignore_month', $pid);
    $this->ignore_month =
      $this->ignore_day
      && strcmp((count($igm) > 0) ? $igm[0] : '', 'ignoremonth') == 0;

    $pdate = strtotime(get_field('publication_date', $pid, false));

    if ($this->ignore_day) {
      if ($this->ignore_month) {
        $this->pub_date = date_i18n('Y', $pdate);
      } else {
        $this->pub_date = date_i18n('M Y', $pdate);
      }
    } else {
      $this->pub_date = date_i18n('d M Y', $pdate);
    }

    $this->mature = get_field('mature', $pid);

    $this->free = get_field('free_content', $pid);

    $this->editor = get_field('editor', $pid);

    $this->review = get_field('review', $pid);

    $categories = array_map(
      function ($cid) {
        return get_category($cid);
      },
      wp_get_post_categories($pid)
    );
    $this->categories = $categories;

    $this->types = wp_get_post_terms($pid, 'res_types');


    $this->related = function () {
      $rel_contents = (array) get_field('related_content', $this->p->ID);

      return array_map(
        function ($r) {
          return new Resource($r);
        },
        array_filter($rel_contents)
      );
    };

    $this->type_label = $this->get_type_label();


    $this->link = $this->get_link();
  }

  function get_categories_html($no_featured = false, $max_char = PHP_INT_MAX, $end = '...', $nolink = false)
  {
    $cats = array_map(
      function ($c) use ($no_featured) {
        if ($no_featured) {
          $slug = $c->slug;
          if (IS\Str::startsWith($slug, 'featured')) return null;
        }
        return $c;
      },
      $this->categories
    );
    $cats2 = array_filter(
      $cats,
      function ($s) {
        return !($s === null);
      }
    );

    $cut = [];
    $count = 0;

    foreach ($cats2 as $key => $cat) {
      $len = IS\Str::length($cat->name) + 3;
      if ($count + $len > $max_char) {
        array_push($cut, $end);
        break;
      }
      if ($nolink) {
        array_push($cut, "<span>$cat->name</span>");
      } else {
        $link = \App\Tools::poly_get_page_link(4);
        $search_param = "_sft_category=$cat->slug";
        array_push($cut, "<span><a href=\"$link?$search_param\">$cat->name</a></span>");
      }

      $count += $len;
    }

    $cats2 = $cut;

    return implode('&nbsp;| ', $cats2);
  }

  function get_creators_html($no_link = false)
  {
    $creators = array_map(
      function ($c) use ($no_link) {
        $name = htmlspecialchars($c->name);
        if ($no_link)
          return "<span>$name</span>";

        $link = \App\Tools::poly_get_page_link(4);
        $id = urlencode($c->name);
        $search_param = "_sf_s=$id";
        return "<span><a href=\"$link?$search_param\">$name</a></span>";
      },
      $this->creators
    );
    return implode(', ', $creators);
  }

  private function get_type_label()
  {
    // TODO logic is wrong
    $res = 'accent';
    foreach ($this->types as $key => $typ) {
      $type = $typ->slug;
      if (IS\Str::startsWith($type, 'movie')) {
        $res = 'film';
        break;
      } else if (IS\Str::startsWith($type, 'video')) $res = 'video';
      else if (IS\Str::startsWith($type, 'yt')) $res = 'video';
      else if (IS\Str::startsWith($type, 'book')) {
        $res = 'book';
        break;
      } else if (IS\Str::startsWith($type, 'site')) {
        $res = 'site';
        break;
      } else if (IS\Str::startsWith($type, 'link')) $res = 'link';
    }

    return $res;
  }

  private function get_link()
  {
    foreach ($this->types as $key => $type) {
      if (IS\Str::startsWith($type->slug, 'link')) {
        return get_field('link', $this->p->ID);
      }
    }
    return null;
  }

  function get_yt_id()
  {
    foreach ($this->types as $key => $type) {
      if (IS\Str::startsWith($type->slug, 'yt')) {
        return get_field('youtube_id', $this->p->ID);
      }
    }
    return null;
  }

  function img_is_landscape()
  {
    $post_thumbnail_id = get_post_thumbnail_id($this->p->ID);
    if (!empty($post_thumbnail_id)) {
      $imgmeta = wp_get_attachment_metadata($post_thumbnail_id);
      return ($imgmeta['width'] > $imgmeta['height']);
    }
    return false;
  }
}
