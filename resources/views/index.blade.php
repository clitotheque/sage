@extends('layouts.home')

@section('before-deep')
  @include('partials.home-screen')
@endsection

@section('featured')
@include('partials.featured')
@endsection

@section('content')
  {{-- @include('partials.page-header') --}}
  <div class="page-header text-center">
    <h1 class="inline-block uppercase mt-10 pt-3 px-4 bg-white">
      {{ pll__( 'Derniers ajouts' ) }}
    </h1>
  </div>

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php the_post() @endphp
    @php
    if (isset($left) && $left) $left = false;
    else $left = true;
    @endphp
    @include('partials.content-list-'.get_post_type())
  @endwhile

   {{-- {!! get_the_posts_navigation() !!} --}}
   <div class="text-center"><a href="{{ App\Tools::poly_get_page_link("search") }}">
    <input type="button" value="{{ pll__( 'Découvrir tous les contenus' ) }}" class="btn-home flex-grow m-2 p-6" /></a></div>
@endsection
