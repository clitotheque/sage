@php
if (!isset($post_link)) $post_link = false;
if (!isset($more)) $more = false;
//var_dump($r);
@endphp
<header class="post-title mb-10">
    <h1 class="entry-title title-{{ $r->type_label }} leading-none text-45xl uppercase">
        @if ($post_link)
        <a
            href="{{ the_permalink() }}"
            title="{{ the_title_attribute() }}">
            {{ the_title() }}
        </a>
        @else
        {{ the_title() }}
        @endif
    </h1>
    <h4 class="leading-none">
      {!! $r->get_creators_html($no_link = true) !!}
    </h4>
    @if ($more && !($r->pub_date == null))
    <h5>{{ $r->pub_date }}
    @if (!($r->editor == null))
      &nbsp;-&nbsp{{ $r->editor }}
    @endif
    </h5>
    @endif
    <h6 class="italic leading-none">
        {!! $r->get_categories_html() !!}
    </h6>
</header>
