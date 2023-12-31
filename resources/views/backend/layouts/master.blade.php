
<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('backend.layouts.head')
    @stack('styles')
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('backend/assets/images/logo-icon.jpg') }}" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    @include('backend.layouts.nav')

    @include('backend.layouts.sidebar')

    @yield('content')

</div>
    @include('backend.layouts.footer')
    @stack('scripts')
</body>
</html>
