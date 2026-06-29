@php

$r = new App\Data\Resource(get_post());
$caption = get_the_post_thumbnail_caption();
$related = ($r->related)();

/* WP ULIKE treat translations as different posts.
    But we want the same vote count for post and it's translation so
    we always give WP ULIKE the id of the default language post. */
$default_lang = pll_default_language();
$default_post = pll_get_post($r->p->ID, $default_lang);
if ($default_post == null || $default_post == false)
  $like_id = $r->p->ID;
else $like_id = $default_post;

@endphp
<article @php post_class('flex flex-row flex-wrap justify-center bg-white pt-4') @endphp>
  <div class="left-column w-1/4 min p-5 flex-grow sm:flex-grow-0 text-center">
    @include('partials.post-image', [ 'yellow' => true ])
    @if (!($caption == null))
    <div class="copyright italic text-gray-600">{{ $caption }}</div>
    @endif
    @if (!empty($r->link))
      @if($r->mature)
      <a
        class="no_link_effect"
        data-message="{{ pll__( 'Cette resource est réservée à un public majeur. En cliquant sur Ok je confirme être agé de 18 ans ou plus.' ) }}'"
        href="{{ $r->link }}"
        target="_blank">
      <div class="inline-block mt-4 p-4 mx-auto hover:bg-{{ $r->type_label }} text-center uppercase font-bold text-lg transition-colors duration-150">
        <span>🔞&nbsp;{{ pll__( 'Accéder à la ressource' ) }}&nbsp;🔗</span>
      </div>
      </a>
      @else
      <a class="no_link_effect" href="{{ $r->link }}" target="_blank">
      <div class="inline-block mt-4 p-4 mx-auto rounded-lg hover:bg-{{ $r->type_label }} text-center uppercase font-bold text-lg transition-colors duration-150">
        <span>{{ pll__( 'Accéder à la ressource' ) }}&nbsp;🔗</span>
      </div>
      </a>
      @endif
    @endif
  </div>
  <div class="right-column w-2/4 p-5 flex-grow sm:flex-grow-0">
    <div class="entry-content relative">
      @include('partials.post-title', ['more' => true])
      {!! do_shortcode("[wp_ulike id='$like_id']") !!}
      <section class="with-dotted-links">
      {{ the_content() }}
      </section>
      <section class="with-dotted-links italic mt-10" style="padding-left: 10%;">
        <span class="absolute guillemet">&nbsp;</span>{!! $r->review !!}
      </section>
      @if (!empty($r->get_yt_id()))
      <div class="relative overflow-hidden h-0 my-6" style="padding-bottom:56.25%">
      <iframe class="w-full h-full absolute left-0 top-0" id="ytplayer" type="text/html" width="640" height="360"
  src="https://www.youtube.com/embed/{{ $r->get_yt_id() }}?autoplay=0&modestbranding=1&rel=0&showinfo=0&origin={{ home_url() }}"
  frameborder="0"></iframe>
      </div>
      @endif
      </div>
    </div>
  </div>
  @if (count($related) > 0)
  <div class="black-section p-10">
      <h1 class="mt-4 mb-6">{{ pll__( 'Contenus reliés' ) }}</h1>
      <div id="featured_slider">
        @foreach ($related as $related_post)
            <div>@include('partials.post-highlighted', ['res' => $related_post])</div>
        @endforeach
      </div>
  </div>
  @endif
  {{--
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  --}}
  {{-- @php comments_template('/partials/comments.blade.php') @endphp --}}
</article>
