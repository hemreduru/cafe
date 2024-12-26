<!doctype html>
<html lang="en">
@include('layout.head')

<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    @include('layout.header')
    @include('layout.sidebar')
    @yield('content')
    @include('layout.footer')
</div>
@include('layout.footer')
@include('layout.script')
</body>

</html>
