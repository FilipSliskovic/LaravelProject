<!DOCTYPE html>
<html lang="en">

@include('fixed.head')

<body>

<!-- Navigation -->
@include('fixed.navigation')

@include('fixed.AdminNav')

<!-- Page Content -->
@yield('content')
@yield('modal')

<!-- Footer -->
{{--@include('fixed.footer')--}}

<!-- Bootstrap core JavaScript -->
@include('fixed.scripts')
@yield('additionalScripts')


</body>

</html>
