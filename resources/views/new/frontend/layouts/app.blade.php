<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <link rel="icon" href="{{ asset('public/favicon.png') }}">

    <link rel="apple-touch-icon" href="{{ asset('public/favicon.png') }}">
    <title> {{ isset($page_title) ? $page_title : 'LogistiQuote' }} </title>
    @include('new.frontend.snippets.top-scripts')
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T65SNW8"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager  AIzaSyAaFILZAVplv8zALM581iq1k42oyXaefIk (noscript) -->
@include('new.frontend.snippets.header')
@yield('content')
@include('new.frontend.snippets.footer')
@include('new.frontend.snippets.bottom-scripts')

</html>
