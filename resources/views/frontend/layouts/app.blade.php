
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="referrer" content="always">
    <meta charset="utf-8">
    <meta name="Author" content="LogistiQuote">
    <meta property="og:site_name" content="LogistiQuote">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="design/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/favicon.png">

    <meta name="application-name" content="LogistiQuote.com" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171699524-2"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

      gtag('config', 'UA-171699524-2');
    </script>

    <title> {{ isset($page_title) ? $page_title : 'LogistiQuote' }} </title>
    <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaFILZAVplv8zALM581iq1k42oyXaefIk&libraries=places"></script>
    @include('frontend.includes.top-includes')
    @include('frontend.includes.top-scripts')



</head>

<body >
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T65SNW8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager  AIzaSyAaFILZAVplv8zALM581iq1k42oyXaefIk (noscript) -->
   <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152901105-1"></script> -->
    @include('frontend.snippets.header')

    @yield('content')

    @include('frontend.snippets.footer')

    @include('frontend.includes.bottom-scripts')

    @yield('bottom_scripts')

</body>

</html>
