@extends('layouts.app')

@section('before')
@yield('before-deep')
@endsection


@section('main')
@yield('featured')
<div class="wrap container" role="document">
  <div class="content p-4">
    <main class="main">
      @yield('content')
    </main>
  </div>
</div>
@endsection
