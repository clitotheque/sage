<div class="inline-block md:hidden fixed w-12 h-12 top-0 right-0 m-4 z-10
 bg-white rounded-full opacity-90
">
</div>

<div id="c-menu" class="banner-wrapper">
  <div class="banner flex content-start items-center flex-wrap md:flex-no-wrap">
    <div class=" text-center w-full md:w-auto">
      <a class="brand" href="{{ pll_home_url() }}">
        <img class="inline-block h-20"
          src="{{ Vite::asset('resources/images/temp_logo.svg') }}" />
        {{-- get_bloginfo('name', 'display') --}}
      </a>
    </div>
    <nav class="nav-primary flex-grow text-center text-4xl">
      @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <div class="w-full block text-center md:hidden">
      <div class="inline-block mx-auto  ">
        <a href="https://www.facebook.com/Clitoth%C3%A8que-104473844947529" target="_blank" alt="Facebook">
          <img width="25px" class="inline-block top-right-icon"
            src="{{ Vite::asset('resources/images/icons/facebook.svg') }}" /></a>
        <a href="https://www.instagram.com/clitotheque" target="_blank" alt="Instagram">
          <img width="25px" class="inline-block top-right-icon"
            src="{{ Vite::asset('resources/images/icons/insta.svg') }}" /></a>
        <a href="https://twitter.com/ClitoTheque" target="_blank">
          <img width="25px" class="inline-block top-right-icon"
            src="{{ Vite::asset('resources/images/icons/twitter.png') }}" alt="Twitter" /></a>
        <a href="mailto:contact@clitotheque.org" target="_blank" alt="Email">
          <img width="25px" class="inline-block top-right-icon"
            src="{{ Vite::asset('resources/images/icons/emailr.svg') }}" /></a>
      </div>
    </div>
  </div>
</div>

<div class="fixed top-0 right-0 z-50">
  <img id="menu-switch" width="30px" class="inline-block md:hidden m-5 z-50"
    src="{{ Vite::asset('resources/'images/icons/menu.svg') }}" alt="Menu" />
  <a href="https://www.facebook.com/Clitoth%C3%A8que-104473844947529" target="_blank">
    <img class="hidden w-5 lg:w-6 md:inline-block top-right-icon"
      src="{{ Vite::asset('resources/images/icons/facebook.svg') }}" alt="Facebook" /></a>
  <a href="https://www.instagram.com/clitotheque" target="_blank">
    <img class="hidden w-5 lg:w-6 md:inline-block top-right-icon"
      src="{{ Vite::asset('resources/images/icons/insta.svg') }}" alt="Instagram" /></a>
  <a href="https://twitter.com/ClitoTheque" target="_blank">
    <img class="hidden w-5 lg:w-6 md:inline-block top-right-icon"
      src="{{ Vite::asset('resources/images/icons/twitter.png') }}" alt="Twitter" /></a>
  <a href="mailto:contact@clitotheque.org" target="_blank">
    <img class="hidden w-5 lg:w-6 md:inline-block top-right-icon-mail mr-1"
      src="{{ Vite::asset('resources/images/icons/emailr.svg') }}" alt="Email" /></a>
</div>
