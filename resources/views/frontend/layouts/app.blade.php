<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Jon Ander is a responsive creative template">
        <meta name="keywords" content="portfolio, personal, corporate, business, parallax, creative, agency">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- <link rel="stylesheet" href="css/bootstrap.min.css" > -->

        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        

        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <!-- magnific-popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">

        <!-- Font Icon Core CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Core Style Css 
        <link rel="stylesheet" href="css/style.css"> -->

        <!--[if lt IE 9]-->
        <script src="js/html5shiv.min.js"></script>
        <!--[endif]-->

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/app.css')) }}

        @stack('after-styles')
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/app.js')) !!}
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
