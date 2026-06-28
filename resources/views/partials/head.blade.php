<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php wp_head() @endphp


  <link rel="apple-touch-icon" sizes="180x180"
    href="{{ Vite::asset('resources/images/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32"
    href="{{ Vite::asset('resources/images/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16"
    href="{{ Vite::asset('resources/images/favicon/favicon-16x16.png') }}">
  <link rel="manifest"
    href="{{ Vite::asset('resources/images/favicon/site.webmanifest') }}">
  <link rel="mask-icon"
    href="{{ Vite::asset('resources/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
  <link rel="shortcut icon"
    href="{{ Vite::asset('resources/images/favicon/favicon.ico') }}">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config"
    content="{{ Vite::asset('resources/images/favicon/browserconfig.xml') }}">
  <meta name="theme-color" content="#ffffff">

  @if (is_front_page())
  <meta property="og:image" name="og:image" content="https://clitotheque.org/app/uploads/2021/02/clitohead_fb.png">
  @endif

  @vite(['resources/css/app.scss', 'resources/js/app.js'])

</head>
