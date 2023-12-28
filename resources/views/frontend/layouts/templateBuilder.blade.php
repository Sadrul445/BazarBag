<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @includeIf('frontend.layouts.partials.css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->

    @includeIf('frontend.layouts.partials.humberger')

    <!-- Humberger End -->


    <!-- Header Section Begin -->

    @includeIf('frontend.layouts.partials.header')

    <!-- Header Section End -->


    <!-- Hero Section Begin -->
    <section class="hero">
        @includeIf('frontend.layouts.partials.hero')
    </section>

    <!-- Hero Section End -->
    <div class="container">
        @yield('content')
    </div>

    {{-- <!-- Categories Section Begin -->

    @includeIf('frontend.layouts.partials.categories')

    <!-- Categories Section End -->


    <!-- Featured Section Begin -->

    @includeIf('frontend.layouts.partials.featured')

    <!-- Featured Section End -->


    <!-- Banner Begin -->

    @includeIf('frontend.layouts.partials.banner')

    <!-- Banner End -->


    <!-- Latest Product Section Begin -->

    @includeIf('frontend.layouts.partials.latestProduct')

    <!-- Latest Product Section End -->


    <!-- Blog Section Begin -->

    @includeIf('frontend.layouts.partials.blog')

    <!-- Blog Section End --> --}}


    <!-- Footer Section Begin -->

    <footer class="footer spad">
        @includeIf('frontend.layouts.partials.footer')
    </footer>

    <!-- Footer Section End -->


    <!-- Js Plugins -->
    @includeIf('frontend.layouts.partials.js')

</body>

</html>
