<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home | MINISTORE.')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/ui/frontend/img/logo/favicon.ico') }}">
    <!-- Css Styles -->
    @includeIf('layouts.frontend.partials.css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->

    @includeIf('layouts.frontend.partials.humberger')

    <!-- Humberger End -->


    <!-- Header Section Begin -->

    @includeIf('layouts.frontend.partials.header')

    <!-- Header Section End -->


    <!-- Hero Section Begin -->

    @includeIf('layouts.frontend.partials.hero')

    <!-- Hero Section End -->


    <!-- Categories Section Begin -->

    @includeIf('layouts.frontend.partials.categories')

    <!-- Categories Section End -->


    <!-- Featured Section Begin -->

    @includeIf('layouts.frontend.partials.featured')

    <!-- Featured Section End -->


    <!-- Banner Begin -->

    @includeIf('layouts.frontend.partials.banner')

    <!-- Banner End -->


    <!-- Latest Product Section Begin -->

    @includeIf('layouts.frontend.partials.latestProduct')

    <!-- Latest Product Section End -->


    <!-- Blog Section Begin -->

    @includeIf('layouts.frontend.partials.blog')

    <!-- Blog Section End -->


    <!-- Footer Section Begin -->

    <footer class="footer spad">
        @includeIf('layouts.frontend.partials.footer')
    </footer>

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @includeIf('layouts.frontend.partials.js')
    
</body>

</html>
