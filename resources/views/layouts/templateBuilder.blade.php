<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="BazarBag, BAZARBAG, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" sizes="40X40" href="{{ asset('assets/ui/frontend/img/logo/favicon-icon-side.svg') }}">
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
    <section class="hero">
        @includeIf('layouts.frontend.partials.hero')
    </section>

    <!-- Hero Section End -->
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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
        @includeIf('layouts.frontend.partials.footer')
    </footer>

    <!-- Footer Section End -->


    <!-- Js Plugins -->
    @includeIf('layouts.frontend.partials.js')

</body>

</html>
