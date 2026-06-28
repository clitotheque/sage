<!doctype html>
<html class="text-xs md:text-sm xl:text-base" {!! get_language_attributes() !!}>

@include('partials.head')

<body @php body_class([ 'bg-dotted' , 'bg-fixed' , 'relative' , 'overflow-x-hidden' , 'w-full' , 'h-full' ]) @endphp>

  @yield('before')

  @php do_action('get_header') @endphp
  @include('partials.header')

  @yield('main')

  @php do_action('get_footer') @endphp
  @include('partials.footer')

  <div class="h-40 w-full overflow-hidden bg-accent"
    style="background: url({{ Vite::asset('resources/images/temp/footer.jpg') }}); background-size:cover; background-position: center">
    <a href="{{ get_home_url() }}" class="h-full w-full block">&nbsp;</a>
  </div>

  {{-- Populate auto-complete with categories, tags, etc
    <script type="text/javascript">
      var terms_res_types = [
        @php
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));
        $types = get_terms(array(
            'taxonomy' => 'res_types',
            'hide_empty' => true,
        ));
        foreach($categories as $category) {
          echo "'" .$category->name . "'," ;
        }
        foreach($types as $type) {
          echo "'" .$type->name . "'," ;
        }
        @endphp
      ];
    </script>--}}

  @php wp_footer() @endphp
</body>

</html>
