<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Head -->
@include('frontend.particals.head')

<!-- //Head -->

@include('frontend.particals.header')
    @yield('content')
@include('frontend.particals.newsletter')

@include('frontend.particals.footer')

<body>

</body>
</html>