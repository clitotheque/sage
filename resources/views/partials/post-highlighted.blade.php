@php

$r = $get;

@endphp
<div class="relative featured-box"
  style="background: url('{!! get_the_post_thumbnail_url($r->p, 'medium_large') !!}'); background-size: cover;">
  <div class="featured-meta">
    <div class="meta-head">
      <div class="m-auto">
        <h3 class="leading-none uppercase font-weight-5">
          {!! \App\Tools::clean_cut(get_the_title($r->p), 40) !!}
        </h3>
      </div>
    </div>
  </div>
  <a
    href="{!! the_permalink($r->p) !!}"
    title="{{ get_the_title($r->p) }}"
    class="absolute top-0 left-0 h-full w-full no_link_effect">&nbsp;</a>
</div>
