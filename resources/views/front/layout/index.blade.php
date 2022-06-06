<!DOCTYPE html>
<html lang="en">
<head>

    @include('front.common.head')

</head>
<body>

    @include('front.common.header')

    @yield('content')

    @include('front.common.footer_menu')

    @include('front.common.footer')

</body>
</html>
