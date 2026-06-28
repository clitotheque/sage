@php
    $c = get_category_by_slug('featured-'.pll_current_language('slug'));
    if(!isset($c) || !$c) $c = get_category_by_slug('featured');

    $loop = new WP_Query(array(
        'post_type' => 'res',
        'cat' => $c->term_id,
    ));
@endphp

<div class="black-section pb-10 pl-10 pr-10">
    <h1 class="mt-4 mb-6">{{ pll__( 'Les incontournables' ) }}</h1>
    <div id="featured_slider">
      @while ($loop->have_posts()) @php $loop->the_post() @endphp
      <div>@include('partials.post-highlighted')</div>
      @endwhile
    </div>
</div>

@php
  wp_reset_postdata();
@endphp
