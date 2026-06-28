<div class="relative justify-center w-full h-screen z-45 bg-topo">
  {{-- Background --}}
  <div class="absolute full bg-tr"></div>
  <div class="absolute h-full w-full lg:w-2/3 left-0">
    <div class="absolute full bg-accent opacity-90"></div>
    <div class="flex flex-col items-center justify-center full z-40">
      <div class="w-full z-40 mb-16 relative">
        <img width="100%" src="{{ Vite::asset('resources/images/temp_logo.svg') }}" />
        <div class="absolute w-3/4 z-40 text-right subtitle">
          <h3 class="italic">{{ pll__( 'Base collaborative de ressources sur le plaisir féminin' ) }}</h3>
        </div>
      </div>
      <div class="z-40 w-4/5 lg:w-2/3">
        {{-- <div>
          <form id="main-search" method="GET" action="{{ \App\Tools::poly_get_page_link(4) }}">
        <input type="text"
          name="_sf_s"
          placeholder="Rechercher..." class="main-search w-full rounded-lg" />
        <input type="submit" class="hidden invisible" />
        </form>
      </div> --}}
      <div class="flex flex-row flex-wrap justify-around z-40">
        <a href="#c-scroll"
          {{-- href="{{ App\Tools::poly_get_page_link("search") }}" --}}>
          <input type="button" value="{{ pll__( 'Découvrir les contenus' ) }}" class="btn-home flex-grow m-2 p-6" /></a>
        {{-- {{ App\Tools::poly_get_page_link("proposer-une-ressource") }} --}}
        <a href="{!! pll__( 'Lien vers formulaire' ) !!}" target="_blank"><input type="button" value="{{ pll__( 'Proposer une ressource' ) }}" class="btn-home flex-grow m-2 p-6" /></a>
      </div>
    </div>
  </div>
</div>
<span class="absolute w-full bottom-0 mx-auto text-center arrow-down leading-normal pb-4">
  <a href="#c-scroll" class="blink">⌵</a>
</span>
</div>
<div id="c-scroll"></div>
