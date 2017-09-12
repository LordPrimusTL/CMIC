<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
@include('Partials._head')
<body class="myBody">
@if(\App\Helper\AuthCheck::AuthAdminCheck())
    <div class="page charts-page">
        @include('Partials._adminNavbar')
        <div class="page-content d-flex align-items-stretch">
            @include('Partials._adminSideBar')
            @yield('content')
            @include('Partials._footer')
        </div>
    </div>
@else
    @include('Partials._navbar')
    @yield('content')
    @include('Partials._footer')
@endif
</body>
</html>
