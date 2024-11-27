<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Twitter -->
    <meta name="twitter:site" content="@ppdb">
    <meta name="twitter:creator" content="@ppdb">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Webcore">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://via.placeholder.com/1260x950?text=Webcore">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:title" content="Webcore">
    <meta property="og:description" content="PPDB - SMK M3">

    <meta property="og:image" content="https://via.placeholder.com/1260x950?text=Webcore">
    <meta property="og:image:secure_url" content="https://via.placeholder.com/1260x950?text=Webcore">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="author" content="ppdb">

    <!-- Favicon -->
    <link rel="manifest" href="/site.webmanifest">



    @yield('css')
</head>

<body>
    @yield('contents')

    @yield('js')
</body>

</html>
